@extends('layouts.app')

@section('subtitle', 'Edit Level')
@section('content_header_title', 'Edit Level')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Edit Level
            </div>
            <div class="card-body">
                <form method="post" action="../edit">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="level_id" value="{{ $level->level_id }}">
                    <div class="form-group">
                        <label for="kodeLevel">Kode Level</label>
                        <input type="text" name="kodeLevel" class="form-control" value="{{ $level->level_kode }}" required>
                    </div>
                    <div class="form-group">
                        <label for="namaLevel">Nama Level</label>
                        <input type="text" name="namaLevel" class="form-control" value="{{ $level->level_nama }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
