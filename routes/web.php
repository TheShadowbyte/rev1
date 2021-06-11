<?php

use App\Models\Category;
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
        'posts' => Post::with('category')->get()
    ]);

});

Route::get('posts/{post:slug}', function (Post $post) {

    return view('post', [
        'post' => $post
    ]);

});

Route::get('profile/{user:slug}', function (User $user) {

    return view('profile', [
        'user' => $user,
        'user_signature' => UserSignature::find($user->id)
    ]);

});

Route::get('/categories', function () {

    return view('categories', [
        'categories' => Category::all()
    ]);

});

Route::get('/categories/{category:slug}', function (Category $category) {

    return view('posts', [
        'posts' => $category->posts
    ]);

});
