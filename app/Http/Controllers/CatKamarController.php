<?php

namespace App\Http\Controllers;

use App\Models\Catkamar;
use Illuminate\Http\Request;
use Alert;


class CatKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Catkamar::all();
        // dd($data->kamar);
        return view('backend.catkamar.index',compact('data'));

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
        $data = new Catkamar();
        $data->label = $request->label;
        $data->save();
        Alert::success('Sukses', 'Data Berhasil Disimpan');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CatKamar  $catKamar
     * @return \Illuminate\Http\Response
     */
    public function show(CatKamar $catKamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CatKamar  $catKamar
     * @return \Illuminate\Http\Response
     */
    public function edit(CatKamar $catKamar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CatKamar  $catKamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Catkamar::findOrFail($id);
        $data->label = $request->label;

        $data->save();
        Alert::success('Sukses', 'Data Berhasil Diupdate');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CatKamar  $catKamar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Catkamar::findOrFail($id);
        $data->delete();
        Alert::success('Congrats', 'Data Berhasil Dihapus');

        return redirect()->route('catkamar.index');
    }
}