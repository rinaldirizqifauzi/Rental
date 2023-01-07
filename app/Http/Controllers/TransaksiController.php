<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rental;
use App\Models\Transaksi;
use Carbon\Carbon;
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
        $transaksis = Transaksi::where('id', $id)->first();
        $tgl_mulai = Carbon::parse($transaksis->tgl_mulai);
        $tgl_selesai = Carbon::parse($transaksis->tgl_selesai);

        $lama_hari = $tgl_selesai->diffInDays($tgl_mulai);
        $harga = $transaksis->rental->harga;

        $total = $lama_hari * $harga;

        $hari_ini = Carbon::today();

        $loop = Transaksi::where('tgl_selesai', '<', $hari_ini)->get();
        foreach ($loop as $item) {
            $names = Carbon::parse($item->tgl_selesai);
        }
        $lama_expired = $names->diffInDays($hari_ini);

        return view('data.transaksi.detail-transaksi', [
            'transaksis' => $transaksis,
            'lama_hari' => $lama_hari,
            'total' => $total,
            'confirm_now' => Transaksi::where('status_transaksi', ['pending', 'success'])->count(),
            'expired_date' =>  Transaksi::where('tgl_selesai', '<', $hari_ini)->where('status_transaksi','success')->count(),
            'kembali' =>  Transaksi::where('tgl_selesai', '<', $hari_ini)->where('status_transaksi','success')->get(),
            'lama_expired' => $lama_expired
        ]);
    }

    public function konfirmasiTransaksi(Request $request, $id)
    {
        $data = $request->all();

        $transaksis = Transaksi::where('id', $id)->first();
        $transaksis->status_transaksi = $data['status_transaksi'];
        $transaksis->total = $data['total'];
        $transaksis->update();

        DB::table('rentals')->update([
            'status' => $request->status,
        ]);
        // $rental->update();

        return redirect()->route('konfirmasi.index');
    }

    // Kembali
    public function kembaliTransaksi(Request $request, $id)
    {
        $data = $request->all();
        $transaksis = Transaksi::where('id', $id)->first();
        $transaksis->status_transaksi = $data['status_transaksi'];
        $transaksis->update();

        DB::table('rentals')->update([
            'status' => $request->status,
        ]);

        return redirect()->back();
    }
}
