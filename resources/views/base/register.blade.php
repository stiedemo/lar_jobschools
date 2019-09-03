@extends('base.main-base')
@section('title', 'Đăng ký dành cho người quản lý')
@section('page-content')

<div class="container mt--8 pb-5">
  <div class="row justify-content-center">
    <div class="col-lg-5 col-md-7">
      <div class="card bg-secondary shadow border-0">
        <div class="card-body px-lg-5 py-lg-5">
          <div class="text-center text-muted mb-4">
            <small>Đăng ký phiên quản lý mới</small>
          </div>
            <form action="{{ route( 'register') }}" method="post" role="form">
              @csrf
            <div class="form-group mb-3">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                </div>
                <input class="form-control" placeholder="Nhập vào Email" id="txt_email" type="email" name="email" value="{{ old('email') }}">
              </div>
            </div>
            <div class="form-group mb-3">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                </div>
                <input class="form-control" placeholder="Nhập vào Họ Và Tên" id="txt_name" type="text" name="name" value="{{ old('name') }}">
              </div>
            </div>
            <div class="form-group mb-3">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-tie-bow"></i></span>
                </div>
                <select class="form-control" id="txt_gioitinh" name="gioitinh"  value="{{ old('gioitinh') }}">
                  <option selected>Chọn giới tính của bạn</option>
                  <option value="0">Nam</option>
                  <option value="1">Nữ</option>
                  <option value="2">Khác</option>
                </select>
              </div>
            </div>
            <div class="form-group mb-3">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-watch-time"></i></span>
                </div>
                <input id="txt_ngaysinh" class="form-control" type="text" placeholder="Ngày sinh: Ngày/Tháng/Năm" onfocus="(this.type='date')" name="ngaysinh" value="{{ old('ngaysinh') }}">
              </div>
            </div>
            <div class="form-group mb-3">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-badge"></i></span>
                </div>
              <select class="form-control" id="txt_chucvu" name="chucvu" value="{{ old('chucvu') }}"></select>
              </div>
            </div>
            <div class="form-group mb-3">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-chart-pie-35"></i></span>
                </div>
                <input class="form-control" placeholder="Nhập vào chi đoàn mà bạn quản lý" id="txt_chidoan" type="text" name="chidoan" value="{{ old('chidoan') }}">
              </div>
            </div>
            <div class="form-group mb-3">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-briefcase-24"></i></span>
                </div>
                <input class="form-control" placeholder="Nhập vào đơn vị mà bạn công tác" id="txt_donvi" type="text" name="donvi" value="{{ old('donvi') }}">
              </div>
            </div>
            <div class="form-group mb-3">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-pin-3"></i></span>
                </div>
                <input data-toggle="modal" data-target="#modal-form" class="form-control" placeholder="Chọn vị trí của đơn vị" type="text" id="mix_address" name="mix_address" value="{{ old('mix_address') }}">
                <input type="hidden" name="re_add" id="re_add" value="{{ old('re_add') }}">
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
              <input class="custom-control-input" id=" customCheckLogin" name="check" type="checkbox" name="remember">
              <label class="custom-control-label" for=" customCheckLogin">
                <span class="text-muted">Đồng ý với <a href="">tiêu chuẩn thông tin và quy trình quản lý</a>. Mọi góp ý về cách thức thực hiện vui lòng phải hồi qua <a href="/">các phương thức liên hệ</a></span>
              </label>
            </div>
            <div class="text-center">
              <button type="button" id="insert_form_reg" class="btn btn-default my-4">Điền Mẫu</button>
              <button type="submit" class="btn btn-primary my-4">Đăng Ký</button>
            </div>
          </form>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-6"></div>
        <div class="col-6 text-right">
          <a href="{{ route( 'login') }}" class="text-light"><small>Bạn đã có tài khoản?</small></a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection()

@section('Model')
  @include('common.model-address')
@endsection
@section('JsMore')
<script>
$.get("{{ route('api_getchucvu') }}" )
.done(function( data ) {
    //  Create HTML :
    var data_chucvu = data.data;
    var html_option = [
        '<option value="0" selected>Chọn chức vụ mà bạn đảm nhiệm</option>'
    ];
    data_chucvu.forEach(chucvu => {
        html_option.push('<option id="chucvu-'+ chucvu.id +'" value="'+ chucvu.id +'">'+ chucvu.name +'</option>');
    });
    // Set HTML
    $('#txt_chucvu').html(html_option);
});
$('#insert_form_reg').click(function() {
	$('#txt_email').val("vananhnguyen.dev@gmail.com");
	$('#txt_name').val("Nguyễn Văn Anh");
  $('#txt_ngaysinh').val(10  + '/' + 05 + '/' + 2001);
	$('#txt_chucvu').val(1);
	$('#txt_gioitinh').val(0);
	$('#txt_chidoan').val('Cao Đẳng Web 1');
	$('#txt_donvi').val('Trường Cao Đẳng Nghề Công Nghệ Cao Hà Nội');
	$('#mix_address').val('Phường Tây Mỗ Quận Nam Từ Liêm Thành phố Hà Nội');
	$('#re_add').val('628');
});
</script>
@endsection()