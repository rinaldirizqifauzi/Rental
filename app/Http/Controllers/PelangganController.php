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
                    $user->delete();
                // Table Detail Admin
                    $hapus = Detailuser::where('user_id', $id)->first();
                    $file_foto = public_path('/foto/'). $hapus->foto;
                    $file_background = public_path('/background/'). $hapus->background;
                // cek jika ada Foto
               if (file_exists($file_foto)){
                    // Maka Hapus Image yang ada di public
                    @unlink($file_foto);
                    }
                // cek jika ada Background
                if (file_exists($file_background)){
                    // Maka Hapus Image yang ada di public
                    @unlink($file_background);
                }

                $hapus->delete();
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
