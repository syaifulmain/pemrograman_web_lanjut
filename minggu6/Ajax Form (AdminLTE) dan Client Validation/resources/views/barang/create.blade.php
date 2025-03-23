@extends('layouts.app')
{{-- Customize layout sections --}}
@section('subtitle', 'Barang')
@section('content_header_title', 'Barang')
@section('content_header_subtitle', 'Create')
{{-- Content body: main page content --}}
@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Buat Barang Baru</h3>
            </div>
            <form method="post" action="../barang">
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="barang_kode">Barang Kode</label>
                            <input type="text" class="form-control" id="barang_kode" name="barang_kode"
                                   placeholder="Masukan Barang Kode" required>
                        </div>
                        <div class="form-group">
                            <label for="barang_nama">Barang Nama</label>
                            <input type="text" class="form-control" id="barang_nama" name="barang_nama"
                                   placeholder="Masukan Barang Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="harga_beli">Harga Beli</label>
                            <input type="number" class="form-control" id="harga_beli" name="harga_beli"
                                   placeholder="Masukan Harga Beli" required>
                        </div>
                        <div class="form-group">
                            <label for="harga_jual">Harga Jual</label>
                            <input type="number" class="form-control" id="harga_jual" name="harga_jual"
                                   placeholder="Masukan Harga Jual" required>
                        </div>
                        <div class="form-group">
                            <label for="kategori_id">Kategori</label>
                            <select class="form-control" id="kategori_id" name="kategori_id" required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                @foreach($kategori as $item)
                                    <option value="{{ $item->kategori_id }}">
                                        {{ $item->kategori_kode }} - {{ $item->kategori_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
