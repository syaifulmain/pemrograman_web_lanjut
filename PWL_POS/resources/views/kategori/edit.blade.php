@extends('layouts.app')

@section('subtitle', 'Edit Kategori')
@section('content_header_title', 'Edit Kategori')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Edit Kategori
            </div>
            <div class="card-body">
                <form method="post" action="../edit">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="kategori_id" value="{{ $kategori->kategori_id }}">
                    <div class="form-group">
                        <label for="kodeKategori">Kode Kategori</label>
                        <input type="text" name="kodeKategori" class="form-control" value="{{ $kategori->kategori_kode }}" required>
                    </div>
                    <div class="form-group">
                        <label for="namaKategori">Nama Kategori</label>
                        <input type="text" name="namaKategori" class="form-control" value="{{ $kategori->kategori_nama }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
