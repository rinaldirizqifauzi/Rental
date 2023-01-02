<?php

namespace App\Http\Controllers;

use App\Models\Detailuser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showProfil($id)
    {
        return view('website.show-profil',[
            'user' =>  Detailuser::find($id),
        ]);
    }

    public function createProfil()
    {
        $user = User::findOrFail(Auth::user()->id);

        return view("website.create-profil", compact("user"));
    }

    public function storeProfil(Request $request)
    {

        $data = $request->all();
        $user = User::findOrFail(Auth::user()->id);
        $user->status_user = $data['status_user'];
        $user->level = $data['level'];
        $user->update();


        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'foto' => 'required|mimes:png,jpg',
            'background' => 'required|mimes:png,jpg',
        ]);

         // Foto Profil
         $file_foto_profil = $request->file('foto');
         $file_foto_profil->move('foto', $file_foto_profil->getClientOriginalName());
         $file_foto_profil_name = $file_foto_profil->getClientOriginalName();
         // Foto Background
         $file_foto_background = $request->file('background');
         $file_foto_background->move('background', $file_foto_background->getClientOriginalName());
         $file_foto_background_name = $file_foto_background->getClientOriginalName();

        $detail = new Detailuser();
        $detail->create([
            "user_id" => Auth::user()->id,
            "nama" => $request->nama,
            "email" => $request->email,
            "username" => $request->username,
            "no_hp" => $request->no_hp,
            "alamat" => $request->alamat,
            "foto" => $file_foto_profil_name,
            "background" =>  $file_foto_background_name,
        ]);

        return redirect()->route('beranda');

    }

    public function editProfil()
    {
        $user = User::findOrFail(Auth::user()->id);

        return view("website.edit-profil", compact("user"));
    }

    public function updateProfil(Request $request, $id)
    {
        $data = $request->all();
        $user = User::findOrFail(Auth::user()->id);

        $user->status_user = $data['status_user'];
        $user->username = $data['username'];
        $user->update();

        $request->validate([
            'nama' => 'required',
            'foto' => 'mimes:jpg,png,jpeg',
            'background' => 'mimes:jpg,png,jpeg',
            'no_hp' => 'required',
        ]);

        $ubah = Detailuser::findOrFail($id);

        if ($request->file('foto') == "") {
            $request->validate([
                'foto' => 'mimes:jpg,png,jpeg',
            ]);

        }else{
            $file_foto = public_path('/foto/'). $ubah->foto;

            // Cek jika ada gambar
            if (file_exists($file_foto)) {
                // Maka hapus jika ada foto
                @unlink($file_foto);
            }

            // upload foto baru
            $file_foto = $request->file('foto');
            $file_foto->move('foto', $file_foto->getClientOriginalName());
            $file_foto_name = $file_foto->getClientOriginalName();

            $ubah->update([
                "foto" => $file_foto_name,
            ]);
        }

        if ($request->file('background') == "") {
            $request->validate([
                'background' => 'mimes:jpg,png,jpeg',
            ]);
        }else{

            $file_background = public_path('/background/'). $ubah->background;


            // Cek jika ada background
            if (file_exists($file_background)) {
                // Maka hapus jika ada background
                @unlink($file_background);
            }

            // Background
            $file_background = $request->file('background');
            $file_background->move('background', $file_background->getClientOriginalName());
            $file_background_name = $file_background->getClientOriginalName();

            $ubah->update([
                "background" => $file_background_name,
            ]);
        }

        if ($request->file('foto_ktp') == "") {
            $request->validate([
                'foto_ktp' => 'mimes:jpg,png,jpeg',
            ]);
        }else{

            $file_ktp = public_path('/ktp/'). $ubah->foto_ktp;


            // Cek jika ada ktp
            if (file_exists($file_ktp)) {
                // Maka hapus jika ada background
                @unlink($file_ktp);
            }

            // Foto KTP
            $file_ktp = $request->file('foto_ktp');
            $file_ktp->move('ktp', $file_ktp->getClientOriginalName());
            $file_ktp_name = $file_ktp->getClientOriginalName();

            $ubah->update([
                "foto_ktp" => $file_ktp_name,
            ]);
        }

        if ($request->file('foto_kk') == "") {
            $request->validate([
                'foto_kk' => 'mimes:jpg,png,jpeg',
            ]);

        }else{
            $file_kk = public_path('/kk/'). $ubah->foto_kk;

            // Cek jika ada kk
            if (file_exists($file_kk)) {
                // Maka hapus jika ada background
                @unlink($file_kk);
            }

            // Foto KK
            $file_kk = $request->file('foto_kk');
            $file_kk->move('kk', $file_kk->getClientOriginalName());
            $file_kk_name = $file_kk->getClientOriginalName();

            $ubah->update([
                "foto_kk" => $file_kk_name,
            ]);

        }
        return redirect()->route('show.profil', Auth::user()->email);
    }
}
