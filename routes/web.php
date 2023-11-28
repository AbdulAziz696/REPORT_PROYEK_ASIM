<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\InfografisController;
use App\Http\Controllers\PortfolioController;
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




Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/intern', [UserController::class, 'index']);;
Route::get('/infografis', [InfografisController::class, 'index'])->middleware('auth');


Route::get('register', [ReRegistrationController::class, 'daftar']);
Route::post('/registerstudent', [ReRegistrationController::class, 'registerstudent'])->name('registerstudent');

route::get('list_pendaftar', [HomeController::class, 'list_pendaftar']);
route::get('pendaftar_diterima', [HomeController::class, 'pendaftar_diterima']);
route::get('pendaftar_ditolak', [HomeController::class, 'pendaftar_ditolak']);


Route::prefix('user')->group(function () {

    Route::post('portofolio/add', [PortfolioController::class, 'store']);
    Route::put('portofolio/{id}/edit', [PortfolioController::class, 'update']);

    Route::post('profile/add', [BiodataController::class, 'store']);
    Route::put('profile/{id}/edit', [BiodataController::class, 'update']);


    Route::get('{slug}/profile/settings', [UserController::class, 'setting']);


    Route::put('{slug}/status/update', [UserController::class, 'updateStatus']);
    Route::put('{slug}/profile/settings/update', [UserController::class, 'update']);

    Route::get(
        '{slug}/profile',
        [UserController::class, 'show']
    )->name('user.detail');

    Route::delete('{id}', [UserController::class, 'destroy']);
});



// Route::prefix()
Route::get('/search', 'PostController@search')->name('search');



Route::prefix('post')->group(function () {

    Route::get('', [PostController::class, 'index']);



    Route::get('{slug}/detail', [PostController::class, 'show']);

    Route::get('add', [PostController::class, 'create']);
    Route::post('add-post', [PostController::class, 'store']);

    Route::get('{slug}/edit', [PostController::class, 'edit']);
    Route::patch('{slug}/edit-post', [PostController::class, 'update']);

    Route::delete('{id}', [PostController::class, 'destroy']);
});

Route::prefix('infografis')->group(function () {

    Route::get('', [InfografisController::class, 'index']);

    // Route::get('search', [InfografisController::class,'search'])->name('search');

    Route::get('{slug}/detail', [InfografisController::class, 'show']);

    Route::get('add', [InfografisController::class, 'create']);
    Route::post('add-info', [InfografisController::class, 'store']);

    Route::get('{slug}/edit', [InfografisController::class, 'edit']);
    Route::patch('{slug}/edit-info', [InfografisController::class, 'update']);

    Route::delete('{id}', [InfografisController::class, 'destroy']);
});
