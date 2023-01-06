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
        return view('website.detail-product',[
            'rentals' => Rental::where('kode_mobil', $kode_mobil)->first(),
        ]);
    }
}
