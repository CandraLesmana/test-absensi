@extends('layout.app')

@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Karyawan</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{ route('dashboard.index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Karyawan</li>
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
            <div class="d-flex justify-content-between">
                <button class="btn me-1 mb-3 bg-primary-subtle text-primary btn-lg px-4 fs-4 font-medium" data-bs-toggle="modal" data-bs-target="#modalAdd">
                    <i class="ti ti-plus"></i> Tambah Karyawan
                </button>
            </div>
            <table class="table editable-table table-bordered table-striped m-b-0">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama Lengkap</td>
                        <td>Gaji</td>
                        <td>Denda Keterlambatan</td>
                        <td>Action</td>
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
                            <td>Rp {{ number_format($item->salary, 0, ',', '.') ?? 0 }}</td>
                            <td>Rp {{ number_format($item->late_charge, 0, ',', '.') ?? 0 }}</td>
                            <td>
                                <div class="btn-group mb-2">
                                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <a class="dropdown-item btn" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}"><i class="ti ti-pencil text-info"> </i> Edit</a>
                                        </li>
                                        
                                        <li>
                                            <a class="dropdown-item btn" data-bs-toggle="modal" data-bs-target="#modalShow{{ $item->id }}"><i class="ti ti-eye text-success"> </i> Detail</a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item btn" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $item->id }}"><i class="ti ti-trash text-danger"> </i> Delete</a>
                                        </li>
                                    </ul>

                                    @include('employee.modal', ['item' => $item])
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="modalAdd" class="modal" tabindex="-1" aria-labelledby="modalAdd">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                        Tambah Karyawan
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data"  >
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">NIP</label>
                                    <input type="text" class="form-control" name="nip" placeholder="Masukkan NIP Karyawan">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="full_name" placeholder="Masukkan Nama Karyawan">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Gaji</label>
                                    <input type="number" class="form-control" name="salary" placeholder="Masukkan Gaji Karyawan">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Denda Keterlambatan</label>
                                    <input type="number" class="form-control" name="late_charge" placeholder="Masukkan Denda Keterlambatan Karyawan">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">  
                        <button type="submit" class="btn btn-primary waves-effect font-medium">Simpan</button>
                        <button type="button" class="btn bg-danger-subtle text-danger font-medium waves-effect" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection