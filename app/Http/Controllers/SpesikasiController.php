<?php

namespace App\Http\Controllers;

use App\Models\Tipe;
use App\Models\Warna;
use App\Models\Spesikasi;
use Illuminate\Http\Request;

class SpesikasiController extends Controller
{
    public function index()
    {
        return view('data.dashboard.spesifikasi.spesifikasi', [
            'spesifikasis' => Spesikasi::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'tahun' => 'required|integer|min:4',
            'sheet' => 'required|integer|max:12'
        ],[
            'nama.required' => 'Nama wajib diisi!',
            'tahun.required' => 'Tahun wajib diisi!',
            'tahun.integer' => 'Harap isi dengan angka!',
            'tahun.min' => 'Tahun min 4 karakter!',
            'sheet.required' => 'Bangku wajib diisi!',
            'sheet.integer' => 'Harap isi dengan angka!',
            'sheet.max' => 'Max 12 bangku!',
        ]);

        Spesikasi::create($validateData);
        return redirect()->back();
    }

    public function edit($nama)
    {
        return view('data.dashboard.spesifikasi.edit-spesifikasi', [
            'spesifikasis' => Spesikasi::all(),
            'spesifikasi' => Spesikasi::where('nama', $nama)->first(),
        ]);
    }


    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'tahun' => 'required|integer|min:4',
            'sheet' => 'required|integer|max:12'
        ],[
            'nama.required' => 'Nama wajib diisi!',
            'tahun.required' => 'Tahun wajib diisi!',
            'tahun.integer' => 'Harap isi dengan angka!',
            'tahun.min' => 'Tahun min 4 karakter!',
            'sheet.required' => 'Bangku wajib diisi!',
            'sheet.integer' => 'Harap isi dengan angka!',
            'sheet.max' => 'Max 12 bangku!',
        ]);

        Spesikasi::where('id', $id)->update($validateData);
        return redirect()->route('spesifikasi.index');
    }


    public function destroy($nama)
    {

        $spesifikasi = Spesikasi::where('nama', $nama)->first();
        $spesifikasi->delete();

        return redirect()->route('spesifikasi.index');
    }

    public function selectTipe(Request $request)
    {
        $tipe = Tipe::select('id', 'nama_tipe')->limit(5);
        if ($request->has('q')) {
            $tipe->where('nama_tipe', 'LIKE', "%{$request->q}%");
        }

        return response()->json($tipe->get());
    }
}
