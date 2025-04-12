@empty($penjualan)
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kesalahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                    Data yang anda cari tidak ditemukan
                </div>
                <a href="{{ url('/penjualan') }}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
@else
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Struk Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                @if(!empty($penjualan->pembeli))
                    <p><strong>Pembeli:</strong> {{$penjualan->pembeli}}</p>
                @endif
                <p><strong>Tanggal:</strong> {{$penjualan->penjualan_tanggal}}</p>
                <p><strong>No. Transaksi:</strong> {{$penjualan->penjualan_kode}}</p>

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Deskripsi</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($detailPenjualan as $item)
                        <tr>
                            <td>{{ $item->barang->barang_kode }}</td>
                            <td>{{ $item->barang->barang_nama }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>IDR {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>IDR {{ number_format($item->harga * $item->jumlah, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="4"><strong>Total</strong></td>
                        <td><strong>IDR {{ number_format($totalPembelian, 0, ',', '.') }}</strong></td>
                    </tr>
                    </tfoot>
                </table>

                <h6 class="mt-4">Payment Information</h6>
                <ul class="list-unstyled">
                    <li><strong>Amount Paid:</strong> IDR {{ number_format($penjualan->jumlah_pembayaran, 0, ',', '.') }}</li>
                    <li><strong>Changes:</strong> IDR {{ number_format($penjualan->jumlah_pembayaran - $totalPembelian, 0, ',', '.') }}</li>
                    <li><strong>Total Amount:</strong> IDR {{ number_format($totalPembelian, 0, ',', '.') }}</li>
                </ul>
            </div>
        </div>
    </div>
@endempty
