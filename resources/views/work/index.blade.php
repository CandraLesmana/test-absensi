@extends('layout.app')

@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Jadwal Kerja</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{ route('dashboard.index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Jadwal Kerja</li>
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
            <form action="{{ route('work.update') }}" method="POST" enctype="multipart/form-data"  >
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Hari Kerja</label>
                                <input type="number" class="form-control" value="{{ $data->working_days ?? '' }}" name="working_days">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jam Masuk</label>
                                <input type="time" class="form-control" value="{{ $data->work_hours ?? '' }}" name="work_hours">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary waves-effect font-medium">Simpan</button>
            </form>
        </div>
    </div>

    <div id="modalAdd" class="modal" tabindex="-1" aria-labelledby="modalAdd">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                        Ubah Karyawan
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('work.update') }}" method="POST" enctype="multipart/form-data"  >
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Hari Kerja</label>
                                    <input type="number" class="form-control" name="nip">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Jam Masuk</label>
                                    <input type="text" class="form-control" name="full_name">
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