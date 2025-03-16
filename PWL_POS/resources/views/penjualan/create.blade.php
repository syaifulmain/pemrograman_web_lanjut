@extends('layouts.app')
{{-- Customize layout sections --}}
@section('subtitle', 'Penjualan')
@section('content_header_title', 'Penjualan')
@section('content_header_subtitle', 'Create')
{{-- Content body: main page content --}}
@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Buat Penjualan Baru</h3>
            </div>
            <form method="post" action="../penjualan">
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="penjualan_kode">Penjualan Kode</label>
                            <input type="text" class="form-control" id="penjualan_kode" name="penjualan_kode"
                                   placeholder="Masukan Penjualan Kode" required>
                        </div>
                        <div class="form-group">
                            <label for="pembeli">Pembeli</label>
                            <input type="text" class="form-control" id="pembeli" name="pembeli"
                                   placeholder="Masukan Nama Pembeli" required>
                        </div>
                        <div class="form-group">
                            <label for="user_id">Nama User</label>
                            <select class="form-control" id="user_id" name="user_id" required>
                                <option value="" disabled selected>Pilih User</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->user_id }}">
                                        {{ $user->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="penjualan_tanggal">Penjualan Tanggal</label>
                            <input type="date" class="form-control" id="penjualan_tanggal" name="penjualan_tanggal"
                                   required>
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
