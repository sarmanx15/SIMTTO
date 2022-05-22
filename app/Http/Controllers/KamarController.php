<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Kamar;

class KamarController extends Controller
{
    public function index()
    {
        $kamars = Kamar::All();
        $countKamar = \DB::table('kamars')->count();
        return view(
            'admin.kamar.Mkamar',
            [
                'Kamar' => $kamars,
                'countKamar' => $countKamar,
                'tittle' => 'Kelolah Kamar'
            ]
        );
        
    }
    public function create(Request $request)
    {
        Kamar::create([
            'nama_ruang' => $request->nama_ruang,
            'kelas_perawatan' => $request->kelas_perawatan,
            'total_kamar' => $request->total_kamar,
            'kamar_terisi' =>$request->kamar_terisi,
            'sisa_kamar' => $request->total_kamar,
        ]);

        return redirect('/kamar');
    }

    public function delete($id)
    {
        $kamar = Kamar::find($id);
        $kamar->delete();
        return redirect('/kamar');
    }

    public function update(Request $request)
    {
        $kamar = Kamar::find($request->id_ruang);
        $kamar->id_ruang = $request->id_ruang;
        $kamar->nama = $request->nama;
        $kamar->total_kamar = $request->total_kamar;
        $kamar->sisa_kamar = $request->sisa_kamar;
        $kamar->save();
        return redirect('/kamar');
    }
}
