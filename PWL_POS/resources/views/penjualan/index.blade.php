@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a href="{{ url('/penjualan/export_excel') }}" class="btn btn-primary">
                    <i class="fa fa-file-excel"></i>
                    Export Penjualan
                </a>
                <a href="{{ url('/penjualan/export_pdf') }}" class="btn btn-warning">
                    <i class="fa fa-file-pdf"></i>
                    Export Penjualan
                </a>
                <a href="{{ url('penjualan/create') }}" class="btn btn-success">
                    Tambah
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Filter:</label>
                        <div class="col-3">
                            <input type="date" class="form-control" id="filter_tanggal" name="filter_tanggal"
                                value="{{ date('Y-m-d') }}">
                            <small class="form-text text-muted">Tanggal</small>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover table-sm" id="table_penjualan">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>Total Barang</th>
                        <th>Total Pembelian</th>
                        <th>Tanggal Pembelian</th>
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

        let dataPenjualan
        $(document).ready(function () {
            dataPenjualan = $('#table_penjualan').DataTable({
                serverSide: true,
                responsive: true,
                scrollX: true,
                autoWidth: false,
                ajax: {
                    "url": "{{ url('penjualan/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function (data) {
                        data.filter_tanggal = $('#filter_tanggal').val();
                    }
                },
                columns: [{
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "penjualan_kode",
                    className: "",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "total_item",
                    className: "",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "total_pembelian",
                    render: function (data, type, row) {
                        return 'IDR ' + new Intl.NumberFormat('id-ID', { minimumFractionDigits: 0 }).format(data);
                    },
                    className: "",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "penjualan_tanggal",
                    className: "",
                    orderable: true,
                    searchable: false
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

        $('#filter_tanggal').on('change', function () {
            dataPenjualan.ajax.reload();
        });
    </script>
@endpush