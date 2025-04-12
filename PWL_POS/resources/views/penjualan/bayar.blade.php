<div id="modal-master" class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Pembayaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="form-pembayaran" method="POST" action="{{ url('/penjualan/bayar') }}">
                @csrf
                <div class="form-group">
                    <label for="total_pembelian">Total Pembelian</label>
                    <input type="text" id="total_pembelian" class="form-control"
                            value="{{$dataPesanan['total_pembelian']}}" readonly>
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
                <button type="submit" class="btn btn-primary">Bayar</button>
            </form>
        </div>
    </div>
</div>
@push('js')
    <script>
        $(document).ready(function () {
            $.ajax({
                url: "{{ url('penjualan/bayar') }}",
                type: "POST",
                success: function (response) {
                    console.log(response);
                }
            });
        });
        $('#jumlah_pembayaran').on('change', function () {
            let totalPembelian = parseFloat($('#total_pembelian').val().replace(/[^0-9.-]+/g, ""));
            let jumlahPembayaran = parseFloat($(this).val());
            let kembalian = jumlahPembayaran - totalPembelian;
            $('#kembalian').val(kembalian.toLocaleString('id-ID', {minimumFractionDigits: 2}));
        });
@endpush


