<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReRegistrationController;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/profile', [PostController::class, 'profile']);
Route::get('/daftar', [ReRegistrationController::class, 'daftar']);
Route::post('/registerstudent', [ReRegistrationController::class, 'registerstudent'])->name('registerstudent');
Route::put('/profileupdate', [UserController::class, 'update'] )->name('updateprofile');
Route::get('/masuk', [PostController::class, 'masuk']);
Route::get('/', [PostController::class, 'home']);
Route::get('/intern', [UserController::class, 'index']);
Route::get('/project_report', [PostController::class, 'project_report']);




// Route::get('/register', function () {
//     return view('auth.register');
// });
// Route::get('/login', function () {
//     return view('auth.login');
// });


Route::prefix('user')->group(function(){

    Route::get('/', function () {
        return view('layouts.user.index');
    });
    Route::get('/edit', function () {
        return view('layouts.post.edit');
    });
    Route::get('{slug}/detail', [UserController::class,'show']
    )->name('user.detail ');

    Route::delete('{id}', [UserController::class, 'destroy']);

});


Route::get('/admin', function () {
    return view('layouts.admin.index');
});

// Route::prefix()
Route::get('/search', 'PostController@search')->name('search');



Route::prefix('post')->group(function(){

    Route::get('', [PostController::class,'index']);

    // Route::get('search', [PostController::class,'search'])->name('search');

    Route::get('{slug}/detail', [PostController::class,'show']);

    Route::get('add',[PostController::class,'create']);
    Route::post('add-post',[PostController::class,'store']);

    Route::get('{slug}/edit',[PostController::class,'edit']);
    Route::patch('{slug}/edit-post',[PostController::class,'update']);

    Route::delete('{id}', [PostController::class, 'destroy']);
});

