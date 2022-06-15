<?php

use Illuminate\Support\Facades\Route;
use App\Events\BedPushed;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */


// Route::get('/', [App\Http\Controllers\FrontendController::class , 'index'])->name('/');
Route::get('/p', function () {
    BedPushed::dispatch();
    return view('welcome');
});
Route::get('/', [App\Http\Controllers\FrontController::class , 'index'])->name('homepage');

Auth::routes([
    'register' => false
]);

Route::middleware(['auth'])->group(function () {    Route::get('/home', [App\Http\Controllers\HomeController::class , 'index'])->name('home');

    Route::resource('categories', App\Http\Controllers\CategoryController::class);
    Route::resource('tags', App\Http\Controllers\TagController::class);

    Route::resource('kelas', App\Http\Controllers\KelasController::class);

    Route::resource('kamar', App\Http\Controllers\KamarController::class);
    Route::resource('catkamar', App\Http\Controllers\CatKamarController::class);
    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::get('profil', [App\Http\Controllers\ProfilController::class , 'edit'])->name('profile.edit');
    Route::put('profil', [App\Http\Controllers\ProfilController::class , 'update'])->name('profile.update');

    // Manage Posts
    Route::get('posts/trash', [App\Http\Controllers\PostController::class , 'trash'])->name('posts.trash');
    Route::post('posts/trash/{id}/restore', [App\Http\Controllers\PostController::class , 'restore'])->name('posts.restore');
    Route::delete('posts/{id}/delete-permanent', [App\Http\Controllers\PostController::class , 'deletePermanent'])->name('posts.deletePermanent');
    Route::resource('posts', App\Http\Controllers\PostController::class);

    Route::get('post/{slug}', [App\Http\Controllers\FrontController::class , 'show'])->name('show');    Route::get('category/{category:slug}', [App\Http\Controllers\FrontController::class , 'category'])->name('category');    Route::get('tag/{tag:slug}', [App\Http\Controllers\FrontController::class , 'tag'])->name('tag');
});

Route::get('/test', function () {
    event(new \App\Events\BedPushed());
    dd('Event fired.');
});
