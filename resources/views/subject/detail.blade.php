@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Tạo môn học') }}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('home.store') }}">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tên môn học') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control"
                                           placeholder="{{ __('Tên môn học') }}"
                                           name="name" value="" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Mã môn học') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control"
                                           placeholder="{{ __('Mã môn học') }}"
                                           name="code" value="" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Ngày bắt đầu') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="date" class="form-control"
                                           placeholder="{{ __('Ngày bắt đầu') }}"
                                           name="ended_at" value="" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Ngày kết thúc') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="date" class="form-control"
                                           placeholder="{{ __('Ngày kết thúc') }}"
                                           name="name" value="" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Số tiết học') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="number" class="form-control"
                                           placeholder="{{ __('Số tiết học') }}"
                                           name="name" value="" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Số buổi học trên tuần') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="number" class="form-control"
                                           placeholder="{{ __('Số buổi học trên tuần') }}"
                                           name="name" value="" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Lưu') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
