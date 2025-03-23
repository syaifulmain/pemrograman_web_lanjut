@extends('layouts.app')

@section('subtitle', 'Edit Stok')
@section('content_header_title', 'Edit Stok')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Edit Stok
            </div>
            <div class="card-body">
                <form method="post" action="../edit">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="stok_id" value="{{ $stok->stok_id }}">
                    <div class="form-group">
                        <label for="barang_id">Barang</label>
                        <select class="form-control" id="barang_id" name="barang_id" required>
                            @foreach($barangs as $barang)
                                <option value="{{ $barang->barang_id }}" {{ $stok->barang_id == $barang->barang_id ? 'selected' : '' }}>
                                    {{ $barang->barang_nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="user_id">User</label>
                        <select class="form-control" id="user_id" name="user_id" required>
                            @foreach($users as $user)
                                <option value="{{ $user->user_id }}" {{ $stok->user_id == $user->user_id ? 'selected' : '' }}>
                                    {{ $user->username }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="stok_tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="stok_tanggal" name="stok_tanggal" value="{{ $stok->stok_tanggal }}" required>
                    </div>
                    <div class="form-group">
                        <label for="stok_jumlah">Jumlah</label>
                        <input type="number" class="form-control" id="stok_jumlah" name="stok_jumlah" value="{{ $stok->stok_jumlah }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
