@extends('layouts.app')
{{-- Customize layout sections --}}
@section('subtitle', 'Barang')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Barang')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="float-left">Manage Barang</div>
                <a href="barang/create" class="btn btn-primary float-right">Add</a>
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
