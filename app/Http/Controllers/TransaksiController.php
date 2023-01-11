<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Rental;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function storeTransaksi(Request $request)
    {
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

        return redirect()->route('product.recent', Auth::user()->id);
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
        $sewa_now = DB::table('rental_user')->count();
        $pendapatan_now =  DB::table('transaksis')->sum('total');

        return view('data.transaksi.detail-transaksi', [
            'transaksis' => $transaksis,
            'lama_hari' => $lama_hari,
            'total' => $total,
            'confirm_now' => Transaksi::where('status_transaksi', ['pending', 'success'])->count(),
            'expired_date' =>  Transaksi::where('tgl_selesai', '<', $hari_ini)->where('status_transaksi','success')->count(),
            'kembali' =>  Transaksi::where('tgl_selesai', '<', $hari_ini)->where('status_transaksi','success')->get(),
            'sewa_now' => $sewa_now,
            'pendapatan_now' => $pendapatan_now,
        ]);
    }

    public function konfirmasiTransaksi(Request $request, $id)
    {

        $data = $request->all();
        $transaksis = Transaksi::where('id', $id)->first();
        $transaksis->status_transaksi = $data['status_transaksi'];
        $transaksis->total = $data['total'];
        $transaksis->update();


        $id_transaksi = Transaksi::where('id', $id)->get();
        foreach ($id_transaksi as $id) {
            $rental_id = $id->rental->id;
        }

        // Jika Memilih salah satu dan mobil yang lain akan dihapus
        if (Transaksi::where('rental_id', $rental_id)->where('status_transaksi', 'success')->exists()) {
            Transaksi::where('rental_id', $rental_id)->where('status_transaksi', 'pending')->delete();
        }

        DB::table('rentals')->where('id', $rental_id)->update([
            'status' => $request->status,
        ]);

        return redirect()->route('konfirmasi.index');
    }

    // Kembali
    public function kembaliTransaksi(Request $request, $id)
    {
        $data = $request->all();
        $transaksis = Transaksi::where('id', $id)->first();
        $transaksis->status_transaksi = $data['status_transaksi'];
        $transaksis->update();

        $id_transaksi = Transaksi::where('id', $id)->get();
        foreach ($id_transaksi as $id) {
           $rental_id = $id->rental->id;
        }

        DB::table('rentals')->where('id', $rental_id)->update([
            'status' => $request->status,
        ]);

        return redirect()->back();
    }
}
