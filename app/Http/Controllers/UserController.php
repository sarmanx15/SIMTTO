<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Catkamar;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = User::all();
        $kamar = Catkamar::all();
        return view('backend.user.index', compact('user','kamar'));
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
        // dd($request);
        $this->validate($request, [
            'name'      => 'required',

            'email'     => 'required|email|unique:users,email',
            'username'  => 'required|unique:users,username',

            'password'  => ['required', 'string', 'min:5', 'confirmed'],
            'admin'     => 'required',

            // 'role' => 'required'
        ]);
        
        $input = $request->all();
        // dd($input);

        $input['password'] = Hash::make($input['password']);


        User::create($input);
        Alert::success('Sukses', 'Data Berhasil Disimpan');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        if ($request->password!==null){
        $user->password = Hash::make($request->password);
        }

        $user->admin = $request->admin;
        $user->save();
        Alert::success('Congrats', 'Data Berhasil Diupdate');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user = User::findOrFail($id);
        $user->delete();
        Alert::success('Congrats', 'Data Berhasil Dihapus');

        return redirect()->route('user.index');
    }
}
