<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\TemplateSuratController;

Route::get('/', function () {
    return view('auth.login');
});




Auth::routes();

Route::get('/home', [HomeController::class, 'home'])->name('home');


Route::middleware(['auth'])->group(function () {
    Route::get('/surat-masuk/create', [SuratMasukController::class, 'create'])->name('surat-masuk.create');
    Route::post('/surat-masuk', [SuratMasukController::class, 'store'])->name('surat-masuk.store');
});

Route::get('/surat-masuk/daftar', [SuratMasukController::class, 'daftar'])
    ->name('surat-masuk.daftar');


Route::get('/surat-keluar/daftar', [SuratKeluarController::class, 'daftar'])
    ->name('surat-keluar.daftar');
    

Route::resource('surat-keluar', SuratKeluarController::class)
    ->only(['create','store']);




Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
Route::get('/pegawai/daftar', [PegawaiController::class, 'daftar'])->name('pegawai.daftar');
Route::delete('/pegawai/{pegawai}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

Route::get('/pegawai/{pegawai}', [PegawaiController::class, 'show'])
    ->name('pegawai.show');



Route::get('/template-surat', [TemplateSuratController::class, 'index'])
    ->name('template-surat.index');

Route::get('/template-surat/tambah', [TemplateSuratController::class, 'create'])
    ->name('template-surat.create');

Route::post('/template-surat', [TemplateSuratController::class, 'store'])
    ->name('template-surat.store');

Route::get('/template-surat/download/{template}', [TemplateSuratController::class, 'download'])
    ->name('template-surat.download');

Route::delete('/template-surat/{template}', [TemplateSuratController::class, 'destroy'])
    ->name('template-surat.destroy');




