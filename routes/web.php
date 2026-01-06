<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\TemplateSuratController;

/*
|--------------------------------------------------------------------------
| AUTH & LANDING
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'home'])
    ->name('home')
    ->middleware('auth');


/*
|--------------------------------------------------------------------------
| SURAT MASUK
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::prefix('surat-masuk')->name('surat-masuk.')->group(function () {
        Route::get('create', [SuratMasukController::class, 'create'])->name('create');
        Route::post('/', [SuratMasukController::class, 'store'])->name('store');
        Route::get('daftar', [SuratMasukController::class, 'daftar'])->name('daftar');
    });

});


/*
|--------------------------------------------------------------------------
| SURAT KELUAR
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::prefix('surat-keluar')->name('surat-keluar.')->group(function () {
        Route::get('daftar', [SuratKeluarController::class, 'daftar'])->name('daftar');
        Route::get('create', [SuratKeluarController::class, 'create'])->name('create');
        Route::post('/', [SuratKeluarController::class, 'store'])->name('store');
    });

});


/*
|--------------------------------------------------------------------------
| PEGAWAI
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('pegawai')->name('pegawai.')->group(function () {

    Route::get('/', [PegawaiController::class, 'index'])->name('index');
    Route::get('daftar', [PegawaiController::class, 'daftar'])->name('daftar');
    Route::post('/', [PegawaiController::class, 'store'])->name('store');

    Route::get('{pegawai}', [PegawaiController::class, 'show'])->name('show');
    Route::delete('{pegawai}', [PegawaiController::class, 'destroy'])->name('destroy');

    Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/pegawai/create', [PegawaiController::class, 'create']);
    Route::post('/pegawai', [PegawaiController::class, 'store']);
});


});


/*
|--------------------------------------------------------------------------
| TEMPLATE SURAT
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('template-surat')->name('template-surat.')->group(function () {

    Route::get('/', [TemplateSuratController::class, 'index'])->name('index');
    Route::get('tambah', [TemplateSuratController::class, 'create'])->name('create');
    Route::post('/', [TemplateSuratController::class, 'store'])->name('store');

    Route::get('download/{template}', [TemplateSuratController::class, 'download'])
        ->name('download');

    Route::delete('{template}', [TemplateSuratController::class, 'destroy'])
        ->name('destroy');

});
