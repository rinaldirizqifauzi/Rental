<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        return view('data.report.index-report', [
            'reports' => Transaksi::where('status_transaksi','clear')->get(),
            'total_pendapatan' => DB::table('transaksis')->sum('total'),
            'mobil_jalan' => DB::table('transaksis')->where('status_transaksi', 'success')->count(),
            'jumlah_mobil' => DB::table('rentals')->count(),
            'mobil' => Rental::get(),
            'run_car' => Transaksi::where('status_transaksi', 'success')->get()
        ]);
    }
}
