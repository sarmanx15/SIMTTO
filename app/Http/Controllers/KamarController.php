<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Catkamar;
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
        if(auth()->user()->admin == 0){
            $kelola = auth()->user()->kamar_id;
            $kamar = Kamar::where('kamar_id',$kelola)->get();
        }else{
            $kamar = Kamar::all();

        }
        // dd($kamar);
        // dd($kamar);
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
        $kamar = Catkamar::all();
        return view('backend.kamar.create', compact('kelas','kamar'));
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
            "kamar_id"      => "required",
            "kelas_id"      => "required",
            "total_kamar"   => "required",
            "total_terisi"  => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $kamar = new Kamar();

        // $kamar->nama_ruang = $request->nama_ruang;
        $kamar->kamar_id = $request->kamar_id;
        $kamar->kelas_id = $request->kelas_id;
        $kamar->user_id = auth()->user()->id;
        // $kamar->pria = $request->pria;
        // $kamar->wanita = $request->wanita;
        $kamar->total_kamar = $request->total_kamar;
        $kamar->total_terisi = $request->total_terisi;
        $kamar->sisa_kamar = $request->total_kamar - $request->total_terisi;
        $kamar->save();
        activity()->log('Menambah Data Kamar [ ' . $kamar->catkamar->label . ' ]');

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
        $mkamar = Catkamar::all();
        $kelas = Kelas::all();
        
        return view('backend.kamar.edit', compact('kamar','mkamar', 'kelas'));
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
            "total_kamar" => "required",
            "total_terisi" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $kamar = Kamar::findOrFail($id);
        // $kamar->nama_ruang = $request->nama_ruang;
        if($request->kamar_id !== null){
        $kamar->kamar_id = $request->kamar_id;
        }
        $kamar->kelas_id = $request->kelas_id;
        $kamar->user_id = auth()->user()->id;
        // $kamar->pria = $request->pria;
        // $kamar->wanita = $request->wanita;
        $kamar->total_kamar = $request->total_kamar;
        $kamar->total_terisi = $request->total_terisi;
        $kamar->sisa_kamar = $request->total_kamar - $request->total_terisi;
        
        $kamar->keterangan = $request->keterangan;
        $kamar->updated_at = \Carbon\Carbon::now();
        $kamar->save(['timestamps' => false]);

        activity()->log('Mengedit Data Kamar [ ' . $kamar->catkamar->label . ' ]');
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
        activity()->log('Menghapus Data Kamar [ ' . $kamar->catkamar->label . ' ]');

        Alert::success('Sukses', 'Data Berhasil Dihapus');


        return redirect()->route('kamar.index');
    }
}
