@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row justify-content-end mb-3">
            <div class="col-md-3 d-flex align-items-center ">
                <label for="" class="mx-3">Tanggal</label>
                <input type="text" value="{{ Carbon\Carbon::now()->format('d M Y') }}" class="form-control" disabled>
            </div>
        </div>
        <table class="table editable-table table-bordered table-striped m-b-0">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama Lengkap</td>
                    <td>Absen Masuk</td>
                    <td>Absen Keluar</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($att as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <span class="fw-semibold">{{ $item->employee->full_name }}</span><br>
                            <span style="color: gray; font-size: 12px;">{{ $item->employee->nip }}</span>
                        </td>
                        <td>{{ $item->check_in }}</td>
                        <td>{{ $item->check_out }}</td>
                        <td>
                            @if ($item->status == 1)
                                <span class="badge text-bg-success">Masuk Tepat Waktu</span>
                            @else
                                <span class="badge text-bg-danger">Telat Masuk</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection