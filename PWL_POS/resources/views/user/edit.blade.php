@extends('layouts.app')

@section('subtitle', 'Edit User')
@section('content_header_title', 'Edit User')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Edit User
            </div>
            <div class="card-body">
                <form method="post" action="../edit">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ $user->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="level_id">Level ID</label>
                        <input type="text" name="level_id" class="form-control" value="{{ $user->level_id }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
