@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-body">
            <div class="row">
                <div class="col-4 border">
                    <div class="row">
                        <p class="col-6 text-left" id="tanggal_pesanan">{{ date('Y-m-d') }}</p>
                        <p class="col-6 text-right" id="kode_transaksi">{{ date('YmdHis') }}</p>
                    </div>
                    <div class="form-group">
                        <label>Pembeli</label>
                        <input type="text" name="pembeli" id="pembeli" class="form-control" required>
                        <small id="error-pembeli" class="error-text form-text text-danger"></small>
                    </div>
                    <div class="col text-lg bg-info">
                        <div class="row">
                            <p class="col text-left">Total Pembelian:</p>
                            <p class="col text-right">
                                <strong class="" id="total_pembelian">0</strong>
                            </p>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped table-hover table-sm" id="table_pesanan">
                        <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Barang</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="col-8 p-0">
                    <div class="col border p-1">
                        <button class="btn btn-lg btn-success" data-toggle="modal" id="btn_bayar">
                            Bayar
                        </button>
                        <button onclick="clearTablePesanan()" class="btn btn-lg btn-danger">
                            Clear
                        </button>
                    </div>
                    <div class="col border pt-1">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-1 control-label col-form-label">Filter:</label>
                                    <div class="col-3">
                                        <select class="form-control" id="kategori_id" name="kategori_id" required>
                                            <option value="">- Semua -</option>
                                            @foreach ($kategoris as $kategori)
                                                <option value="{{ $kategori->kategori_id }}">{{ $kategori->kategori_nama }}</option>
                                            @endforeach
                                        </select>
                                        <small class="form-text text-muted">Kategori Barang</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-hover table-sm" id="table_list_barang">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="total_pembelian2">Total Pembelian</label>
                        <input type="text" id="total_pembelian2" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_pembayaran">Jumlah Pembayaran</label>
                        <input type="number" id="jumlah_pembayaran" name="jumlah_pembayaran" class="form-control"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="kembalian">Kembalian</label>
                        <input type="text" id="kembalian" class="form-control" readonly>
                    </div>
                    <button id="selesaikan_penjualan" class="btn btn-primary">Bayar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        let dataPesanan = []

        $('#jumlah_pembayaran').on('change', function () {
            let totalPembelian = dataPesanan.total_pembelian;
            let jumlahPembayaran = parseFloat($(this).val());
            let kembalian = jumlahPembayaran - totalPembelian;
            $('#kembalian').val(kembalian.toLocaleString());
        });

        function clearTablePesanan() {
            // Clear all rows in the table
            if (!window.confirm('Apakah Anda yakin ingin menghapus semua pesanan?')) return;

            resetPesanan();
        }

        function addToTablePesanan(barang) {
            let table = $('#table_pesanan');
            let found = false;

            // Loop through existing rows to check if the item already exists
            table.find('tbody tr').each(function () {
                let kode = $(this).find('td').eq(0).text(); // Get the "Kode" column value
                if (kode === barang.barang_kode) {
                    // Increment the quantity and update the subtotal
                    let qtyCell = $(this).find('td').eq(2);
                    let qty = parseInt(qtyCell.text()) + 1;
                    dataPesanan.detailPesanan.forEach(function (item) {
                        if (item.barang_id == barang.barang_id) {
                            item.jumlah = qty;
                        }
                    });
                    qtyCell.text(qty);

                    let harga = parseInt(barang.harga_jual);
                    $(this).find('td').eq(4).text('IDR ' + (qty * harga).toLocaleString());
                    found = true;
                    return false; // Exit the loop
                }
            });

            // If the item is not found, add a new row
            if (!found) {
                dataPesanan.detailPesanan.push({
                    barang_id: barang.barang_id,
                    jumlah: 1,
                    harga_jual: barang.harga_jual
                });
                let newRow = `
            <tr>
                <td>${barang.barang_kode}</td>
                <td>${barang.barang_nama}</td>
                <td>1</td>
                <td>IDR ${parseInt(barang.harga_jual).toLocaleString()}</td>
                <td>IDR ${parseInt(barang.harga_jual).toLocaleString()}</td>
                <td>
                    <button class="btn btn-danger btn-sm" onclick="removeRow(this)">-</button>
                </td>
                <td class="d-none">${barang.barang_id}</td>
            </tr>
        `;
                table.find('tbody').append(newRow);
            }

            // Calculate the total after adding the item
            calculateTotal();
        }

        function removeRow(button) {
            // Remove the row from the table
            $(button).closest('tr').remove();
            let barangId = $(button).closest('tr').find('td').eq(6).text(); // Get the hidden barang_id column value
            dataPesanan.detailPesanan = dataPesanan.detailPesanan.filter(item => item.barang_id != barangId);
            calculateTotal();
        }

        function calculateTotal() {
            let total = 0;
            $('#table_pesanan tbody tr').each(function () {
                let subtotal = $(this).find('td').eq(4).text().replace(/[^0-9]/g, ''); // Remove non-numeric characters
                total += parseInt(subtotal);
            });
            dataPesanan.total_pembelian = total;
            $('#total_pembelian').text('IDR ' + total.toLocaleString());
            $('#total_pembelian2').val(total.toLocaleString());
        }

        function resetPesanan() {
            $('#table_pesanan tbody').empty();

            $('#total_pembelian').text('IDR 0');

            $('#total_pembelian2').val(0);

            $('#jumlah_pembayaran').val(0);

            $('#kembalian').val(0);

            $('#myModal').modal('hide');

            dataPesanan = [];
            dataPesanan.detailPesanan = []
        }

        let listBarang
        $(document).ready(function () {
            // Reset the total pembelian
            resetPesanan();

            dataPesanan = {
                tanggal_pesanan: $('#tanggal_pesanan').text(),
                kode_transaksi: $('#kode_transaksi').text(),
            };

            dataPesanan.detailPesanan = []

            listBarang = $('#table_list_barang').DataTable({
                serverSide: true,
                responsive: true,
                scrollX: true,
                autoWidth: false,
                ajax: {
                    "url": "{{ url('penjualan/list_barang') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function (data) {
                        data.kategori_id = $('#kategori_id').val();
                    }
                },
                columns: [{
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                },
                    {
                        data: "barang_kode",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "barang_nama",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "harga_jual",
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

        $('#kategori_id').on('change', function () {
            listBarang.ajax.reload();
        });

        $('#btn_bayar').on('click', function () {
            if (dataPesanan.detailPesanan.length == 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Peringatan',
                    text: 'Tidak ada barang yang dipilih'
                });
                return;
            }
            $('#myModal').modal('show');
        });

        $('#selesaikan_penjualan').on('click', function () {

            if ($('#jumlah_pembayaran').val() < dataPesanan.total_pembelian) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Peringatan',
                    text: 'Jumlah Pembayaran tidak valid'
                });
                return;
            }

            let pembeli = $('#pembeli').val();

            let total_bayar = parseFloat($('#jumlah_pembayaran').val());

            dataPesanan.pembeli = pembeli;
            dataPesanan.total_bayar = total_bayar;

            $.ajax({
                url: "{{ url('penjualan/store') }}",
                type: "POST",
                data: JSON.stringify(dataPesanan),
                success: function (response) {
                    if (response.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.message
                        });
                        resetPesanan();

                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan',
                            text: response.message
                        });
                    }
                },
            });

            resetPesanan();
        });
    </script>
@endpush
