<div id="modalEdit{{ $item->id }}" class="modal" tabindex="-1" aria-labelledby="modalAdd">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">
                    Edit Admin
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.update', $item->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="name" value="{{ $item->name ?? '' }}" placeholder="Masukkan Nama">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $item->email ?? '' }}" placeholder="Masukkan Email">
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

<div id="modalShow{{ $item->id }}" class="modal" tabindex="-1" aria-labelledby="modalShow">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">
                    Detail Admin
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="name" value="{{ $item->name ?? '' }}" placeholder="Masukkan Nama">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $item->email ?? '' }}" placeholder="Masukkan Email">
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
            <form action="{{ route('admin.delete', $item->id) }}" method="POST">
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