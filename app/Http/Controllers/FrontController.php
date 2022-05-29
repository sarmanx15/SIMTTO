<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category, Tag, Post};
use App\Models\Kamar;


class FrontController extends Controller
{
    public function index()
    {
        $kamar = \DB::table('kamars')->count('id');
        $user = \DB::table('users')->count('id');
        $kamars = Kamar::All();
        // $terpakai = $kamars - $kamar;
        //dd($tanggal);
        return view(
            'frontend.index3',
        [
            'tittle' => 'SIMPATI',
            'countKamar' => $kamar,
            'countUser' => $user,
            'kamar' => $kamars,
            // 'terpakai' => $terpakai,
        ]
        );
        // return view('welcome', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('show', compact('post'));
    }

    public function category(Category $category)
    {
        $posts = $category->posts()->latest()->get();
        return view('welcome', compact('category', 'posts'));
    }

    public function tag(Tag $tag)
    {
        $posts = $tag->posts()->latest()->get();
        return view('welcome', compact('tag', 'posts'));
    }

}