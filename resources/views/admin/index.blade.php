@extends('layout.app')

@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Admin</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{ route('dashboard.index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Admin</li>
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
                    <i class="ti ti-plus"></i> Tambah Admin
                </button>
            </div>
            <table class="table editable-table table-bordered table-striped m-b-0">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama Lengkap</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <span class="fw-semibold">{{ $item->name }}</span><br>
                                <span style="color: gray; font-size: 12px;">{{ $item->email }}</span>
                            </td>
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

                                    @include('admin.modal', ['item' => $item])
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
                        Tambah Admin
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data"  >
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" class="form-control" name="name" placeholder="Masukkan Nama">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Masukkan Email">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
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