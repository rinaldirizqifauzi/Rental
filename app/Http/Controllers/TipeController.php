<?php

namespace App\Http\Controllers;

use App\Models\Tipe;
use App\Models\Warna;
use Illuminate\Http\Request;

class TipeController extends Controller
{
    public function index()
    {
        return view('data.dashboard.tipe.index-tipe', [
            'tipes' => Tipe::all(),
            'warnas' => Warna::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tipe' => 'required|unique:tipes',
            'gambar' => 'required|mimes:png,jpg',
            'kode_tipe' => 'required|unique:tipes',
        ],[
            'nama_tipe.required' => 'Tipe wajib diisi!',
            'nama_tipe.unique' => 'Tipe sudah ada!',
            'gambar.required' => 'Gambar wajib diisi!',
            'gambar.mimes' => 'Gambar harus berformat *png, *jpg!',
            'kode_tipe.required' => 'Kode wajib diisi!',
        ]);

         // Gambar
         $file_gambar = $request->file('gambar');
         $file_gambar->move('gambar', $file_gambar->getClientOriginalName());
         $file_gambar_name = $file_gambar->getClientOriginalName();

         $data = new Tipe();
         $data->nama_tipe = $request->nama_tipe;
         $data->kode_tipe = $request->kode_tipe;
         $data->gambar = $file_gambar_name;
         $data->save();
         return redirect()->route('tipe.index');
    }

    public function edit($kode_tipe)
    {
        return view('data.dashboard.tipe.edit-tipe', [
            'tipes' => Tipe::all(),
            'tipe' => Tipe::where('kode_tipe', $kode_tipe)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_tipe' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg',
            'mesin' => 'required',
        ],[
            'gambar.mimes' => 'Gambar harus berformat *png, *jpg!',
        ]);

        $ubah = Tipe::find($id);
        if($request->file('gambar') == ""){
            $ubah->update([
                'nama_tipe' => $request->nama_tipe,
                'mesin' => $request->mesin,
            ]);
        }else{
            $file_gambar = public_path('/gambar/'). $ubah->gambar;

            // cek jika ada Gambar
            if (file_exists($file_gambar)){
                // Maka Hapus Image yang ada di public
                @unlink($file_gambar);
            }

            //upload new image
            $file_gambar = $request->file('gambar');
            $file_gambar->move('gambar', $file_gambar->getClientOriginalName());
            $file_gambar_name = $file_gambar->getClientOriginalName();


            $ubah->update([
                'gambar' => $file_gambar_name,
                'nama_tipe' => $request->nama_tipe,
                'mesin' => $request->mesin,
            ]);
        }

        return redirect()->route('tipe.index');
    }

    public function destroy($kode_tipe)
    {
        $data = Tipe::where('kode_tipe', $kode_tipe)->first();
        $file_gambar = public_path('/gambar/'). $data->gambar;

        // cek jika ada Gambar
        if (file_exists($file_gambar)){
            // Maka Hapus Image yang ada di public
            @unlink($file_gambar);
        }

        $data->delete($kode_tipe);
        return redirect()->route('tipe.index');
    }

    public function selectWarna(Request $request)
    {
        $warna = Warna::select('id', 'warna')->limit(5);
        if ($request->has('q')) {
            $warna->where('warna', 'LIKE', "%{$request->q}%");
        }

        return response()->json($warna->get());
    }
}
