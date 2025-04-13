@empty($supplier)
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kesalahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                    Data yang anda cari tidak ditemukan
                </div>
                <a href="{{ url('/kategori') }}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
@else
    @csrf
    @method('PUT')
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Kode Supplier</label>
                    <input value="{{ $supplier->supplier_kode }}" type="text" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label>Nama Supplier</label>
                    <input value="{{ $supplier->supplier_nama }}" type="text" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label>Alamat Supplier</label>
                    <input value="{{ $supplier->supplier_alamat }}" type="text" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label>Telepon Supplier</label>
                    <input value="{{ $supplier->supplier_telepon }}" type="text" class="form-control" disabled>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Keluar</button>
            </div>
        </div>
    </div>
@endempty
