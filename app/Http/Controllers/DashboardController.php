<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class DashboardController extends Controller
{

    public function index()
    {

        $hari_ini = Carbon::today();
        $pendapatan_now =  DB::table('transaksis')->sum('total');
        return view('data.dashboard.index', [
            'confirms' => DB::table('rental_user')->get(),
            'confirm_now' => Transaksi::where('status_transaksi', ['pending', 'success'])->count(),
            'expired_date' =>  Transaksi::where('tgl_selesai', '<', $hari_ini)->where('status_transaksi','success')->count(),
            'kembali' =>  Transaksi::where('tgl_selesai', '<', $hari_ini)->where('status_transaksi','success')->get(),
            'sewa_now' => DB::table('rental_user')->whereDate('created_at', '=' , $hari_ini->toDateString())->count(),
            'pendapatan_now' => $pendapatan_now,
        ]);
    }

    public function konfirmasi()
    {
        $hari_ini = Carbon::today();
        $pendapatan_now =  DB::table('transaksis')->whereDate('created_at', '=', $hari_ini->toDateString())->sum('total');

        $statusSelected = in_array(Request()->get('status_transaksi'),['pending', 'success']) ? Request()->get('status_transaksi') : "pending";
        $transaksis = $statusSelected  == "pending" ? Transaksi::pending() : Transaksi::success();
        return view('data.dashboard.now.confirm_rental', [
            'transaksis' =>  $transaksis->whereDate('created_at', '=' , $hari_ini->toDateString())->get(),
            'confirms' => DB::table('rental_user')->whereDate('created_at', '=', $hari_ini->toDateString())->get(),
            'confirm_now' =>Transaksi::where('status_transaksi', ['pending', 'success'])->whereDate('created_at', '=', $hari_ini->toDateString())->count(),
            'expired_date' =>  Transaksi::where('tgl_selesai', '<', $hari_ini)->where('status_transaksi','success')->count(),
            'kembali' =>  Transaksi::where('tgl_selesai', '<', $hari_ini)->where('status_transaksi','success')->get(),
            'sewa_now' => DB::table('rental_user')->whereDate('created_at', '=' , $hari_ini->toDateString())->count(),
            'pendapatan_now' => $pendapatan_now,
            'statuses' => $this->statusesTransaksi(),
            'statusSelected' => $statusSelected
        ]);

    }

    public function dataMaster()
    {
       return view('data.dashboard.data-master');
    }

    private function statusesTransaksi()
    {
        return[
            'pending' => 'Pending',
            'success' => 'Sukses',
        ];
    }

}
