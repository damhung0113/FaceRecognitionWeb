@extends('layouts.app')

@section('content')
  <head>
    <title>
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{Asset('assets/css/bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{Asset('assets/css/style.css')}}">
    </title>
  </head>

  <div class="divwelcom">
    <div class="logo">
      <img class="img1" src="https://vnu.edu.vn/home/images/logo.png" alt="IMG">
    </div>

    <div class="tt">
      <p style="font-size: 16pt,"><span style="color: #007f49" class="text-center">ỨNG DỤNG NHẬN DIỆN KHUÔN MẶT VÀO ĐIỂM DANH SINH VIÊN</span></p>
    </div>
  </div>


  <main class="login-form">
    <div class="cotainer">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">ĐĂNG NHẬP</div>
            <div class="card-body">
              <form method="POST" action="{{ route('login') }}" class="form-login">
                  <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>
                    <div class="col-md-6">
                      <input type="text" id="email" class="form-control" name="email" >
                       @error('email')
                      <small class="form-text text-muted">{{ $message }}</small>
                  @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Mật khẩu</label>
                    <div class="col-md-6">
                      <input type="password" id="password" class="form-control" name="password" >
                       @error('password')
                      <small class="form-text text-muted">{{ $message }}</small>
                  @enderror
                    </div>
                  </div>
                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">Đăng Nhập</button>
                  </div>
                {{ csrf_field() }}
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <style>
    .divwelcom {
      display: block;
      text-align: left;
      margin: auto;
      border-bottom: 1px solid #c5c5c5;
      height: 110px;
    }

    .logo {
      float: left;
      display: block;
    }

    .tt {
      float: left;
      display: block;
      height: 100px;
      text-align: left;
      vertical-align: middle;
      width: auto;
      color: #007f49;
      font-size: 16pt;
      font-weight: bold;
      margin: 10px 10px 10px 10px;
    }

    h6,h5,h4,h3,h2 {
        display: block;
        margin-block-start: 1.33em;
        margin-block-end: 1.33em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        font-weight: bold;
        color: green;
    }

    body {
      margin: 0;
      font-size: .9rem;
      font-weight: 400;
      line-height: 1.6;
      color: #212529;
      text-align: left;
      background-color: #f5f8fa;
    }

    .navbar-laravel {
      box-shadow: 0 2px 4px rgba(0,0,0,.04);
    }

    .navbar-brand , .nav-link, .my-form, .login-form {
      font-family: Raleway, sans-serif;
    }
    .my-form {
      padding-top: 1.5rem;
      padding-bottom: 1.5rem;
    }

    .my-form .row {
      margin-left: 0;
      margin-right: 0;
    }

    .login-form {
      padding-top: 1.5rem;
      padding-bottom: 1.5rem;
    }

    .login-form .row {
      margin-left: 0;
      margin-right: 0;
    }
  </style>
@endsection
