<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme">

<head>
  <!-- Required meta tags -->
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- Favicon icon-->
<link
  rel="shortcut icon"
  type="image/png"
  href="{{ asset('assets/images/logo.png') }}"
/>

<!-- Core Css -->
<link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />

  <title>Absensi</title>
</head>

<body>
  <!-- Preloader -->
  <div id="main-wrapper">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
      <div class="position-relative z-index-5">
        <div class="row">
          <div class="col-xl-7 col-xxl-8">
            <a href="#" class="text-nowrap logo-img d-block px-4 py-9 w-100">
              <span class="fw-semibold fs-7 align-middle bg-primary rounded-circle text-white px-2" style="width: 100px; height: 100px;">A</span><span class="fw-semibold mx-2 fs-7 align-middle">bsensi</span>
            </a>
            <div class="d-none d-xl-flex align-items-center justify-content-center" style="height: calc(100vh - 80px);">
              <img src="{{ asset('assets/images/backgrounds/login-security.svg') }}" alt="" class="img-fluid" width="500">
            </div>
          </div>
          <div class="col-xl-5 col-xxl-4">
            <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
              <div class="col-sm-8 col-md-6 col-xl-9">
                <h2 class="mb-3 fs-7 fw-bolder">Login</h2>
                <p class=" mb-9">Admin Dashboard</p>
                <form action="{{ route('login') }}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="{{ old('email') }}" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="{{ old('password') }}" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remeber this Device
                      </label>
                    </div>
                  </div>
                  <button type="submit" href="" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign In</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="dark-transparent sidebartoggler"></div>
  <!-- Import Js Files -->

<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/js/app.init.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>

<script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('assets/js/theme.js') }}"></script>

</body>

</html>