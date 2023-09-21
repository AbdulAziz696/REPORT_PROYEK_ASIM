<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/daftar', [PostController::class, 'daftar']);
Route::get('/home', [PostController::class, 'home']);
Route::get('/employe', [PostController::class, 'employe']);
Route::get('/project_report', [PostController::class, 'project_report']);


// Route::get('/register', function () {
//     return view('auth.register');
// });
// Route::get('/login', function () {
//     return view('auth.login');
// });



Route::get('/user', function () {
    return view('layouts.user.index');
});
Route::get('/user-edit', function () {
    return view('layouts.post.edit');
});
Route::get('user-detail', [UserController::class,'index']
)->name('user-detail');
Route::get('/admin', function () {
    return view('layouts.admin.index');
});

// Route::prefix()

Route::prefix('post')->group(function(){

    Route::get('', [PostController::class,'index']);

    Route::get('detail/{slug}', [PostController::class,'show']);

    Route::get('add',[PostController::class,'create']);

    Route::post('add-post',[PostController::class,'store']);

    Route::get('{slug}/edit',[PostController::class,'edit']);
});

