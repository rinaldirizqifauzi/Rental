<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        $hari_ini = Carbon::today();
        return view('data.dashboard.index', [
            'confirms' => DB::table('rental_user')->get(),
            'confirm_now' => DB::table('rental_user')->whereDate('created_at', $hari_ini)->count(),
        ]);
    }

    // Now
    public function konfirmasi()
    {
        $hari_ini = Carbon::today();
        return view('data.dashboard.now.confirm_rental', [
            'transaksis' => Transaksi::all(),
            'confirms' => DB::table('rental_user')->get(),
            'confirm_now' => DB::table('rental_user')->whereDate('created_at', $hari_ini)->count(),
        ]);
    }

    public function dataMaster()
    {
       return view('data.dashboard.data-master');
    }



}
