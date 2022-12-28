<?php

namespace App\Http\Controllers;

use App\Models\Tipe;
use App\Models\Warna;
use App\Models\Rental;
use App\Models\Spesikasi;
use App\Models\Kelengkapan;
use App\Models\Mesin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RentalController extends Controller
{
    public function index(Request $request)
    {
        $statusSelected = in_array($request->get('status'),['Tersedia', 'Tidak Tersedia']) ? $request->get('status') : "Tersedia";
        $rentals = $statusSelected  == "Tersedia" ? Rental::publish() : Rental::draft();
        return view('data.rental.index',[
            'rentals' => $rentals->get(),
            'spesifikasis' => Spesikasi::all(),
            'warnas' => Warna::all(),
            'tipes' => Tipe::all(),
            'mesins' => Mesin::all(),
            'kelengkapans' => Kelengkapan::with('descendants')->onlyParent()->get(),
            'statuses' => $this->statuses(),
            'statusSelected' => $statusSelected
        ]);
    }

    public function store(Request $request)
    {
       $validatedData = $request->validate([
            'kode_mobil' => 'required',
            'id_spesifikasi' => 'required',
            'id_warna' => 'required',
            'id_tipe' => 'required',
            'id_mesin' => 'required',
            'status' => 'required',
            'no_polisi_1' => 'required|max:2',
            'no_polisi_2' => 'required|min:4|numeric',
            'no_polisi_3' => 'required|max:3',
            'bb' => 'required',
            'harga' => 'required|numeric',
        ],[
            'kode_mobil.required' => 'Kode mobil wajib diisi!',
            'id_spesifikasi.required' => 'Spesifikasi wajib dipilih!',
            'id_warna.required' => 'Warna wajib dipilih!',
            'id_tipe.required' => 'Tipe wajib dipilih!',
            'id_mesin.required' => 'Mesin wajib dipilih!',
            'status.required' => 'Status wajib dipilih!',
            'no_polisi_1.required' => 'No polisi wajib diisi!',
            'no_polisi_1.max' => 'No polisi max 2 karakter!',
            'no_polisi_2.required' => 'No polisi wajib diisi!',
            'no_polisi_2.min' => 'No polisi min 4 karakter!',
            'no_polisi_2.numeric' => 'No polisi harus isi dengan angka!',
            'no_polisi_3.required' => 'No polisi wajib diisi!',
            'no_polisi_3.max' => 'No polisi max 3 karakter!',
            'bb.required' => 'Tipe bensin wajib diisi!',
            'harga.required' => 'Harga rental wajib diisi!',
            'harga.numeric' => 'Harga rental harus isi dengan angka!',
        ]);

        $rental =  Rental::create($validatedData);

        $rental->kelengkapan()->attach($request->id_kelengkapan);
        return redirect()->route('rental.index');
    }

    public function detail($kode_mobil)
    {
        return view('data.rental.detail-rental', [
            'rental' => Rental::where('kode_mobil', $kode_mobil)->first(),
            'kelengkapans' => Kelengkapan::with('descendants')->onlyParent()->get(),
        ]);
    }

    public function edit(Request $request, $kode_mobil)
    {
        return view('data.rental.edit-rental',[
            'spesifikasis' => Spesikasi::all(),
            'warnas' => Warna::all(),
            'tipes' => Tipe::all(),
            'rental' => Rental::where('kode_mobil', $kode_mobil)->first(),
            'kelengkapans' => Kelengkapan::with('descendants')->onlyParent()->get(),
            'statuses' => $this->statuses(),
        ]);
    }

    public function update(Request $request, $kode_mobil)
    {
       $rental = Rental::where('id', $kode_mobil)->first();
        $validateData = $request->validate([
            'kode_mobil' => 'required',
            'no_polisi_1' => 'required|max:2',
            'no_polisi_2' => 'required|min:4|numeric',
            'no_polisi_3' => 'required|max:3',
            'bb' => 'required',
            'status' => 'required',
            'harga' => 'required|numeric',
        ],[
            'kode_mobil.required' => 'Kode mobil wajib diisi!',
            'status.required' => 'Status wajib dipilih!',
            'no_polisi_1.required' => 'No polisi wajib diisi!',
            'no_polisi_1.max' => 'No polisi max 2 karakter!',
            'no_polisi_2.required' => 'No polisi wajib diisi!',
            'no_polisi_2.min' => 'No polisi min 4 karakter!',
            'no_polisi_2.numeric' => 'No polisi harus isi dengan angka!',
            'no_polisi_3.required' => 'No polisi wajib diisi!',
            'no_polisi_3.max' => 'No polisi max 3 karakter!',
            'bb.required' => 'Tipe bensin wajib diisi!',
            'harga.required' => 'Harga rental wajib diisi!',
            'harga.numeric' => 'Harga rental harus isi dengan angka!',
        ]);


        $rental->update($validateData);
        $rental->kelengkapan()->sync($request->id_kelengkapan);
        return redirect()->route('rental.index');
    }

    public function destroy($kode_mobil)
    {
        $rental = Rental::where('kode_mobil', $kode_mobil)->first();
        DB::beginTransaction();
        try {
            $rental->kelengkapan()->detach();
            $rental->delete();
            return redirect()->route('rental.index');
        } catch (\Throwable $th) {
            DB::rollBack();
        }finally{
            DB::commit();
            return redirect()->route('rental.index');
        }

        return redirect()->route('rental.index');
    }

    public function selectTipe(Request $request)
    {
        $tipe = Tipe::select('id', 'nama_tipe')->limit(5);
        if ($request->has('q')) {
            $tipe->where('nama_tipe', 'LIKE', "%{$request->q}%");
        }

        return response()->json($tipe->get());
    }

    public function selectSpesifikasi(Request $request)
    {
        $spesifikasi = Spesikasi::select('id', 'nama')->limit(5);
        if ($request->has('q')) {
            $spesifikasi->where('nama', 'LIKE', "%{$request->q}%");
        }

        return response()->json($spesifikasi->get());
    }

    public function selectWarna(Request $request)
    {
        $warna = Warna::select('id', 'warna')->limit(5);
        if ($request->has('q')) {
            $warna->where('warna', 'LIKE', "%{$request->q}%");
        }

        return response()->json($warna->get());
    }

    public function selectMesin(Request $request)
    {
        $mesin = Mesin::select('id', 'nama_mesin')->limit(5);
        if ($request->has('q')) {
            $mesin->where('nama_mesin', 'LIKE', "%{$request->q}%");
        }

        return response()->json($mesin->get());
    }

    private function statuses()
    {
        return[
            'Tersedia' => 'Tersedia',
            'Tidak Tersedia' => 'Tidak Tersedia',
        ];
    }
}
