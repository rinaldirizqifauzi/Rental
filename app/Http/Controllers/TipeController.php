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
            'gambar1' => 'required|mimes:png,jpg',
            'gambar2' => 'required|mimes:png,jpg',
            'gambar3' => 'required|mimes:png,jpg',
            'kode_tipe' => 'required|unique:tipes',
        ],[
            'nama_tipe.required' => 'Tipe wajib diisi!',
            'nama_tipe.unique' => 'Tipe sudah ada!',
            'gambar.required' => 'Gambar wajib diisi!',
            'gambar1.required' => 'Gambar 1 wajib diisi!',
            'gambar2.required' => 'Gambar 2 wajib diisi!',
            'gambar3.required' => 'Gambar 3 wajib diisi!',
            'gambar.mimes' => 'Gambar harus berformat *png, *jpg!',
            'gambar1.mimes' => 'Gambar 1 harus berformat *png, *jpg!',
            'gambar2.mimes' => 'Gambar 2 harus berformat *png, *jpg!',
            'gambar3.mimes' => 'Gambar 3 harus berformat *png, *jpg!',
            'kode_tipe.required' => 'Kode wajib diisi!',
        ]);

         // Gambar
         $file_gambar = $request->file('gambar');
         $file_gambar->move('gambar', $file_gambar->getClientOriginalName());
         $file_gambar_name = $file_gambar->getClientOriginalName();

         // Gambar 1
         $file_gambar1 = $request->file('gambar1');
         $file_gambar1->move('gambar1', $file_gambar1->getClientOriginalName());
         $file_gambar1_name = $file_gambar1->getClientOriginalName();

         // Gambar 2
         $file_gambar2 = $request->file('gambar2');
         $file_gambar2->move('gambar2', $file_gambar2->getClientOriginalName());
         $file_gambar2_name = $file_gambar2->getClientOriginalName();

         // Gambar 3
         $file_gambar3 = $request->file('gambar3');
         $file_gambar3->move('gambar3', $file_gambar3->getClientOriginalName());
         $file_gambar3_name = $file_gambar3->getClientOriginalName();

         $data = new Tipe();
         $data->nama_tipe = $request->nama_tipe;
         $data->kode_tipe = $request->kode_tipe;
         $data->gambar = $file_gambar_name;
         $data->gambar1 = $file_gambar1_name;
         $data->gambar2 = $file_gambar2_name;
         $data->gambar3 = $file_gambar3_name;
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
            'gambar' => 'mimes:png,jpg',
            'gambar1' => 'mimes:png,jpg',
            'gambar2' => 'mimes:png,jpg',
            'gambar3' => 'mimes:png,jpg',
        ],[
            'gambar.mimes' => 'Gambar harus berformat *png, *jpg!',
            'gambar1.mimes' => 'Gambar 1 harus berformat *png, *jpg!',
            'gambar2.mimes' => 'Gambar 2 harus berformat *png, *jpg!',
            'gambar3.mimes' => 'Gambar 3 harus berformat *png, *jpg!',
        ]);

        $ubah = Tipe::find($id);
        // Gambar
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
            ]);
        }
        // Gambar 1
        if($request->file('gambar1') == ""){
            $ubah->update([
                'nama_tipe' => $request->nama_tipe,
            ]);
        }else{
            $file_gambar1 = public_path('/gambar1/'). $ubah->gambar1;

            // cek jika ada Gambar
            if (file_exists($file_gambar1)){
                // Maka Hapus Image yang ada di public
                @unlink($file_gambar1);
            }

            //upload new image
            $file_gambar1 = $request->file('gambar1');
            $file_gambar1->move('gambar1', $file_gambar1->getClientOriginalName());
            $file_gambar1_name = $file_gambar1->getClientOriginalName();


            $ubah->update([
                'gambar1' => $file_gambar1_name,
                'nama_tipe' => $request->nama_tipe,
            ]);
        }
        // Gambar 2
        if($request->file('gambar2') == ""){
            $ubah->update([
                'nama_tipe' => $request->nama_tipe,
            ]);
        }else{
            $file_gambar2 = public_path('/gambar2/'). $ubah->gambar2;

            // cek jika ada Gambar
            if (file_exists($file_gambar2)){
                // Maka Hapus Image yang ada di public
                @unlink($file_gambar2);
            }

            //upload new image
            $file_gambar2 = $request->file('gambar2');
            $file_gambar2->move('gambar2', $file_gambar2->getClientOriginalName());
            $file_gambar2_name = $file_gambar2->getClientOriginalName();


            $ubah->update([
                'gambar2' => $file_gambar2_name,
                'nama_tipe' => $request->nama_tipe,
            ]);
        }
        // Gambar 3
        if($request->file('gambar3') == ""){
            $ubah->update([
                'nama_tipe' => $request->nama_tipe,
            ]);
        }else{
            $file_gambar3 = public_path('/gambar3/'). $ubah->gambar3;

            // cek jika ada Gambar
            if (file_exists($file_gambar3)){
                // Maka Hapus Image yang ada di public
                @unlink($file_gambar3);
            }

            //upload new image
            $file_gambar3 = $request->file('gambar3');
            $file_gambar3->move('gambar3', $file_gambar3->getClientOriginalName());
            $file_gambar3_name = $file_gambar3->getClientOriginalName();


            $ubah->update([
                'gambar3' => $file_gambar3_name,
                'nama_tipe' => $request->nama_tipe,
            ]);
        }

        return redirect()->route('tipe.index');
    }

    public function destroy($kode_tipe)
    {
        $data = Tipe::where('kode_tipe', $kode_tipe)->first();
        $file_gambar = public_path('/gambar/'). $data->gambar;
        $file_gambar1 = public_path('/gambar1/'). $data->gambar1;
        $file_gambar2 = public_path('/gambar2/'). $data->gambar2;
        $file_gambar3 = public_path('/gambar3/'). $data->gambar3;

        // cek jika ada Gambar
        if (file_exists($file_gambar)){
            // Maka Hapus Image yang ada di public
            @unlink($file_gambar);
        }
        // cek jika ada Gambar1
        if (file_exists($file_gambar1)){
            // Maka Hapus Image yang ada di public
            @unlink($file_gambar1);
        }
        // cek jika ada Gambar2
        if (file_exists($file_gambar2)){
            // Maka Hapus Image yang ada di public
            @unlink($file_gambar2);
        }
        // cek jika ada Gambar3
        if (file_exists($file_gambar3)){
            // Maka Hapus Image yang ada di public
            @unlink($file_gambar3);
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
