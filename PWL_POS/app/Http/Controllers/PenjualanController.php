<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use App\Models\PenjualanDetailModel;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\PenjualanModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PenjualanController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Penjualan',
            'list' => ['Home', 'Penjualan']
        ];
        $page = (object) [
            'title' => 'Daftar Penjualan'
        ];
        $activeMenu = 'penjualan';
        return view('penjualan.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function list(Request $request)
    {
        $query = PenjualanModel::select('penjualan_id', 'penjualan_kode', 'penjualan_tanggal')
            ->with('penjualanDetail');

        if ($request->filter_tanggal) {
            $query->whereDate('penjualan_tanggal', $request->filter_tanggal);
        }

        $penjualans = $query->get();

        foreach ($penjualans as $penjualan) {
            $penjualan->total_item = $penjualan->totalItem;
            $penjualan->total_pembelian = $penjualan->totalPembelian;
        }

        return DataTables::of($penjualans)
            ->addIndexColumn()
            ->addColumn('aksi', function ($penjualan) {
                $btn = '<button onclick="modalAction(\'' . url('/penjualan/' . $penjualan->penjualan_id . '/show') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/penjualan/' . $penjualan->penjualan_id . '/delete') . '\')" class="btn btn-danger btn-sm">Hapus</button>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function confirm($id)
    {
        $penjualan = PenjualanModel::with('penjualanDetail')->find($id);

        $penjualan->total_item = $penjualan->totalItem;
        $penjualan->total_pembelian = $penjualan->totalPembelian;

        return view('penjualan.confirm', [
            'penjualan' => $penjualan
        ]);
    }

    public function delete(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $penjualan = PenjualanModel::find($id);
            $penjualanDetail = PenjualanDetailModel::where('penjualan_id', $id)->get();
            if ($penjualan) {
                try {
                    foreach ($penjualanDetail as $detail) {
                        $detail->delete();
                    }
                    $penjualan->delete();
                    return response()->json([
                        'status' => true,
                        'message' => 'Data berhasil dihapus'
                    ]);
                } catch (\Illuminate\Database\QueryException $e) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Data tidak bisa dihapus'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }
        return redirect('/');
    }

    public function show(string $id)
    {
        $penjualan = PenjualanModel::where('penjualan_id', $id)
            ->with('penjualanDetail')
            ->with('penjualanDetail.barang')
            ->first();

        $detailPenjualan = $penjualan->penjualanDetail;
        $totalPembelian = $penjualan->totalPembelian;

        return view('penjualan.show', [
            'penjualan' => $penjualan,
            'detailPenjualan' => $detailPenjualan,
            'totalPembelian' => $totalPembelian,
        ]);
    }

    public function create()
    {
        $kategoris = KategoriModel::all();
        $breadcrumb = (object) [
            'title' => 'Tambah Penjualan',
            'list' => ['Home', 'Penjualan', 'Tambah Penjualan']
        ];
        $page = (object) [
            'title' => 'Tambah Penjualan'
        ];
        $activeMenu = 'penjualan';
        return view('penjualan.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'kategoris' => $kategoris,
        ]);
    }

    public function listBarang(request $request)
    {
        $barangs = BarangModel::select('barang_id', 'kategori_id', 'barang_kode', 'barang_nama', 'harga_jual');

        if ($request->kategori_id) {
            $barangs->where('kategori_id', $request->kategori_id);
        }

        return DataTables::of($barangs)
            ->addIndexColumn()
            ->addColumn('aksi', function ($barang) {
                $btn = '<button onclick="addToTablePesanan(' . htmlspecialchars(json_encode($barang), ENT_QUOTES, 'UTF-8') . ')" class="btn btn-info btn-sm">+</button> ';
                //                $btn .=  '<button onclick="modalAction(\'' . url('/barang/' . $barang->barang_id . '/show') . '\')" class="btn btn-primary btn-sm">++</button> ';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function bayar()
    {
        return view('penjualan.bayar');
    }

    public function postBayar(Request $request)
    {
        $data = json_decode($request->getContent());

        PenjualanModel::create(
            [
                'penjualan_kode' => $data->kode_transaksi,
                'penjualan_tanggal' => $data->tanggal_pesanan,
                'jumlah_pembayaran' => $data->total_bayar,
                'user_id' => auth()->user()->getUserId(),
                'pembeli' => $data->pembeli
            ]
        );

        $penjualanId = PenjualanModel::where('penjualan_kode', $data->kode_transaksi)->value('penjualan_id');

        foreach ($data->detailPesanan as $detail) {
            PenjualanDetailModel::create([
                'penjualan_id' => $penjualanId,
                'barang_id' => $detail->barang_id,
                'harga' => $detail->harga_jual,
                'jumlah' => $detail->jumlah
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Data barang berhasil disimpan'
        ]);
    }

    public function export_excel()
    {
        $query = PenjualanModel::select('penjualan_id', 'penjualan_kode', 'penjualan_tanggal')
            ->with('penjualanDetail');

        // if ($request->filter_tanggal) {
        //     $query->whereDate('penjualan_tanggal', $request->filter_tanggal);
        // }

        $penjualan = $query->get();

        foreach ($penjualan as $p) {
            $p->total_item = $p->totalItem;
            $p->total_pembelian = $p->totalPembelian;
        }

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Kode Transaksi');
        $sheet->setCellValue('C1', 'Total Barang');
        $sheet->setCellValue('D1', 'Total Pembelian');
        $sheet->setCellValue('E1', 'Tanggal Pembelian');

        $sheet->getStyle('A1:E1')->getFont()->setBold(true);

        $no = 1;
        $baris = 2;

        foreach ($penjualan as $key => $value) {
            $sheet->setCellValue('A' . $baris, $no);
            $sheet->setCellValue('B' . $baris, $value->penjualan_kode);
            $sheet->setCellValue('C' . $baris, $value->total_item);
            $sheet->setCellValue('D' . $baris, $value->total_pembelian);
            $sheet->setCellValue('E' . $baris, $value->penjualan_tanggal);

            $no++;
            $baris++;
        }

        foreach (range('A', 'E') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $sheet->setTitle('Data Level');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $filename = 'Data Level ' . date('Y-m-d H:i:s') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');

        $writer->save('php://output');
        exit;
    }

    public function export_pdf()
    {
        $query = PenjualanModel::select('penjualan_id', 'penjualan_kode', 'penjualan_tanggal')
            ->with('penjualanDetail');

        // if ($request->filter_tanggal) {
        //     $query->whereDate('penjualan_tanggal', $request->filter_tanggal);
        // }

        $penjualan = $query->get();

        foreach ($penjualan as $p) {
            $p->total_item = $p->totalItem;
            $p->total_pembelian = $p->totalPembelian;
        }

        $pdf = Pdf::loadView('penjualan.export_pdf', ['penjualan' => $penjualan]);
        $pdf->setPaper('A4', 'potrait');
        $pdf->setOptions([
            'isRemoteEnabled' => true,
        ]);
        $pdf->render();

        return $pdf->download('Data User ' . date('Y-m-d H:i:s') . '.pdf');
    }
}
