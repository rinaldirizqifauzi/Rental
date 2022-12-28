<?php

namespace App\Http\Controllers;

use App\Models\Warna;
use Illuminate\Http\Request;

class WarnaController extends Controller
{
    public function index()
    {
        return view('data.dashboard.warna.index-warna', [
            'warnas' => Warna::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'warna' => 'required',
        ],[
            'warna.required' => 'Warna wajib diisi!',
        ]);

        Warna::create($validatedData);
        return redirect()->route('warna.index');
    }

    public function edit($id)
    {
        return view('data.dashboard.warna.edit-warna', [
            'warnas' => Warna::all(),
            'warna' => Warna::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'warna' => 'required'
        ],[
            'warna.required' => 'Warna wajib diisi!',
        ]);

        Warna::where('id', $id)->update($validatedData);
        return redirect()->route('warna.index');
    }

    public function destroy($id)
    {
        $warna = Warna::find($id);
        $warna->delete();

        return redirect()->route('warna.index');
    }
}
