<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kamar = \DB::table('kamars')->count('id_ruang');
        $user = \DB::table('users')->count('id_user');
        $kamars = Kamar::All();
        // $terpakai = $kamars - $kamar;
        //dd($tanggal);
        return view(
            'index3',
        [
            'tittle' => 'SIMPATI',
            'countKamar' => $kamar,
            'countUser' => $user,
            'kamar' => $kamars,
            // 'terpakai' => $terpakai,
        ]
        );
    }
    public function index2()
    {
        $kamar = \DB::table('kamars')->count('id_ruang');
        $user = \DB::table('users')->count('id_user');
        $kamars = Kamar::All();
        // $terpakai = $kamars - $kamar;
        //dd($tanggal);
        return view(
            'index2',
        [
            'tittle' => 'SIMPATI',
            'countKamar' => $kamar,
            'countUser' => $user,
            'kamar' => $kamars,
            // 'terpakai' => $terpakai,
        ]
        );
    }
    public function index3()
    {
        $kamar = \DB::table('kamars')->count('id_ruang');
        $user = \DB::table('users')->count('id_user');
        $kamars = Kamar::All();
        // $terpakai = $kamars - $kamar;
        //dd($tanggal);
        return view(
            'index',
        [
            'tittle' => 'SIMPATI',
            'countKamar' => $kamar,
            'countUser' => $user,
            'kamar' => $kamars,
            // 'terpakai' => $terpakai,
        ]
        );
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
