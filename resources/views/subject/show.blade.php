@extends('layouts.app')

@section('content')
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
                                    <th class="text-center input-sort" data-column="code">{{ __('Trạng thái hôm nay') }}<small></small></th>
                                    <th class="text-center input-sort" data-column="code">{{ __('Số buổi nghỉ') }}<small></small></th>
                                    <th></th>
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
                                    <th>
                                       <!--  <select class="form-control form-control-sm" name="check_present">
                                            <option value="" selected></option>
                                            <option value="Vắng mặt" {{ request('check_present') == "Vắng mặt" ? 'selected' : '' }}>Vắng mặt</option>
                                        </select> -->
                                    </th>
                                    <th>
                                        <!-- <select class="form-control form-control-sm" name="count_date_absence">
                                            <option value="" selected></option>
                                            <option value="0" {{ request('count_date_absence') == 0 ? 'selected' : '' }}>0</option>
                                            <option value="1" {{ request('count_date_absence') == 1 ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ request('count_date_absence') == 2 ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ request('count_date_absence') == 3 ? 'selected' : '' }}>3</option>
                                        </select> -->
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
                                    @foreach($student_dateAbsence as $code => $dateAbsence)
                                        @php($student = \App\User::where('code', $code)->first())
                                        @php($check = in_array(Carbon\Carbon::now()->format('d-m-yy'), $dateAbsence))
                                        <tr>
                                            <td class="text-center">{{ $index }}</td>
                                            <td class="text-center">{{ $student->name }}</td>
                                            <td class="text-center">{{ $student->code }}</td>
                                            <td class="text-center">{{ $student->email }}</td>
                                            <td class="text-center">
                                                @if($check)
                                                    Vắng mặt
                                                @endif
                                            </td>
                                            @php($text = empty($dateAbsence) ? "" : implode('a',$dateAbsence))
                                            @if(count($dateAbsence) > 0)
                                                <td title="{{ $text }}" class="text-center" data-toggle="modal" data-target="#myModal<?php echo $text;?>">
                                                    {{ count($dateAbsence) }}
                                                </td>
                                            @else
                                                <td class="text-center">0</td>
                                            @endif
                                            <div class="modal fade" id="myModal<?php echo $text;?>">
                                                <div class="modal-dialog modal-lg">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Chi tiết các buổi nghỉ học</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @php($ar = explode('a', $text))
                                                        @foreach($ar as $date)
                                                            <div class="d-flex justify-content-around pt-1 pb-1">
                                                                <div class="">{{ $date }}</div>
                                                                <div class="">
                                                                    <button class="btn btn-danger btn-sm">Xác nhận đi học</button>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
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
</style>

<script type="text/javascript">
    $(document).on("click", ".open-AddBookDialog", function () {
     var myBookId = $(this).data('id');
     $(".modal-body #bookId").val( myBookId );
     // As pointed out in comments, 
     // it is unnecessary to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});
</script>

@endsection
