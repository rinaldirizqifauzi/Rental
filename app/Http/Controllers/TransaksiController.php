<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rental;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function storeTransaksi(Request $request)
    {
        // dd(Auth::user()->rental->first()->harga);
         Transaksi::create([
            'user_id' => $request->user_id,
            'rental_id' => $request->rental_id,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'pick_up' => $request->pick_up,
            'status_transaksi' => $request->status_transaksi,
            'driver_confirm' => $request->driver_confirm,
        ]);

        DB::table('rental_user')->insert([
            'user_id' => Auth::user()->id,
            'rental_id' => $request->rental_id,
            'created_at' => now(),
        ]);
        return redirect()->back();
    }

    public function detailTransaksi($id)
    {
        return view('data.transaksi.detail-transaksi', [
            'transaksis' => Transaksi::where('id', $id)->first(),
        ]);
    }

    public function konfirmasiTransaksi($id)
    {
        $transaksi = Transaksi::where('id', $id)->first();

        dd($transaksi);
    }
}
