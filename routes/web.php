<?php

use App\Http\Controllers\AdminControllers;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\LubacaController;
use App\Http\Controllers\SibukkerjaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\GaleriController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use App\Exports\RekapPenilaianExport;
use Maatwebsite\Excel\Facades\Excel;



Route::group(['middleware' => 'auth'], function () {

	Route::get('/', [HomeController::class, 'index'])->name('/beranda');

    Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');
    
    Route::get('/tentang_kami', [HomeController::class, 'Tentang_kami'])->name('tentang_kami');

    Route::get('/ganti_password', [SessionsController::class, 'formPassword'])->name('ganti_password');
    Route::post('/ganti-password', [SessionsController::class, 'updatePassword'])->name('password.update');

    Route::get('/logout', [SessionsController::class, 'destroy']);
    Route::get('/login', function () {
		return view('/beranda');
	})->name('sign-up');
});


Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');



// LU BACA

Route::get('/menu_akun', [LubacaController::class, 'index'])->name('menu_akun');
Route::get('/akun_belanja_bahan', [LubacaController::class, 'Akun_belanja_bahan'])->name('akun_belanja_bahan');
Route::get('/akun_honor_output_kegiatan', [LubacaController::class, 'Akun_honor_output_kegiatan'])->name('akun_honor_output_kegiatan');
Route::get('/akun_honor_innasinda', [LubacaController::class, 'Akun_honor_innasinda'])->name('akun_honor_innasinda');
Route::get('/akun_belanja_sewa', [LubacaController::class, 'Akun_belanja_sewa'])->name('akun_belanja_sewa');
Route::get('/akun_belanja_persediaan_barang_konsumsi', [LubacaController::class, 'Akun_belanja_persediaan_barang_konsumsi'])->name('akun_belanja_persediaan_barang_konsumsi');
Route::get('/akun_belanja_perjalanan_dinas_biasa', [LubacaController::class, 'Akun_belanja_perjalanan_dinas_biasa'])->name('akun_belanja_perjalanan_dinas_biasa');
Route::get('/akun_belanja_perjalanan_dinas_dalam_kota', [LubacaController::class, 'Akun_belanja_perjalanan_dinas_dalam_kota'])->name('akun_belanja_perjalanan_dinas_dalam_kota');
Route::get('/akun_belanja_perjalanan_dinas_paket_meeting_dalam_kota', [LubacaController::class, 'Akun_belanja_perjalanan_dinas_paket_meeting_dalam_kota'])->name('akun_belanja_perjalanan_dinas_paket_meeting_dalam_kota');
Route::get('/akun_belanja_jasa_profesi', [LubacaController::class, 'Akun_belanja_jasa_profesi'])->name('akun_belanja_jasa_profesi');
Route::get('/akun_belanja_jasa_lainnya', [LubacaController::class, 'Akun_belanja_jasa_lainnya'])->name('akun_belanja_jasa_lainnya');


// SIBUK KERJA

Route::get('/menu_triwulan', [SibukkerjaController::class, 'index'])->name('menu_triwulan');
Route::get('/triwulan_1', [SibukkerjaController::class, 'triwulan_1'])->name('triwulan_1');
Route::get('/triwulan_2', [SibukkerjaController::class, 'triwulan_2'])->name('triwulan_2');
Route::get('/triwulan_3', [SibukkerjaController::class, 'triwulan_3'])->name('triwulan_3');
Route::get('/triwulan_4', [SibukkerjaController::class, 'triwulan_4'])->name('triwulan_4');
Route::get('/penilaian', [SibukkerjaController::class, 'Penilaian'])->name('penilaian');
// di atas utk view, di bawah action nya
Route::post('/sibukkerja/store', [SibukkerjaController::class, 'store'])->name('sibukkerja.store');
Route::get('/penilaian/{pegawai_id}/{triwulan}', [SibukkerjaController::class, 'formPenilaian'])->name('sibukkerja.penilaian');
Route::get('/sibukkerja/triwulan/{triwulan}', [SibukkerjaController::class, 'pilihPegawai'])->name('sibukkerja.triwulan');
Route::get('/export-excel/{tahun}/{triwulan}', [SibukkerjaController::class, 'rekapPenilaian'])->name('export_excel');


// GALERI

Route::get('/postingan', [GaleriController::class, 'index'])->name('postingan'); 
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
Route::get('/galeri/tambah', [GaleriController::class, 'create'])->name('galeri.create');
Route::post('/galeri', [GaleriController::class, 'store'])->name('galeri.store');
Route::get('/galeri/{id}', [GaleriController::class, 'show'])->name('galeri.show');
Route::delete('/galeri/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');



// Middleware role nya
// Admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard_admin', [AdminController::class, 'dashboard'])->name('dashboard_admin');
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/rekap_penilaian', [AdminController::class, 'Rekap'])->name('rekap_penilaian');
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/pengelolaan_data_pegawai', [AdminController::class, 'Pengelolaan_data_pegawai'])->name('pengelolaan_data_pegawai');
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/pengelolaan_data_pegawai', [PegawaiController::class, 'index'])->name('pengelolaan_data_pegawai');
	Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
    Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
    Route::get('/pegawai/{id}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::put('/pegawai/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');
    Route::delete('/pegawai/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');
});


// User routes
Route::middleware(['auth', 'role:pegawai'])->group(function () {
    Route::get('/dashboard_pegawai', [PegawaiController::class, 'dashboard'])->name('dashboard_pegawai');
});
