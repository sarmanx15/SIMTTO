<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $countUser = \DB::table('users')->count();
        return view(
            'admin.user.Muser',
            [
                'User' => $users,
                'countUser' => $countUser,
                'tittle' => 'Kelolah User'
            ]
        );
    }

    public function create(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles' => $request->roles
        ]);
        $notifikasi = array(
            'pesan' => 'User berhasil ditambahkan',
            'alert' => 'success',
        );

        return redirect('/user')->with($notifikasi);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        $notifikasi = array(
            'pesan' => 'User berhasil dihapus',
            'alert' => 'success',
        );
        return redirect('/user')->with($notifikasi);
    }

    public function update(Request $request)
    {
        $user = User::find($request->id_user);
        $user->id_user = $request->id_user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->kamar = $request->kamar;
        $user->roles = $request->roles;
        $user->save();
        $notifikasi = array(
            'pesan' => 'User berhasil diedit',
            'alert' => 'success',
        );
        $reqKamar = $request->kamar;
        $kamar = Kamar::find($reqKamar);
        $kamar->total_terisi += 1;
        $kamar->sisa_kamar = $kamar->total_kamar - $kamar->total_terisi;
        $kamar->save(); 
        return redirect('/user')->with($notifikasi);
    }
}
