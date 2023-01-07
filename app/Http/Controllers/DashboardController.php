<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Rental;
use App\Models\Transaksi;

class DashboardController extends Controller
{

    public function index()
    {

        $hari_ini = Carbon::today();

        $loop = Transaksi::where('tgl_selesai', '<', $hari_ini)->get();
        foreach ($loop as $item) {
            $names = Carbon::parse($item->tgl_selesai);
        }
        $lama_expired = $names->diffInDays($hari_ini);

        return view('data.dashboard.index', [
            'confirms' => DB::table('rental_user')->get(),
            'confirm_now' => Transaksi::where('status_transaksi', ['pending', 'success'])->count(),
            'expired_date' =>  Transaksi::where('tgl_selesai', '<', $hari_ini)->where('status_transaksi','success')->count(),
            'kembali' =>  Transaksi::where('tgl_selesai', '<', $hari_ini)->where('status_transaksi','success')->get(),
            'lama_expired' => $lama_expired
        ]);
    }

    // Now
    public function konfirmasi()
    {
        $hari_ini = Carbon::today();

        $loop = Transaksi::where('tgl_selesai', '<', $hari_ini)->get();
        foreach ($loop as $item) {
            $names = Carbon::parse($item->tgl_selesai);
        }
        $lama_expired = $names->diffInDays($hari_ini);

        return view('data.dashboard.now.confirm_rental', [
            'transaksis' => Transaksi::where('status_transaksi', ['pending', 'success'])->get(),
            'confirms' => DB::table('rental_user')->get(),
            'confirm_now' =>Transaksi::where('status_transaksi', ['pending', 'success'])->count(),
            'expired_date' =>  Transaksi::where('tgl_selesai', '<', $hari_ini)->where('status_transaksi','success')->count(),
            'kembali' =>  Transaksi::where('tgl_selesai', '<', $hari_ini)->where('status_transaksi','success')->get(),
            'lama_expired' => $lama_expired

        ]);
    }

    public function dataMaster()
    {
       return view('data.dashboard.data-master');
    }



}
