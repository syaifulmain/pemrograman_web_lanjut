<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\PenjualanDetailModel;
use App\Models\PenjualanModel;

class DashboardController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Halaman Dashboard',
            'list' => ['Dashboard']
        ];
        $page = (object) [
            'title' => 'Selamat datang di halaman Dashboard'
        ];
        $activeMenu = 'dashboard';
        $data = [
            'product'
        ];
        return view('dashboard.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function top10Sales(Request $request)
    {
        if ($request->filter == 'day') {
            $query = PenjualanDetailModel::with('barang')
                ->whereHas('penjualan', function ($query) {
                    $query->whereDate('penjualan_tanggal', Carbon::today());
                });

        } elseif ($request->filter == 'month') {
            $startOfMonth = Carbon::now()->startOfMonth();
            $endOfMonth = Carbon::now()->endOfMonth();

            $query = PenjualanDetailModel::with('barang')
                ->whereHas('penjualan', function ($query) use ($startOfMonth, $endOfMonth) {
                    $query->whereBetween('penjualan_tanggal', [$startOfMonth, $endOfMonth]);
                });

        } elseif ($request->filter == 'year') {
            $startOfYear = Carbon::now()->startOfYear();
            $endOfYear = Carbon::now()->endOfYear();

            $query = PenjualanDetailModel::with('barang')
                ->whereHas('penjualan', function ($query) use ($startOfYear, $endOfYear) {
                    $query->whereBetween('penjualan_tanggal', [$startOfYear, $endOfYear]);
                });

        } else {
            $top10Sales = [];
            return response()->json($top10Sales);
        }

        $top10Sales = $query->select('barang_id', DB::raw('SUM(jumlah) as total_terjual'))
            ->groupBy('barang_id')
            ->orderByDesc('total_terjual')
            ->limit(10)
            ->get();

        return response()->json($top10Sales);
    }

    public function totalSales(Request $request)
    {
        if ($request->filter == 'day') {

            $today = Carbon::today();
            $sevenDaysAgo = $today->copy()->subDays(6);

            $data = PenjualanDetailModel::with('penjualan')
                ->whereHas('penjualan', function ($query) use ($sevenDaysAgo, $today) {
                    $query->whereBetween('penjualan_tanggal', [$sevenDaysAgo, $today]);
                })
                ->get()
                ->groupBy(function ($item) {
                    return Carbon::parse($item->penjualan->penjualan_tanggal)->format('Y-m-d');
                })
                ->map(function ($group) {
                    return $group->sum('jumlah');
                });

            $labels = [];
            $penjualanData = [];

            for ($date = $sevenDaysAgo->copy(); $date->lte($today); $date->addDay()) {
                $key = $date->format('Y-m-d');
                $labels[] = $date->format('d M');
                $penjualanData[] = $data[$key] ?? 0;
            }

        } elseif ($request->filter == 'month') {
            $now = Carbon::now();
            $sevenMonthsAgo = $now->copy()->subMonths(6)->startOfMonth();

            $data = PenjualanDetailModel::with('penjualan')
                ->whereHas('penjualan', function ($query) use ($sevenMonthsAgo, $now) {
                    $query->whereBetween('penjualan_tanggal', [$sevenMonthsAgo, $now]);
                })
                ->get()
                ->groupBy(function ($item) {
                    return Carbon::parse($item->penjualan->penjualan_tanggal)->format('Y-m');
                })
                ->map(function ($group) {
                    return $group->sum('jumlah');
                });

            $labels = [];
            $penjualanData = [];

            for ($date = $sevenMonthsAgo->copy(); $date->lte($now); $date->addMonth()) {
                $key = $date->format('Y-m');
                $labels[] = $date->format('F'); 
                $penjualanData[] = $data[$key] ?? 0; 
            }

        } elseif ($request->filter == 'year') {
            $now = Carbon::now();
            $sevenYearsAgo = $now->copy()->subYears(6)->startOfMonth(); 

            $data = PenjualanDetailModel::with('penjualan')
                ->whereHas('penjualan', function ($query) use ($sevenYearsAgo, $now) {
                    $query->whereBetween('penjualan_tanggal', [$sevenYearsAgo, $now]);
                })
                ->get()
                ->groupBy(function ($item) {
                    return Carbon::parse($item->penjualan->penjualan_tanggal)->format('Y'); 
                })
                ->map(function ($group) {
                    return $group->sum('jumlah');
                });

            $labels = [];
            $penjualanData = [];

            for ($year = $sevenYearsAgo->year; $year <= $now->year; $year++) {
                $labels[] = (string) $year;
                $penjualanData[] = $data[$year] ?? 0;
            }
        } else {
            return response()->json([
                'labels' => [],
                'data' => []
            ]);
        }



        return response()->json([
            'labels' => $labels,
            'data' => $penjualanData
        ]);
    }
}
