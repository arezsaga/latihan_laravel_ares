<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Controllers\Middleware;
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

// Route::get('/', function () {
//     return view('datadiri');
// });


Route::controller(DosenController::class)->prefix('dosen')->group(function () {
    Route::get('', 'index')->name('dosen');
    Route::get('tambahdosen', 'tambahdosen')->name('dosen.tambah');
    Route::post('tambahdosen', 'simpanDosen')->name('dosen.simpandosen');
    Route::get('tampildatadosen/{id}', 'tampildatadosen')->name('dosen.tampil');
    Route::post('tampildatadosen/{id}', 'updatedosen')->name('dosen.update');
    Route::get('hapus/{id}', 'hapusdosen')->name('dosen.hapus');
});

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::controller(UserController::class)->group(function () {
    Route::post('daftar', 'simpan_user')->name('daftar');
    Route::get('/', 'showLoginForm')->name('login');
    Route::post('login', 'login_action')->name('masuk');
    Route::get('/logout', 'logout')->name('logout');
});

// Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin'], function () {
//     Route::get('home', function () {
//         return view('dashboard');
//     });
// });

Route::group(['middleware' => ['auth', 'ceklevel:admin,user']], function () {
    Route::get('home', function () {
        return view('dashboard');
    });
});
