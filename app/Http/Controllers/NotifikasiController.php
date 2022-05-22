<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelayanan;
use Illuminate\Support\Facades\Http;

class NotifikasiController extends Controller
{
    public function index()
    {
        $pelayanans = Pelayanan::all();
        return view('teknisi.notifikasi', [
            'tittle' => 'Kirim Notifikasi',
            'Pelayanan' => $pelayanans,
        ]);
    }
    public function send(Request $request)
    {
        $nama = $request->name;
        $barang = $request->type;
        $nomor = $request->nomor;
        $response = Http::post('https://hanstech-api.herokuapp.com/send-message', [
            'number' => $nomor,
            'message' => "Assalamualaikum\nHai Kak "  . $nama . ' kami dari *Hanstech computer service* ,mau menyampaikan bahwa ' . $barang .  " Sudah selesai kami perbaiki,mohon untuk segera diambil 🙏🙏🙏 \nTerimakasih"
        ]);
        if ($response) {
            $pelayanans = Pelayanan::find($request->id_pelayanan);
            $pelayanans->status_kirim = $request->status_kirim;
            $pelayanans->update();
        }

        return redirect('/notifikasi');
    }
    public function update(Request $request)
    {
        $pelayanans = Pelayanan::find($request->id_pelayanan);
        $pelayanans->biaya = $request->biaya;
        $pelayanans->save();
        return redirect('/notifikasi');
    }
}
