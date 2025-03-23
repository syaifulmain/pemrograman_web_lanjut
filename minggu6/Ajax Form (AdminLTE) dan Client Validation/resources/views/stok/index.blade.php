@extends('layouts.app')
{{-- Customize layout sections --}}
@section('subtitle', 'Stok')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Stok')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="float-left">Manage Stok</div>
                <a href="stok/create" class="btn btn-primary float-right">Add</a>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
