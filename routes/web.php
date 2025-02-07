<?php

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
    $users = App\Models\User::get();
    return view('welcome',['users' => $users]);
});


Route::get('/profile/{id}',function($id){

    $user = App\Models\User::find($id);
    $posts = $user->posts()->with('category','image','tags')->withcount('comments')->get();
    $videos = $user->videos()->with('category','image','tags')->withcount('comments')->get();

    return view('profile',[

        'user' => $user,
        'posts' => $posts,
        'videos' => $videos

    ]);
    
})->name('profile');

Route::get('/llevel{id}',function($id){

    $level = App\Models\User::find($id);
    $posts = $level->posts()->with('category','image','tags')->withcount('comments')->get();
    $videos = $level->videos()->with('category','image','tags')->withcount('comments')->get();

    return view('level',[

        'level' => $level,
        'posts' => $posts,
        'videos' => $videos

    ]);
    
})->name('level');