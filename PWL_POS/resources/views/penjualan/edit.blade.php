@extends('layouts.app')

@section('subtitle', 'Edit Penjualan')
@section('content_header_title', 'Edit Penjualan')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Edit Penjualan
            </div>
            <div class="card-body">
                <form method="post" action="../edit">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="penjualan_id" value="{{ $penjualan->penjualan_id }}">
                    <div class="form-group">
                        <label for="penjualan_kode">Penjualan Kode</label>
                        <input type="text" class="form-control" id="penjualan_kode" name="penjualan_kode"
                               placeholder="Masukan Penjualan Kode" required value="{{ $penjualan->penjualan_kode }}">
                    </div>
                    <div class="form-group">
                        <label for="pembeli">Pembeli</label>
                        <input type="text" class="form-control" id="pembeli" name="pembeli"
                               placeholder="Masukan Nama Pembeli" required value="{{ $penjualan->pembeli }}">
                    </div>
                    <div class="form-group">
                        <label for="user_id">Nama User</label>
                        <select class="form-control" id="user_id" name="user_id" required>
                            <option value="" disabled selected>Pilih User</option>
                            @foreach($users as $user)
                                <option value="{{ $user->user_id }}" {{ $user->user_id == $penjualan->user_id ? 'selected' : '' }}>
                                    {{ $user->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="penjualan_tanggal">Penjualan Tanggal</label>
                        <input type="date" class="form-control" id="penjualan_tanggal" name="penjualan_tanggal"
                               required value="{{ date("Y-m-d", strtotime($penjualan->penjualan_tanggal)) }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
