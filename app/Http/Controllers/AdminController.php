<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Webpatser\Uuid\Uuid;
use App\Models\Detailadmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showAdmin(Request $request)
    {
        $statusSelected = in_array($request->get('status_user'),['active', 'null']) ? $request->get('status_user') : "active";
        $users = $statusSelected  == "active" ? User::Adminactive() : User::Adminnonactive();
        return view('data.users.index-admin', [
            'admin' => $users->where('level', 'admin')->get(),
            'statuses' => $this->statusesAdmin(),
            'statusSelected' => $statusSelected
        ]);
    }

    // Admin > Create
    public function createAdmin()
    {
        return view('auth.register-admin');
    }

    public function storeAdmin(Request $request)
    {
        $uuid = (string) Uuid::generate(4);

        $request->validate([
            'username' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'id' => $uuid,
            'email' => $request->email,
            'username' => $request->username,
            'status_user' => $request->status_user,
            'level' => $request->level,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.index');

    }

    // DetailAdmin > Create

    public function createProfilAdmin()
    {
        return view('data.users.create-admin');
    }

    public function storeProfilAdmin(Request $request)
    {
            $data = $request->all();
            $user = User::findOrFail(Auth::user()->id);
            $user->status_user = $data['status_user'];
            $user->update();

            $request->validate([
                'user_id' => 'unique:detailadmins',
                'nama' => 'required',
                'alamat' => 'required',
                'foto' => 'required',
                'background' => 'required',
            ],[
                'nama.required' => 'Nama wajib diisi !',
                'alamat.required' => 'Alamat wajib diisi !'
            ]);

            // Foto Profil
            $file_foto_profil = $request->file('foto');
            $file_foto_profil->move('foto_admin', $file_foto_profil->getClientOriginalName());
            $file_foto_profil_name = $file_foto_profil->getClientOriginalName();

            // Foto Background
            $file_foto_background = $request->file('background');
            $file_foto_background->move('background_admin', $file_foto_background->getClientOriginalName());
            $file_foto_background_name = $file_foto_background->getClientOriginalName();

            $now = Carbon::now(); // Tanggal sekarang
            $b_day = Carbon::parse($request->input('tgl_lhr')); // Tanggal Lahir
            $age = $b_day->diffInYears($now);  // Menghitung umur;


            $detail = new Detailadmin();
            $detail->create([
                "user_id" => Auth::user()->id,
                "nama" => $request->nama,
                "alamat" => $request->alamat,
                "tpt_lhr" => $request->tpt_lhr,
                "tgl_lhr" => $request->tgl_lhr,
                "umur" => $age,
                "foto" => $file_foto_profil_name,
                "background" => $file_foto_background_name,
            ]);
            return redirect()->route('admin.show_profil', Auth::user()->username);
    }

    public function editProfilAdmin()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view("data.users.edit-admin", compact("user"));
    }

    public function updateProfileAdmin(Request $request, $id)
    {
        $data = $request->all();
        $user = User::findOrFail(Auth::user()->id);

        $user->username = $data['username'];
        $user->update();

        $now = Carbon::now(); // Tanggal sekarang
        $b_day = Carbon::parse($request->input('tgl_lhr')); // Tanggal Lahir
        $age = $b_day->diffInYears($now);  // Menghitung umur;

        $ubah = Detailadmin::where('user_id', $id)->first();

        $ubah->update([
            "user_id" => Auth::user()->id,
            "nama" => $request->nama,
            "alamat" => $request->alamat,
            "tpt_lhr" => $request->tpt_lhr,
            "tgl_lhr" => $request->tgl_lhr,
            "umur" => $age,
        ]);

        if ($request->file('foto') == "") {
            $request->validate([
                'foto' => 'mimes:jpg,png,jpeg',
            ]);

        }else{
            $file_foto = public_path('/foto_admin/'). $ubah->foto;

            // Cek jika ada gambar
            if (file_exists($file_foto)) {
                // Maka hapus jika ada foto
                @unlink($file_foto);
            }

            // upload foto baru
            $file_foto = $request->file('foto');
            $file_foto->move('foto_admin', $file_foto->getClientOriginalName());
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

            $file_background = public_path('/background_admin/'). $ubah->background;

            // Cek jika ada background
            if (file_exists($file_background)) {
                // Maka hapus jika ada background
                @unlink($file_background);
            }

            // Background
            $file_background = $request->file('background');
            $file_background->move('background_admin', $file_background->getClientOriginalName());
            $file_background_name = $file_background->getClientOriginalName();

            $ubah->update([
                "background" => $file_background_name,
            ]);
        }
        return redirect()->route('admin.show_profil', $user);
    }

    public function showProfilAdmin($id)
    {
        return view('data.users.show-admin',[
            'user' => User::find($id),
        ]);
    }


    public function destroyAdmin($id)
    {
        $user = User::where('id', $id)->first();
        if (Auth::user()->status_user == 'active') {
            if ($user->status_user == 'active') {
                // Table User
                $user = User::where('id', $id)->first();
                // Table Detail User
                $hapus = Detailadmin::where('user_id', $id)->first();
                if ($hapus !== null) {
                    $file_foto = public_path('/foto_admin/'). $hapus->foto;
                    $file_background = public_path('/background_admin/'). $hapus->background;

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
                }
                $hapus->delete();
                $user = User::where('id', $id)->first();
                $user->delete();
            }else{
                $user = User::where('id', $id)->first();
                $user->delete();
            }
        }
        return redirect()->route('admin.index');
    }

    private function statusesAdmin()
    {
        return[
            'active' => 'Aktif',
            'null' => 'Tidak Aktif',
        ];
    }
}
