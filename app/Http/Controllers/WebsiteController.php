<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mesin;
use App\Models\Rental;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $rentals = Rental::where('kode_mobil', $kode_mobil)->first();
        if ($rentals && $rentals->status == "Tersedia") {
            return view('website.detail-product', [
                'rentals' => $rentals
            ]);
        }else{
            return redirect()->back();
        }
    }

    public function recentUserProduct($id)
    {
        $users = User::find($id);

        if ($users && $users->id == auth()->user()->id) {
            return view('website.recent-product',[
                'users' => $users,
                'recents' => $users->transaksi,
            ]);
        }else {
            return redirect()->back();
        }
    }
}
