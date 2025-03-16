@extends('layouts.app')
{{-- Customize layout sections --}}
@section('subtitle', 'Stok')
@section('content_header_title', 'Stok')
@section('content_header_subtitle', 'Create')
{{-- Content body: main page content --}}
@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Buat stok baru</h3>
            </div>
            <form method="post" action="../stok">
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="barang_id">Barang</label>
                            <select class="form-control" id="barang_id" name="barang_id" required>
                                @foreach($barangs as $barang)
                                    <option value="{{ $barang->barang_id }}">
                                        {{ $barang->barang_nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="user_id">User</label>
                            <select class="form-control" id="user_id" name="user_id" required>
                                @foreach($users as $user)
                                    <option value="{{ $user->user_id }}">
                                        {{ $user->username }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="stok_tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="stok_tanggal" name="stok_tanggal" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="stok_jumlah">Jumlah</label>
                            <input type="number" class="form-control" id="stok_jumlah" name="stok_jumlah" required>
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
