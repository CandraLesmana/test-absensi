<div id="modalEdit{{ $item->id }}" class="modal" tabindex="-1" aria-labelledby="modalAdd">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">
                    Edit Karyawan
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('employee.update', $item->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">NIP</label>
                                <input type="text" class="form-control" name="nip" value="{{ $item->nip ?? '' }}" placeholder="Masukkan NIP Karyawan">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" class="form-control" name="full_name" value="{{ $item->full_name ?? '' }}" placeholder="Masukkan Nama Karyawan">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Gaji</label>
                                <input type="number" class="form-control" name="salary" value="{{ $item->salary ?? 0 }}" placeholder="Masukkan Gaji Karyawan">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Denda Keterlambatan</label>
                                <input type="number" class="form-control" name="late_charge" value="{{ $item->late_charge ?? 0 }}" placeholder="Masukkan Denda Keterlambatan Karyawan">
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

<div id="modalShow{{ $item->id }}" class="modal" tabindex="-1" aria-labelledby="modalShow">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">
                    Detail Karyawan
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">NIP</label>
                            <input type="text" class="form-control" name="nip" value="{{ $item->nip ?? '' }}">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" class="form-control" name="full_name" value="{{ $item->full_name ?? '' }}">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Gaji</label>
                            <input type="number" class="form-control" name="salary" value="{{ $item->salary ?? 0 }}" placeholder="Masukkan Gaji Karyawan">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Denda Keterlambatan</label>
                            <input type="number" class="form-control" name="late_charge" value="{{ $item->late_charge ?? 0 }}" placeholder="Masukkan Denda Keterlambatan Karyawan">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn bg-danger-subtle text-danger font-medium waves-effect" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1" aria-labelledby="vertical-center-modal"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
    <div class="modal-content modal-filled bg-light-warning">
        <div class="modal-body p-4">
        <div class="text-center text-warning">
            <i class="ti ti-alert-octagon fs-7"></i>
            <h4 class="mt-2">Peringatan !</h4>
            <p class="mt-3">
            Apakah anda yakin akan menghapus, data tidak dapat dikembalikan lagi?
            </p>
            <form action="{{ route('employee.delete', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-light my-2" data-bs-dismiss="modal">
                Continue
                </button>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>