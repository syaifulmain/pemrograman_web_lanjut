@extends('layouts.app')

@section('subtitle', 'Edit Barang')
@section('content_header_title', 'Edit Barang')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Edit Barang
            </div>
            <div class="card-body">
                <form method="post" action="../edit">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="barang_id" value="{{ $barang->barang_id }}">
                    <div class="form-group">
                        <label for="barang_kode">Barang Kode</label>
                        <input type="text" class="form-control" id="barang_kode" name="barang_kode"
                               placeholder="Masukan Barang Kode" value="{{ $barang->barang_kode }}" required>
                    </div>
                    <div class="form-group">
                        <label for="barang_nama">Barang Nama</label>
                        <input type="text" class="form-control" id="barang_nama" name="barang_nama"
                               placeholder="Masukan Barang Nama" value="{{ $barang->barang_nama }}" required>
                    </div>
                    <div class="form-group">
                        <label for="harga_beli">Harga Beli</label>
                        <input type="number" class="form-control" id="harga_beli" name="harga_beli"
                               placeholder="Masukan Harga Beli" value="{{ $barang->harga_beli }}" required>
                    </div>
                    <div class="form-group">
                        <label for="harga_jual">Harga Jual</label>
                        <input type="number" class="form-control" id="harga_jual" name="harga_jual"
                               placeholder="Masukan Harga Jual" value="{{ $barang->harga_jual }}" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori_id">Kategori</label>
                        <select class="form-control" id="kategori_id" name="kategori_id" required>
                            @foreach($kategori as $item)
                                <option value="{{ $item->kategori_id }}" {{ $item->kategori_id == $barang->kategori_id ? 'selected' : '' }}>
                                    {{ $item->kategori_kode }} - {{ $item->kategori_nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
