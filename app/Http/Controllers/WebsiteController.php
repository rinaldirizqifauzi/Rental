<?php

namespace App\Http\Controllers;

use App\Models\Mesin;
use App\Models\Rental;
use App\Models\Detailuser;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class WebsiteController extends Controller
{
    public function home()
    {
    return view('website.homepage');
    }

    public function beranda()
    {
        return view('website.beranda', [
            'rentals' => Rental::get(),
        ]);
    }

    public function showHomepage()
    {

        return view('website.product', [
            'rentals' => Rental::where('status', 'tersedia')->get(),
            'mesins' => Mesin::get(),
        ]);
    }

    public function showDetailProduct($kode_mobil)
    {
        // dd(Auth::user()->detail->first()->foto_kk);
        return view('website.detail-product',[
            'rentals' => Rental::where('kode_mobil', $kode_mobil)->first(),
        ]);
    }

    public function updateDetailProductProfil(Request $request, $id)
    {
        dd($request->all());
        $ubah = Detailuser::where('user_id', $id)->first();

        if (Auth::user()->detail->first()->foto_ktp) {
            $file_ktp = public_path('/ktp/'). $ubah->foto_ktp;

            // Cek jika ada ktp
            if (file_exists($file_ktp)) {
                // Maka hapus jika ada background
                @unlink($file_ktp);
            }

            $ubah->update([
                "foto_ktp" => $request->file('foto_ktp'),
            ]);
        }

        if (Auth::user()->detail->first()->foto_ktp) {
            $file_kk = public_path('/kk/'). $ubah->foto_kk;

            // Cek jika ada kk
            if (file_exists($file_kk)) {
                // Maka hapus jika ada background
                @unlink($file_kk);
            }

            // Foto KK
            $file_kk = $request->file('foto_kk');
            $file_kk->move('kk', $file_kk->getClientOriginalName());
            $file_kk_name = $file_kk->getClientOriginalName();

            $ubah->update([
                "foto_kk" => $file_kk_name,
            ]);

        }
        return redirect()->route('show.profil', Auth::user()->email);
    }
}
