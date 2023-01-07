<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('data.report.index-report', [
            'reports' => Transaksi::where('status_transaksi','success')->get(),
        ]);
    }
}
