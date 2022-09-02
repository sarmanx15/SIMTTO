<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Alert;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();
        // dd($kelas);
        return view('backend.kelas.index',['kelas'=> $kelas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "label" => "required|unique:kelas,label",
        ]);
        if ($validator->fails()) {
        Alert::error('Gagal', 'Nama Kelas Sudah Dipakai, Gunakan Nama Lain!');

            return redirect()->back();
        }

        $kelas = new Kelas();
        $kelas->label = $request->label;
        $kelas->save();
        activity()->log('Menambah Data Kelas [ '.$kelas->label.' ]');
        Alert::success('Sukses', 'Data Berhasil Disimpan');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "label" => "required|unique:kelas,label",
        ]);
        if ($validator->fails()) {
            Alert::error('Gagal', 'Nama Kelas Sudah Dipakai, Gunakan Nama Lain!');
            return redirect()->back();
        }

        $kelas = Kelas::findOrFail($id);
        $kelas->label = $request->label;
        
        $kelas->updated_at = \Carbon\Carbon::now();
        $kelas->save(['timestamps' => false]);

        activity()->log('Mengupdate Data Kelas [ ' . $kelas->label . ' ]');
        Alert::success('Sukses', 'Data Berhasil Diupdate');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        activity()->log('Menghapus Data Kelas [ ' . $kelas->label . ' ]');
        Alert::success('Congrats', 'Data Berhasil Dihapus');

        return redirect()->route('kelas.index');
    }
}
