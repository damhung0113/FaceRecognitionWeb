@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-sm">
                            {!! Form::open(array('url' => '/student', 'method' => 'GET')) !!}
                                {{csrf_field()}}
                                <thead>
                                    <tr>
                                        <th class="text-center input-sort" data-column="id" style="width: 50px;">{{ __('No') }}</th>
                                        <th class="text-center input-sort" data-column="name">{{ __('Tên sinh viên') }}<small></small></th>
                                        <th class="text-center input-sort" data-column="code">{{ __('Mã sinh viên') }}<small></small></th>
                                        <th class="text-center input-sort" data-column="code">{{ __('Email') }}<small></small></th>
                                        <th class="text-center input-sort" data-column="code">
                                            <a href=""
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
                                            <a href="{{ route('student.index') }}"
                                                   class="btn btn-outline-dark btn-sm">{{ __('Làm mới') }}</a>
                                        </th>
                                    </tr>
                                    </thead>
                            {{ Form::close() }}
                            <tbody>
                                @php($index = 1)
                                @foreach($students as $student)
                                    <tr>
                                        <td class="text-center">{{ $index}}</td>
                                        <td class="text-center">{{ $student->name }}</td>
                                        <td class="text-center">{{ $student->code }}</td>
                                        <td class="text-center">{{ $student->email }}</td>
                                        <td class="text-center">
                                             <button type="submit" id="search" class="btn btn-primary btn-sm">{{ __('Sửa') }}</button>
                                            <a href="{{ route('student.index') }}"
                                                   class="btn btn-danger btn-sm">{{ __('Xóa') }}</a>
                                        </td>
                                    </tr>
                                    @php($index++)
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
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
