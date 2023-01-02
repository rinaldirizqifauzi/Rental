<?php

namespace App\Http\Controllers;

use App\Models\Detailadmin;
use App\Models\User;
use App\Models\Detailuser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class DashboardController extends Controller
{

    public function index()
    {
        return view('data.dashboard.index');
    }

}
