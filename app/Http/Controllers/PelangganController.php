<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Detailuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
        public function showUser(Request $request)
        {
            $statusSelected = in_array($request->get('status_user'),['active', 'user']) ? $request->get('status_user') : "active";
            $users = $statusSelected  == "active" ? User::Pelangganactive() : User::Pelanggannonactive();
            return view('data.users.index-user', [
                'pelanggan' =>   $users->where('level' , 'pelanggan')->get(),
                'statuses' => $this->statusesPelanggan(),
                'statusSelected' => $statusSelected
            ]);
        }

        public function detailUser($id)
        {
            $user = User::where('id', $id)->first();

            return view('data.users.detail-user', [
                'user' => $user
            ]);
        }

            // User > Hapus User
    public function destroyUser($id)
    {
        $user = User::where('id', $id)->first();
        if (Auth::user()->status_user == 'active') {
            if ($user->status_user == 'active') {
                // Table User
                $user = User::where('id', $id)->first();
                // Table Detail User
                $hapus = Detailuser::where('user_id', $id)->first();
                if ($hapus !== null) {
                    $file_foto = public_path('/foto/'). $hapus->foto;
                    $file_background = public_path('/background/'). $hapus->background;
                    $file_foto_ktp = public_path('/ktp/'). $hapus->foto_ktp;
                    $file_foto_kk = public_path('/kk/'). $hapus->foto_kk;

                    $hapus->delete();
                    // cek jika ada Foto
                    if (file_exists($file_foto)){
                        echo "File foto ada di folder public/foto<br>";
                        // Maka Hapus Image yang ada di public
                        @unlink($file_foto);
                    } else {
                        echo "File foto tidak ada di folder public/foto<br>";
                    }
                    // cek jika ada Background
                    if (file_exists($file_background)){
                        echo "File background ada di folder public/background<br>";
                        // Maka Hapus Image yang ada di public
                        @unlink($file_background);
                    } else {
                        echo "File background tidak ada di folder public/background<br>";
                    }
                    // cek jika ada Ktp
                    if (file_exists($file_foto_ktp)){
                        echo "File foto KTP ada di folder public/ktp<br>";
                        // Maka Hapus Image yang ada di public
                        @unlink($file_foto_ktp);
                    } else {
                        echo "File background tidak ada di folder public/background<br>";
                    }
                        // cek jika ada Background
                    if (file_exists($file_foto_kk)){
                        echo "File foto KK ada di folder public/kk<br>";
                        // Maka Hapus Image yang ada di public
                        @unlink($file_foto_kk);
                    } else {
                        echo "File foto KK tidak ada di folder public/kk<br>";
                    }
                }
                $hapus->delete();
                $user = User::where('id', $id)->first();
                $user->delete();
            }else{
                $user = User::where('id', $id)->first();
                $user->delete();
            }
        }
        return redirect()->route('user.index');
    }


        private function statusesPelanggan()
        {
            return[
                'active' => 'Aktif',
                'user' => 'Tidak Aktif',
            ];
        }
}
