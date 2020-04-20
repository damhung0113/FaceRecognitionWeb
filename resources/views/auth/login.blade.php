@extends('layouts.app')

@section('content')
</!DOCTYPE html>
<html>
<head>
  <title>
  <title>@yield('title')</title>
  <link rel="stylesheet" type="text/css" href="{{Asset('assets/css/bootstrap.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{Asset('assets/css/style.css')}}">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
  <script type="text/javascript" src="{{Asset('assets/js/jquery-validate/jquery.validate.js')}}"></script>
  </title>
</head>

<body>
<div class="divwelcom">
  <div class="logo">
    <img class="img1" src="https://vnu.edu.vn/home/images/logo.png" alt="IMG">
  </div>

  <div class="tt">
    <p style="font-size: 16pt,"><span style="color: #007f49">CỔNG THÔNG TIN ĐÀO TẠO ĐẠI HỌC </span></p>
  </div>
</div>
<div id="bentrai">
    <div id="divEr">
      <h5>QUẢN LÝ ĐIỂM DANH SINH VIÊN</h5>
      <h6>DÀNH CHO</h6>
      <ul>
        <li>Giảng viên </li>
        <li>Sinh viên </li>
      </ul>
      <h6>HƯỚNG DẪN SỬ DỤNG</h6>
      <ul>
        <li>Giảng viên : Quản lý thông tin sinh viên, kiểm tra xem sinh viên nào vắng mặt, sinh viên nào đi học đầy đủ, gửi mail về cho sinh viên.</li>
        <li>Sinh viên : Kiểm tra thông tin buổi học của mình, kiểm tra số buổi vắng mặt.</li>
      </ul>
    </div>
      
</div>
<div id="benphai">
<form method="POST" action="{{ route('login') }}">
  <h4>ĐĂNG NHẬP</h4>
  <label for="fname">Tên truy cập</label>
  <input name="email" id="email" placeholder="Email" type="email" required="" class="form-control">
  <label for="fname">Mật khẩu</label>
  <input name="password" placeholder="Password" type="password" required="" class="form-control">
  <p>Bạn chưa có tài khoản ? <a href="{{Asset('register')}}">Đăng ký</a></p>
  @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Quên mật khẩu ?') }}
                                    </a>
                                @endif
  <button class="btn btn-lg btn-primary bth-block">Đăng Nhập</button>
  {{ csrf_field() }}
</form>
</div>
<style>
#bentrai {
   float: left;
    display: block;
    padding: 10px;
    width: 55%;
    line-height: 20px;
    text-align: left;
    margin-left: 10px;

}
#benphai {
    float: right;
    display: block;
    padding: 10px;
    width: 35%;
    margin-right: 10px;
}

.nimbus-is-editor {
    background-color: white;
}
.divwelcom{
  display: block;
    text-align: left;
    margin: auto;
    border-bottom: 1px solid #c5c5c5;
    height: 110px;
}
.logo{
  float: left;
    display: block;
}
.tt{
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
</style>
</body>
</html>
@endsection
