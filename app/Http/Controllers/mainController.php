<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\User;

class mainController extends Controller
{
    public function index()
    {
        $kamar = \DB::table('kamars')->count('id_ruang');
        $user = \DB::table('users')->count('id_user');
        $kamars = Kamar::All();
        //dd($tanggal);
        return view(
            'admin.dashboard',
            [
                'tittle' => 'Dashboard',
                'countKamar' => $kamar,
                'countUser' => $user,
                'kamar' => $kamars,
            ]
        );
    }
}
