
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <base href="{{ asset('') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> @yield('title') </title>
  <!-- Favicon -->
  <link href="/assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="/assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="/assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
</head>

<body class="bg-default">
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
        <a class="navbar-brand" href="{{ route('index') }}">
          <img src="/assets/img/brand/white.png" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="{{ route('index') }}">
                  <img src="/assets/img/brand/blue.png">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <!-- Navbar items -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="{{ route('index') }}">
                <i class="ni ni-planet"></i>
                <span class="nav-link-inner--text">Trang Chủ</span>
              </a>
            </li>
            <li class="nav-item">
            <a class="nav-link nav-link-icon" href="{{ route('register') }}">
                <i class="ni ni-circle-08"></i>
                <span class="nav-link-inner--text">Đăng ký phiên quản lý</span>
              </a>
            </li><li class="nav-item">
              <a class="nav-link nav-link-icon" href="{{ route('login') }}">
                <i class="ni ni-key-25"></i>
                <span class="nav-link-inner--text">Đăng nhập</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="{{ route('index') }}">
                <i class="ni ni-collection"></i>
                <span class="nav-link-inner--text">Hướng dẫn sẻ dụng</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">CHÀO MỪNG</h1>
              <h3 class="text-white">Đã Đến Với JOBSchool</h3>
              <p class="text-lead text-light">Sử dụng công cụ. Giải quyết các khó khăn hoàn toàn miễn phí</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    @yield('page-content')
    <footer class="py-5">
      <div class="container">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
            JOBSchool BY TieuHauVuong © 2019 Design FrontEnd By<a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="https://facebook.com/nguyenvananh.2k1" class="nav-link" target="_blank">Nguyễn Văn Anh</a>
              </li>
              <li class="nav-item">
                <a href="tel:0583.466.994" class="nav-link" target="_blank">0583.466.994</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!--   Core   -->
  <script src="/assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="/assets/js/argon-dashboard.min.js?v=1.1.0"></script>
  <script src="/assets/js/plugins/notify/notify.js"></script>
  <script>
      @if(count($errors) > 0)
          @foreach ($errors->all() as $error)
          $.notify("{{ $error }}", "error");
          @endforeach
      @endif
      @if(session('thongbao'))
          $.notify("{{ session('thongbao') }}", "{{ session('type') }}");
      @endif
  </script>
  @yield('Model')
  @yield('JsMore')
</body>
</html>