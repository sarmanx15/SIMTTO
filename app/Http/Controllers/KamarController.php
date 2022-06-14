<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Alert;
class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kamar = Kamar::all();
        return view('backend.kamar.index', ['kamar' => $kamar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('backend.kamar.create', compact('kelas'));
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
            "nama_ruang" => "required",
            "kelas_id" => "required",
            // "pria" => "required",
            // "wanita" => "required",
            "total_kamar" => "required",
            "total_terisi" => "required",
            // "sisa_kamar" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $kamar = new Kamar();

        $kamar->nama_ruang = $request->nama_ruang;
        $kamar->kelas_id = $request->kelas_id;
        $kamar->user_id = auth()->user()->id;
        // $kamar->pria = $request->pria;
        // $kamar->wanita = $request->wanita;
        $kamar->total_kamar = $request->total_kamar;
        $kamar->total_terisi = $request->total_terisi;
        $kamar->sisa_kamar = $request->total_kamar - $request->total_terisi;
        $kamar->save();
        Alert::success('Congrats', 'Data Berhasil Disimpan');

        return redirect()->route('kamar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function show(Kamar $kamar)
    {
         //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kamar = Kamar::findOrFail($id);
        $kelas = Kelas::all();
        return view('backend.kamar.edit', compact('kamar', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            // "pria" => "required",
            // "wanita" => "required",
            "total_kamar" => "required",
            "total_terisi" => "required",
            // "sisa_kamar" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $kamar = Kamar::findOrFail($id);
        $kamar->nama_ruang = $request->nama_ruang;
        $kamar->kelas_id = $request->kelas_id;
        $kamar->user_id = auth()->user()->id;
        // $kamar->pria = $request->pria;
        // $kamar->wanita = $request->wanita;
        $kamar->total_kamar = $request->total_kamar;
        $kamar->total_terisi = $request->total_terisi;
        $kamar->sisa_kamar = $request->total_kamar - $request->total_terisi;

        $kamar->save();

        Alert::success('Congrats', 'Data Berhasil Diupdate');

        return redirect()->route('kamar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kamar = Kamar::findOrFail($id);

        $kamar->delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus');


        return redirect()->route('kamar.index');
    }
}
