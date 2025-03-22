@extends('layouts.app')
{{-- Customize layout sections --}}
@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Create')
{{-- Content body: main page content --}}
@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Buat kategori baru</h3>
            </div>
            <form method="post" action="../kategori">
                <div class="card-body">
{{--                    @if($errors->any())--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            <ul>--}}
                                @foreach($errors->all() as $error)
                                    <li>{{ dd($errors->all()) }}</li>
                                @endforeach
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    @endif--}}
                    <div class="form-group">
                        <label for="kode_kategori">Kode Kategori</label>
                        <input type="text" class="form-control @error('kode_kategori') is-invalid @enderror"
                               id="kode_kategori" name="kode_kategori"
                               placeholder="Masukan Kode Kategori">
                        @error('kode_kategori')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                               placeholder="Masukan Nama Kategori">
                        @error('nama_kategori')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
