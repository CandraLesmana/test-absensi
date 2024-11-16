<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Absensi</title>

        <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logo.png') }}" />

        <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />

        <link rel="stylesheet" href="{{ asset('assets/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}"/>

        <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">

    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="#">
                    <span class="fw-semibold fs-7 align-middle bg-white rounded-circle text-primary px-2" style="width: 100px; height: 100px;">A</span>
                    <span class="fw-semibold fs-7 align-middle">bsensi</span>
                </a>
                <a href="/login" class="text-white">Log In</a>
            </div>
        </nav>

        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary"></div>
                        <div class="card-body d-flex justify-content-center">
                            <div class="text-center">
                                <h3 class="mb-3">Absen Karyawan</h3>
                                <span>Masukan NIP Anda</span>
                                <form action="{{ route('welcome') }}" method="GET">
                                    <input type="text" name="nip" class="form-control mb-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer bg-primary"></div>
                    </div>
                </div>
            </div>

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

            @if ($nip)
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body d-flex justify-content-center">
                                <div class="card-body d-flex justify-content-center">
                                    <div class="text-center">
                                        <h3 class="mb-3 text-success">Absen Masuk</h3>
                                        @if (!$att || !$att->check_in)
                                            <form action="{{ route('check_in') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="nip" value="{{ $nip }}">
                                                <button type="submit" class="btn btn-success">Absen</button>
                                            </form>
                                        @else 
                                            <span>{{ $att->date ?? '' }}</span>
                                            <span>{{ $att->check_in ?? '' }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($att)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body d-flex justify-content-center">
                                    <div class="card-body d-flex justify-content-center">
                                        <div class="text-center">
                                            <h3 class="mb-3 text-danger">Absen Keluar</h3>
                                            @if ($att && !$att->check_in)
                                                <span class="text-danger">Absen Masuk Terlebih Dahulu!</span>
                                            @else
                                                @if (!$att->check_out)
                                                    <form action="{{ route('check_out') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="nip" value="{{ $nip }}">
                                                        <button type="submit" class="btn btn-danger">Absen</button>
                                                    </form>
                                                @else 
                                                    <span>{{ $att->date }}</span>
                                                    <span>{{ $att->check_in }}</span>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </body>
</html>
