@extends('layout.app')

@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Slip Gaji</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{ route('dashboard.index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Slip Gaji</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('assets/images/breadcrumb/ChatBc.png') }}" alt="" class="img-fluid mb-n4"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Periode</label>
                        <form action="{{ route('slip_gaji.store') }}" method="POST">
                            @csrf
                            <div class="d-flex">
                                <input type="text" class="form-control" id="periode" name="periode" placeholder="Masukkan Periode">
                                <button type="submit" class="btn btn-primary">Pilih</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table editable-table table-bordered table-striped m-b-0">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama Karyawan</td>
                            <td>Hari Kerja</td>
                            <td>Jumlah Absensi</td>
                            <td>Jumlah Tidak Absen Masuk/Keluar</td>
                            <td>Total Tidak Absen Masuk/Keluar</td>
                            <td>Jumlah Tidak Absen</td>
                            <td>Total Tidak Absen</td>
                            <td>Jumlah Telat Absen</td>
                            <td>Total Telat Absen</td>
                            <td>Total Denda</td>
                            <td>Total Gaji</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <span class="fw-semibold">{{ $item->full_name }}</span><br>
                                    <span style="color: gray; font-size: 12px;">{{ $item->nip }}</span>
                                </td>
                                <td>{{ $item->working_days }}</td>
                                <td>{{ $item->att_total }}</td>
                                <td>{{ $item->not_att_checkin_chekout }}</td>
                                <td>Rp {{ number_format($item->not_att_checkin_chekout_total, 0, ',', '.') }}</td>
                                <td>{{ $item->not_att }}</td>
                                <td>Rp {{ number_format($item->not_att_total, 0, ',', '.') }}</td>
                                <td>{{ $item->late_att }}</td>
                                <td>Rp {{ number_format($item->late_att_total, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($item->charge_total, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($item->net_total, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#periode').inputmask("99-9999", {
                    "placeholder": "MM-YYYY"
                });
            });
        </script>
    
    @endpush
@endsection