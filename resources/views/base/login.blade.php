@extends('base.main-base')
@section('title', 'Đăng nhập dành cho người quản lý')
@section('page-content')
<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-5 py-lg-5">
            <div class="text-center text-muted mb-4">
              <small>Đăng nhập vào trình quản lý</small>
            </div>
              <form action="{{ route( 'login') }}" method="post" role="form">
                @csrf
              <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input class="form-control" placeholder="Nhập vào Email" type="email" name="email" value="{{ old('email') }}">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input class="form-control" placeholder="Mật Khẩu" type="password" name="pass">
                </div>
              </div>
              <div class="custom-control custom-control-alternative custom-checkbox">
                <input class="custom-control-input" id=" customCheckLogin" type="checkbox" name="remember">
                <label class="custom-control-label" for=" customCheckLogin">
                  <span class="text-muted">Nhớ phiên đăng nhập</span>
                </label>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary my-4">Đăng Nhập</button>
              </div>
            </form>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-6">
            <a href="#" class="text-light"><small>Bạn quên mật khẩu?</small></a>
          </div>
          <div class="col-6 text-right">
            <a href="{{ route("register") }}" class="text-light"><small>Đăng ký phiên quản lý mới</small></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection()
  @section('JsMore')
  @endsection()