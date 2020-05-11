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
                                               name="code" value="{{ request('email') }}"/>
                                    </th>
                                    <th>
                                        <select class="form-control form-control-sm">
                                            <option value="-1" selected></option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </th>
                                    <th class="text-center">
                                        <button type="submit" id="search" class="btn btn-primary btn-sm">{{ __('Tìm kiếm') }}</button>
                                        <a href="{{ route('home.index') }}"
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
                                        <tr>
                                            <td class="text-center">{{ $index }}</td>
                                            <td class="text-center">{{ $student->name }}</td>
                                            <td class="text-center">{{ $student->code }}</td>
                                            <td class="text-center">{{ $student->email }}</td>
                                            @php($text = empty($dateAbsence) ? "" : implode(', ',$dateAbsence))
                                            <td title="{{ $text }}" class="text-center">
                                                {{ count($dateAbsence) }}
                                            </td>
                                            <td class="text-center"></td>
                                        </tr>
                                        @php($index++)
                                    @endforeach
                                @else
                                    <tr class="text-center">
                                        <td colspan="4">{{ __('Không có dữ liệu phù hợp') }}</td>
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

@endsection
