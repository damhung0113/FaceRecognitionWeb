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
    <h6>THÔNG BÁO</h6>
      <ul>
        <li>(Video) Hướng dẫn sử dụng Cổng thông tin đào tạo - Đăng ký học</li>
        <li>(Video) Bài giảng môn Tin học cơ sở  | Câu hỏi ôn tập</li>
        <li>Kỹ năng học tập hiệu quả ở bậc đại học</li>
      </ul>
    </div>
      
</div>
<div id="benphai">
<form method="POST" action="{{ route('register') }}">
                        @csrf
                        <h4>ĐĂNG KÝ</h4>
                                <label for="fname">Tên truy cập</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Username">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                         
                                <label for="fname">Địa chỉ Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <label for="fname">Mật khẩu</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label for="fname">Nhập lại mật khẩu</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Re_Password">
                          
                        <p>Bạn đã có tài khoản ? <a href="{{Asset('login')}}">Đăng Nhập</a></p>
 <div class="buttonDK">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Đăng Ký') }}
                                </button>
                            </div>
</form>   
</div>
<style>
.buttonDK{
  text-align: center;
}
button{
  width: 430px;
}
#bentrai {
   float: left;
    display: block;
    padding: 10px;
    width: 55%;
    line-height: 20px;
    text-align: left;
    margin-left: 20px;

}
#benphai {
    float: right;
    display: block;
    padding: 10px;
    width: 35%;
    margin-right: 20px;
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
