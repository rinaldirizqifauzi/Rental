<?php

namespace App\Http\Controllers;

use App\Models\Mesin;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
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
            'rentals' => Rental::get(),
            'mesins' => Mesin::get(),
        ]);
    }
}
