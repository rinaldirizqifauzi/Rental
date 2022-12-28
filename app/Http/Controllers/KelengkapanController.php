<?php

namespace App\Http\Controllers;

use App\Models\Kelengkapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelengkapanController extends Controller
{
    public function index()
    {
        $kelengkapans = Kelengkapan::onlyParent()->with('descendants')->get();
        return view('data.dashboard.kelengkapan.index-kelengkapan', compact('kelengkapans'));
    }

    public function store(Request $request)
    {

        $validateData =  Validator::make(
            $request->all(),
            [
                'kode' => 'required|unique:kelengkapans',
                'nama' => 'required',
            ],[
                'kode.required' => 'Kode wajib diisi!',
                'nama.required' => 'Nama wajib diisi!'
            ],
        );

        if($validateData->fails()) {
            if($request->has('parent_kelengkapan')){
                $request['parent_kelengkapan']  = Kelengkapan::select('id', 'nama')->find($request->parent_kelengkapan);
            }
            return redirect()->back()->withInput($request->all())->withErrors($validateData);
        }

        try {
            Kelengkapan::create([
                'kode' => $request->kode,
                'nama' => $request->nama,
                'parent_id' => $request->parent_kelengkapan
            ]);

            return redirect()->route('kelengkapan.index');
        }catch(\Throwable $th){
            if($request->has('parent_kelengkapan')){
                $request['parent_kelengkapan']  = Kelengkapan::select('id', 'nama')->find($request->parent_kelengkapan);
            }
            return redirect()->back()->withInput($request->all())->withErrors($validateData);
        }
    }


    public function edit($kode)
    {
        return view('data.dashboard.kelengkapan.edit_kelengkapan',[
            'kelengkapan' => Kelengkapan::where('kode', $kode)->first(),
            'kelengkapans' => Kelengkapan::onlyParent()->with('descendants')->get(),
        ]);
    }


    public function update(Request $request, $kode)
    {

        $validator = Validator::make($request->all(),
        [
            'nama' => 'required',
        ],[
            'nama.required' => 'Nama wajib diisi!'
        ]);

        if ($validator->fails()) {
            if ($request->has('parent_kelengkapan')) {
                $request['parent_kelengkapan'] = Kelengkapan::select('id','nama')->find($request->parent_kelengkapan);
            }
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        //proses
        try {
            Kelengkapan::where('id', $kode)->update([
                    'kode' => $request->kode,
                    'nama'=> $request->nama,
                     'parent_id'=> $request->parent_kelengkapan
                ]);
                return redirect()->route('kelengkapan.index');
            } catch (\Throwable $th) {
                if ($request->has('parent_kelengkapan')) {
                    $request['parent_kelengkapan'] = Kelengkapan::select('id','nama')->find($request->parent_kelengkapan);
                }
                return redirect()->back()->withInput($request->all());
        }
    }

    public function destroy($kode)
    {
        $kelengkapan = Kelengkapan::where('kode', $kode)->first();
        $kelengkapan->delete();

        return redirect()->route('kelengkapan.index');
    }

    public function selectKelengkapan(Request $request)
    {
        $kelengkapan = Kelengkapan::select('id', 'nama')->limit(5);
        if ($request->has('q')) {
            $kelengkapan->where('nama', 'LIKE', "%{$request->q}%");
        }

        return response()->json($kelengkapan->get());
    }

}
