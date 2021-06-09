<?php

use App\Models\Post;
use App\Models\User;
use App\Models\UserSignature;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('home');

});

Route::get('/posts', function () {

    return view('posts', [
        'posts' => Post::all()
    ]);

});

Route::get('posts/{id}', function ($id) {

    return view('post', [
        'post' => Post::findOrFail($id)
    ]);

});

Route::get('profile/{user:slug}', function (User $user) {

    return view('profile', [
        'user' => $user,
        'user_signature' => UserSignature::find($user->id)
    ]);

});
