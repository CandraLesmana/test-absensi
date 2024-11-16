<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absensi</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logo.png') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}"/>

    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">

    @stack('css')
</head>
<body>

    <div class="preloader">
        <img
          src="{{ asset('assets/images/logo.png') }}"
          alt="loader"
          class="lds-ripple"
        />
    </div>


    <div id="main-wrapper">

        @include('component.sidebar')

        <div class="page-wrapper">
            @include('component.header')

            <div class="body-wrapper">
                <div class="container-fluid">

                    @if(session('success') || session('error'))
                        <div class="alert alert-{{ session('success') ? 'success' : 'danger' }} alert-dismissible bg-{{ session('success') ? 'success' : 'danger' }} text-white border-0 fade show" role="alert">
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                            {{ session('success') ?? session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')
    
                </div>
            </div>
        </div>

    </div>

    <div class="dark-transparent sidebartoggler"></div>

    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.init.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>

    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>

    <script src="{{ asset('assets/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script> --}}
    <script src="{{ asset('assets/js/dashboards/dashboard.js') }}"></script>

    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-basic.init.js') }}"></script>

    <script src="{{ asset('assets/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/forms/sweet-alert.init.js') }}"></script>

    @stack('js')
</body>
</html>