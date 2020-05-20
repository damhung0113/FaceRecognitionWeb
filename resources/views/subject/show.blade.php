@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tên lớp: {{ $subject->name }}<br>
                    Mã lớp: {{ $subject->code }}<br>
                    Giáo viên: {{ $name_teachers }}<br>
                    Ngày bắt đầu: {{ $subject->started_at }}<br>
                    Ngày kết thúc: {{ $subject->ended_at }}<br>
                </div>
                @if(Auth::user()->getOriginal('role') != STUDENT)
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                {!! Form::open(array('route' => array('subject.show', $subject->id), 'method' => 'GET')) !!}
                                {{csrf_field()}}
                                    <thead>
                                    <tr>
                                        <th class="text-center input-sort" data-column="id" style="width: 50px;">{{ __('No') }}</th>
                                        <th class="text-center input-sort" data-column="name">{{ __('Tên sinh viên') }}<small></small></th>
                                        <th class="text-center input-sort" data-column="code">{{ __('Mã sinh viên') }}<small></small></th>
                                        <th class="text-center input-sort" data-column="code">{{ __('Email') }}<small></small></th>
                                        <th class="text-center input-sort" data-column="code">
                                            <a href="{{ route('subject.show', $subject->id) }}"
                                                   class="btn btn-success btn-sm">{{ __('Thêm sinh viên') }}</a>
                                        <small></small></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th>
                                            <input type="text" class="form-control form-control-sm" placeholder="{{ __('Tên sinh viên') }}"
                                                   name="name" value="{{ request('name') }}"/>
                                        </th>
                                        <th>
                                            <input type="text" class="form-control form-control-sm" placeholder="{{ __('Mã sinh viên') }}"
                                                   name="code" value="{{ request('code') }}"/>
                                        </th>
                                        <th>
                                            <input type="text" class="form-control form-control-sm" placeholder="{{ __('Email') }}"
                                                   name="email" value="{{ request('email') }}"/>
                                        </th>
                                        <th class="text-center">
                                            <button type="submit" id="search" class="btn btn-info btn-sm">{{ __('Tìm kiếm') }}</button>
                                            <a href="{{ route('subject.show', $subject->id) }}"
                                                   class="btn btn-outline-dark btn-sm">{{ __('Làm mới') }}</a>
                                        </th>
                                    </tr>
                                    </thead>
                                {{ Form::close() }}
                                <tbody>
                                    @if(!empty($student_dateAbsence))
                                        @php($index = 1)
                                        @php($current_user = \App\User::find(Auth::user()->id))
                                        @foreach($student_dateAbsence as $code => $dateAbsence)
                                            @php($student = \App\User::where('code', $code)->first())
                                            @php($id = $student->id)
                                            @php($subject_id = $subject->id)
                                            @php($check = in_array(Carbon\Carbon::now()->format('d-m-yy'), $dateAbsence))
                                            <tr>
                                                <td class="text-center">{{ $index }}</td>
                                                <td class="text-center">{{ $student->name }}</td>
                                                <td class="text-center">{{ $student->code }}</td>
                                                <td class="text-center">{{ $student->email }}</td>
                                                @php($text = empty($dateAbsence) ? "" : implode('a',$dateAbsence))
                                                @if($student->id == auth()->user()->id || $current_user->getOriginal('role') != STUDENT)
                                                    <td class="text-center" data-toggle="modal" data-target="#myModal<?php echo $text;?>a<?php echo $id;?>a<?php echo $subject_id;?>">
                                                        <button type="" id="" class="btn btn-primary btn-sm">{{ __('Chi tiết') }}</button>
                                                        @if(auth()->user()->getOriginal('role') == ADMIN)
                                                            <a href="{{ route('subject.show', $subject->id) }}"
                                                                class="btn btn-danger btn-sm">{{ __('Xóa') }}</a>
                                                        @endif
                                                    </td>
                                                @else
                                                    <td class="text-center">{{ count($dateAbsence) }}</td>
                                                @endif
                                                <div class="modal fade" id="myModal<?php echo $text;?>a<?php echo $id;?>a<?php echo $subject_id;?>">
                                                    <div class="modal-dialog modal-lg">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Chi tiết các buổi nghỉ học</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @php($date = Carbon\Carbon::parse($subject->started_at))
                                                            @for($i = 1; $i<=15; $i++)
                                                            {!! Form::open(array('route' => array('recognition.store'), 'method' => 'POST')) !!}
                                                            {{csrf_field()}}
                                                                <input type="text" name="date" class="hidden" value="{{$date}}">
                                                                <input type="text" name="user_id" class="hidden" value="{{$id}}">
                                                                <input type="text" name="subject_id" class="hidden" value="{{$subject_id}}">
                                                                <div class="d-flex justify-content-around pt-1 pb-1">
                                                                    <div class="">{{ $i }}</div>
                                                                    <div class="">{{ $date->format('d-m-yy') }}</div>
                                                                    <div class="text-center">
                                                                        @if($date > Carbon\Carbon::now())
                                                                            ________
                                                                        @else
                                                                            @if(App\Recognition::where(['user_id' => $id, 'subject_id' => $subject->id, 'created_at' => $date ])->first() == null)
                                                                                Vắng mặt
                                                                            @else
                                                                                Có mặt
                                                                            @endif
                                                                        @endif
                                                                    </div>
                                                                    @if(App\Recognition::where(['user_id' => $id, 'subject_id' => $subject->id, 'created_at' => $date ])->first() == null && $date < Carbon\Carbon::now())
                                                                        <div class="">
                                                                            <button class="btn btn-danger btn-sm xndh" id="{{$id}}">Xác nhận đi học</button>
                                                                        </div>
                                                                    @else
                                                                        <div class="btnxndi1">
                                                                            <button class="btn btn-outline-dark btn-sm xndh" id="" disabled>Xác nhận đi học</button>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            {{ Form::close() }}
                                                            @php($date = $date->addDays(7))
                                                            @endfor
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                                <td class="text-center"></td>
                                            </tr>
                                            @php($index++)
                                        @endforeach
                                    @else
                                        <tr class="text-center">
                                            <td colspan="7">{{ __('Không có dữ liệu phù hợp') }}</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center input-sort" data-column="">{{ __('Buổi') }}<small></small></th>
                                        <th class="text-center input-sort" data-column="">{{ __('Ngày học') }}<small></small></th>
                                        <th class="text-center input-sort" data-column="">{{ __('Trạng thái') }}<small></small></th>
                                        <th class="text-center input-sort" data-column=""></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($date = Carbon\Carbon::parse($subject->started_at))
                                    @for($i = 1; $i<=15; $i++)
                                        <tr>
                                            <td class="text-center">{{ $i }}</td>
                                            <td class="text-center">{{ $date->format('d-m-yy') }}</td>
                                            <td class="text-center">
                                                @if($date > Carbon\Carbon::now())
                                                    _
                                                @else
                                                    @if(App\Recognition::where(['user_id' => auth()->user()->id, 'subject_id' => $subject->id, 'created_at' => $date ])->first() == null)
                                                        Vắng mặt
                                                    @else
                                                        Có mặt
                                                    @endif
                                                @endif
                                            </td>
                                            @if(App\Recognition::where(['user_id' => auth()->user()->id, 'subject_id' => $subject->id, 'created_at' => $date ])->first() == null && $date < Carbon\Carbon::now())
                                                <td class="text-center" style="width: 200px;"><button type="button" class="btn btn-danger btn-sm gyc" id="">Gửi yêu cầu xác nhận đi học</button></td>
                                            @else
                                                <td></td>
                                            @endif
                                        </tr>
                                        @php($date = $date->addDays(7))
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<style>
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute !important;
  z-index: 1;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}

.hidden {
  visibility: hidden;
  width: 0px;
  height: 0px;
  cursor: none;
}
</style>

<script type="text/javascript">
    $('.alert').delay(3000).fadeOut();
    $( ".gyc" ).click(function() {
        alert( "Chức năng sắp ra mắt, vui lòng sử dụng trao đổi với giáo viên qua email cá nhân" );
    });
</script>
@endsection
