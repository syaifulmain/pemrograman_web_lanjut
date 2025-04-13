@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <button onclick="modalAction('{{ url('supplier/import') }}')" class="btn btn-info">
                    Import Supplier
                </button>
                <a href="{{ url('/supplier/export_excel') }}" class="btn btn-primary">
                    <i class="fa fa-file-excel"></i>
                    Export Supplier
                </a>
                <a href="{{ url('/supplier/export_pdf') }}" class="btn btn-warning">
                    <i class="fa fa-file-pdf"></i>
                    Export Supplier
                </a>
                <button onclick="modalAction('{{ url('supplier/create') }}')" class="btn btn-success mt-1">
                    Tambah
                </button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm" id="table_supplier">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Supplier</th>
                    <th>Nama Supplier</th>
                    <th>Alamat Supplier</th>
                    <th>Telepon Supplier</th>
                    <th>Aksi</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static"
         data-keyboard="false" data-width="75%" aria-hidden="true"></div>
@endsection
@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function () {
                $('#myModal').modal('show');
            });
        }

        let dataSupplier;
        $(document).ready(function () {
            dataSupplier = $('#table_supplier').DataTable({
                serverSide: true,
                responsive: true,
                scrollX: true,
                autoWidth: false,
                ajax: {
                    "url": "{{ url('supplier/list') }}",
                    "dataType": "json",
                    "type": "POST",
                },
                columns: [
                    {
                        data: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "supplier_kode",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'supplier_nama',
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'supplier_alamat',
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'supplier_telepon',
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "aksi",
                        className: "",
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endpush
