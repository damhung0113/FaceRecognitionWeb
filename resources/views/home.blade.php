@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Mã sinh viên: {{ $student->code }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-sm">
                            {!! Form::open(array('url' => '/home', 'method' => 'GET')) !!}
                                {{csrf_field()}}
                                <thead>
                                <tr>
                                    <th class="text-center input-sort" data-column="id" style="width: 50px;">{{ __('No') }}</th>
                                    <th class="text-center input-sort" data-column="name">{{ __('Tên môn học') }}<small></small></th>
                                    <th class="text-center input-sort" data-column="code">{{ __('Mã môn học') }}<small></small></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>
                                        <input type="text" class="form-control form-control-sm" placeholder="{{ __('Tên môn học') }}"
                                               name="name" value="{{ request('name') }}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control form-control-sm" placeholder="{{ __('Mã môn học') }}"
                                               name="code" value="{{ request('code') }}"/>
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
                                @if($subjects->isNotEmpty())
                                    @php($index = 1)
                                    @foreach($subjects as $subject)
                                        <tr>
                                            <td class="text-center">{{ $index }}</td>
                                            <td class="text-center">{{ $subject->name }}</td>
                                            <td class="text-center">{{ $subject->code }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-success"
                                                   href="{{ route('home.show', $subject->id) }}">{{ __('Chi tiết lớp học') }}</a>
                                            </td>
                                        </tr>
                                        @php($index++)
                                    @endforeach
                                @else
                                    <tr class="text-center">
                                        <td colspan="3">{{ __('Không có dữ liệu phù hợp') }}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <strong>{{ __('Tổng số :num môn học', array('num' =>  $subjects->count()))}}</strong> <br>
                        </div>
                        <div class="col-md-8">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
