@empty($user)
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
                <a href="{{ url('/user') }}" class="btn btn-warning">Kembali</a>
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
                        <label>Level Pengguna</label>
                        <select name="level_id" id="level_id" class="form-control" required disabled>
                            <option value="">- Pilih Level -</option>
                            @foreach ($level as $l)
                                <option value="{{ $l->level_id }}"
                                    {{ $l->level_id == $user->level_id ? 'selected' : '' }}>{{ $l->level_nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input value="{{ $user->username }}" type="text" name="username" id="username"
                               class="form-control" required disabled>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input value="{{ $user->nama }}" type="text" name="nama" id="nama" class="form-control"
                               required disabled>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input value="{{ $user->password }}}" type="text" name="password" id="password" class="form-control" disabled>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Keluar</button>
                </div>
            </div>
        </div>
@endempty
