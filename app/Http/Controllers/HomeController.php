<?php

namespace App\Http\Controllers;
use App\Models\Kamar;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->admin == 0) {
            $kelola = auth()->user()->kamar_id;
            $kamars = Kamar::where('kamar_id', $kelola)->get();
        }
        else {
            $kamars = Kamar::all();

        }
        $kamar = \DB::table('kamars')->count('id');
        $user = \DB::table('users')->count('id');
        // $kamars = Kamar::All();
        // $terpakai = $kamars - $kamar;
        //dd($tanggal);
        return view(
            'backend.dashboard',
        [
            'tittle' => 'SIMPATI',
            'countKamar' => $kamar,
            'countUser' => $user,
            'kamar' => $kamars,
            // 'terpakai' => $terpakai,
        ]
        );
        // return view('backend.dashboard');
    }
}
