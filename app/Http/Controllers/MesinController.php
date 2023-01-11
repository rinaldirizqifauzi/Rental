<?php

namespace App\Http\Controllers;

use App\Models\Mesin;
use Illuminate\Http\Request;

class MesinController extends Controller
{
    public function index()
    {
        return view('data.dashboard.mesin.index-mesin', [
            'mesins' => Mesin::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mesin' => 'required',
            'logo' => 'mimes:jpg,png,jpeg',
        ],[
            'logo.mimes' => 'Gambar harus berformat *png, *jpg!',
            'nama_mesin.required' => 'Nama mesin wajib diisi!',
        ]);

        // Logo
        $file_logo = $request->file('logo');
        $file_logo->move('logo', $file_logo->getClientOriginalName());
        $file_logo_name = $file_logo->getClientOriginalName();

        $mesin = new Mesin();
        $mesin->create([
            'nama_mesin' => $request->nama_mesin,
            'logo' => $file_logo_name,
        ]);

        return redirect()->route('mesin.index');
    }

    public function edit($nama)
    {
        return view('data.dashboard.mesin.edit-mesin', [
            'mesins' => Mesin::all(),
            'mesin' => Mesin::where('nama_mesin', $nama)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mesin' => 'required',
            'logo' => 'mimes:jpg,png,jpeg',
        ],[
            'logo.mimes' => 'Gambar harus berformat *png, *jpg!',
        ]);

        $ubah = Mesin::find($id);
        if($request->file('logo') == ""){
            $ubah->update([
                'nama_mesin' => $request->nama_mesin,
            ]);
        }else{
            $file_logo = public_path('/logo/'). $ubah->logo;

            // cek jika ada Logo
            if (file_exists($file_logo)){
                // Maka Hapus Image yang ada di public
                @unlink($file_logo);
            }

            //upload new image
            $file_logo = $request->file('logo');
            $file_logo->move('logo', $file_logo->getClientOriginalName());
            $file_logo_name = $file_logo->getClientOriginalName();


            $ubah->update([
                'logo' => $file_logo_name,
                'nama_mesin' => $request->nama_mesin,
            ]);
        }

        return redirect()->route('mesin.index');
    }

    public function destroy($nama)
    {
        $data = Mesin::where('nama_mesin', $nama)->first();
        $file_logo = public_path('/logo/'). $data->logo;

        // cek jika ada Logo
        if (file_exists($file_logo)){
            // Maka Hapus Image yang ada di public
            @unlink($file_logo);
        }

        $data->delete($file_logo);
        return redirect()->route('mesin.index');
    }
}
