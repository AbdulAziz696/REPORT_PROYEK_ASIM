<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/post', function () {
    return view('layouts.post.index');
});
Route::get('/post-detail', function () {
    return view('layouts.post.detail');
});

Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/user', function () {
    return view('layouts.user.index');
});
Route::get('/user-edit', function () {
    return view('layouts.post.edit');
});
Route::get('/user-profile', function () {
    return view('layouts.user.user_profile');
});
Route::get('/admin', function () {
    return view('layouts.admin.index');
});
