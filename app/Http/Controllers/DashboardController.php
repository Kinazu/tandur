<?php

namespace App\Http\Controllers;

use App\Charts\KeuntunganChart;
use App\Models\Alats;
use App\Models\Bibits;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Pupuks;
use App\Models\Tanamen;
use App\Models\User;
use Carbon\Carbon;  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    //
    public function index(KeuntunganChart $chart)
    {
        //Judul
        $title = 'dashboard';

        // $data['chart'] = $chart->build();

        //tanggal tanam dan panen
        $tanam = Carbon::parse('2023-09-23');
        $panen = Carbon::parse('2023-12-31');

        // Total Barang
        $total_tanamen = Tanamen::whereDate('tanam', '>=', $tanam)->whereDate('panen', '<=', $panen)->count();
        $total_bibits = Bibits::count();
        $total_pupuks = Pupuks::count();
        $total_alats = Alats::count();
        $total_user = User::count();

        // Pengeluaran hari ini
        $pengeluaran_now = DB::table('pengeluarans')
        ->whereDate('tgl_pengeluaran', today())
        ->value('jumlah');

        // Pemasukan hari ini
        $pemasukan_now = DB::table('pemasukans')
        ->whereDate('tgl_pemasukan', today())
        ->value('jumlah');

        // Total Pemasukan
        $jumlahmasuk = DB::table('pemasukans')->sum('jumlah');

        // Total Pengeluaran
        $jumlahkeluar = DB::table('pengeluarans')->sum('jumlah');

        //Data untuk Harian
        $labelsHari = [];
        $dataHari = [];

        for ($i = 0; $i <= 6; $i++) {
            $start = now()->subDays($i)->startOfDay();
            $end = now()->subDays($i)->endOfDay();

            $pemasukan = Pemasukan::whereBetween('tgl_pemasukan', [$start, $end])->sum('jumlah');
            $pengeluaran = Pengeluaran::whereBetween('tgl_pengeluaran', [$start, $end])->sum('jumlah');

            $labelsHari[] = $start->format('d M'); // Format tanggal sesuai kebutuhan
            $dataHari[] = $pemasukan - $pengeluaran;

        }

        //Data untuk Pekanan
        $labelsMinggu = [];
        $dataMinggu = [];

        for ($i = 0; $i <= 3; $i++) {

        $start = now()->subWeeks($i)->startOfWeek();
        $end = now()->subWeeks($i)->endOfWeek();

        $pemasukan = Pemasukan::whereBetween('tgl_pemasukan', [$start, $end])->sum('jumlah');
        $pengeluaran = Pengeluaran::whereBetween('tgl_pengeluaran', [$start, $end])->sum('jumlah');

        $labelsMinggu[] = $start->format('d M');
        $dataMinggu[] = $pemasukan-$pengeluaran;
        }
        
        //Data untuk Bulanan
        $labelsBulan = [];
        $dataBulan = [];

        for ($i = 0; $i <= 11; $i++) {

        $start = now()->subMonths($i)->startOfMonth();
        $end = now()->subMonths($i)->endOfMonth();

        $pemasukan = Pemasukan::whereBetween('tgl_pemasukan', [$start, $end])->sum('jumlah');

        $labelsBulan[] = $start->format('M Y');
        $dataBulan[] = $pemasukan;
        }

        //Data untuk Tahunan
        $labelsTahun = [];
        $dataTahun = [];

        for ($i = 0; $i <= 9; $i++) {

        $start = now()->subYears($i)->startOfYear();
        $end = now()->subYears($i)->endOfYear();

        $pemasukan = Pemasukan::whereBetween('tgl_pemasukan', [$start, $end])->sum('jumlah');

        $labelsTahun[] = $start->format('Y');
        $dataTahun[] = $pemasukan;
        }

        if (auth()->user()->type == 'admin') {
            return view('admin.dashboard', compact('title',
            'total_tanamen',
            'total_bibits',
            'total_pupuks',
            'total_alats',));
        } elseif (auth()->user()->type == 'supplier') {
            return view('supplier.dashboard');
        } else {
        return view('dashboard', compact(
        'title',
        'total_tanamen',
        'total_bibits',
        'total_pupuks',
        'total_alats',
        'total_user',
        'pemasukan_now',
        'pengeluaran_now',
        'jumlahmasuk',
        'jumlahkeluar',
        'labelsHari',
        'dataHari',
        'labelsMinggu',
        'dataMinggu',
        'labelsBulan',
        'dataBulan',
        'labelsTahun',
        'dataTahun',
        ));
        }
    }
}