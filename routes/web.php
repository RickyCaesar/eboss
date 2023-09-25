<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SatuanHargaController as SatuanHarga;
use App\Http\Controllers\KodeRekeningController as KodeRekening;
use App\Http\Controllers\DataPokokPendidikanController as DataPokokPendidikan;
use App\Http\Controllers\CustomLoginController as CustomLogin;
use App\Http\Controllers\KonfirmasiDataSatuanPendidikanController as KonfirmasiDataSatuanPendidikan;
use App\Http\Controllers\AnggaranBosController as AnggaranBos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('Pages.Login');
    })->name('login');
    Route::post('/', [CustomLogin::class, 'customLogin'])->name('login.go');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('Pages.Dashboards.DashboardSP');
    })->name('dashboard-sekolah');
    Route::get('/verifikasi-data-pokok-pendidikan', [KonfirmasiDataSatuanPendidikan::class, 'create'])->name('verifikasi-data-pokok-pendidikan.create');
    Route::post('/verifikasi-data-pokok-pendidikan', [KonfirmasiDataSatuanPendidikan::class, 'store'])->name('verifikasi-data-pokok-pendidikan.store');
    Route::resource('/penganggaran-dana-bos', AnggaranBos::class);
    Route::get('/logout', function (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('login');
    })->name('logout');
    
    Route::middleware(['dinas'])->group(function () {
        Route::get('/dashboard-dinas', function () {
            return view('Pages.Dashboards.DashboardD');
        })->name('dashboard-dinas');
        Route::resource('/satuan-harga', SatuanHarga::class);
        Route::resource('/kode-rekening', KodeRekening::class);
        Route::resource('/data-pokok-pendidikan', DataPokokPendidikan::class);
        Route::post('/data-pokok-pendidikan/import', [DataPokokPendidikan::class, 'importExcel'])->name('data-pokok-pendidikan.import');
        Route::get('/data-pokok-pendidi/export', [DataPokokPendidikan::class, 'exportExcel'])->name('data-pokok-pendidikan.export');
        Route::resource('/log/konfirmasi-data', KonfirmasiDataSatuanPendidikan::class);
        Route::get('/reset', [DataPokokPendidikan::class, 'reset'])->name('data-pokok-pendidikan.reset');
    });
});

Route::get('/test', function (Request $request) {
    for ($i=0; $i < 10; $i++) { 
        ${'test' . $i} = $i;
    }
    dd($test9);
});

