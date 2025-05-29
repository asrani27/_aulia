<?php

use App\Models\Deviasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IkpaController;
use App\Http\Controllers\SkpdController;
use App\Http\Controllers\TkskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\PanganController;
use App\Http\Controllers\RevisiController;
use App\Http\Controllers\DeviasiController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\PenerimaController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\DistribusiController;
use App\Http\Controllers\PenyerapanController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\AdminRevisiController;
use App\Http\Controllers\AdminDeviasiController;
use App\Http\Controllers\AdminPenyerapanController;

Route::get('/', [LoginController::class, 'welcome']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/daftar', [DaftarController::class, 'index']);
Route::post('/daftar', [DaftarController::class, 'store']);

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard']);

    Route::get('/user/dokumen', [UserController::class, 'dokumen']);
    Route::get('/user/dokumen/add', [UserController::class, 'add_dokumen']);
    Route::post('/user/dokumen/add', [UserController::class, 'store_dokumen']);
    Route::get('/user/dokumen/edit/{id}', [UserController::class, 'edit_dokumen']);
    Route::post('/user/dokumen/edit/{id}', [UserController::class, 'update_dokumen']);
    Route::get('/user/dokumen/delete/{id}', [UserController::class, 'delete_dokumen']);

    Route::get('/user/klien', [UserController::class, 'klien_index']);
    Route::get('/user/klien/add', [UserController::class, 'klien_add']);
    Route::post('/user/klien/add', [UserController::class, 'klien_store']);
    Route::get('/user/klien/edit/{id}', [UserController::class, 'klien_edit']);
    Route::post('/user/klien/edit/{id}', [UserController::class, 'klien_update']);
    Route::get('/user/klien/delete/{id}', [UserController::class, 'klien_delete']);
});

Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::get('/superadmin', [HomeController::class, 'superadmin']);
    Route::get('/superadmin/pengaduan', [PengaduanController::class, 'index']);
    Route::get('/superadmin/laporan', [LaporanController::class, 'index']);

    Route::get('/superadmin/laporan/bulan', [LaporanController::class, 'bulan']);

    Route::get('/superadmin/klien', [KlienController::class, 'index']);
    Route::get('/superadmin/klien/add', [KlienController::class, 'add']);
    Route::post('/superadmin/klien/add', [KlienController::class, 'store']);
    Route::get('/superadmin/klien/edit/{id}', [KlienController::class, 'edit']);
    Route::post('/superadmin/klien/edit/{id}', [KlienController::class, 'update']);
    Route::get('/superadmin/klien/delete/{id}', [KlienController::class, 'delete']);

    Route::get('/superadmin/dokumen', [DokumenController::class, 'index']);
    Route::get('/superadmin/dokumen/add', [DokumenController::class, 'add']);
    Route::post('/superadmin/dokumen/add', [DokumenController::class, 'store']);
    Route::get('/superadmin/dokumen/edit/{id}', [DokumenController::class, 'edit']);
    Route::post('/superadmin/dokumen/edit/{id}', [DokumenController::class, 'update']);
    Route::get('/superadmin/dokumen/delete/{id}', [DokumenController::class, 'delete']);

    Route::get('/superadmin/distribusi', [DistribusiController::class, 'index']);
    Route::get('/superadmin/distribusi/add', [DistribusiController::class, 'add']);
    Route::post('/superadmin/distribusi/add', [DistribusiController::class, 'store']);
    Route::get('/superadmin/distribusi/edit/{id}', [DistribusiController::class, 'edit']);
    Route::post('/superadmin/distribusi/edit/{id}', [DistribusiController::class, 'update']);
    Route::get('/superadmin/distribusi/delete/{id}', [DistribusiController::class, 'delete']);

    Route::get('/superadmin/verifikasi', [VerifikasiController::class, 'index']);
    Route::get('/superadmin/verifikasi/add', [VerifikasiController::class, 'add']);
    Route::post('/superadmin/verifikasi/add', [VerifikasiController::class, 'store']);
    Route::get('/superadmin/verifikasi/edit/{id}', [VerifikasiController::class, 'edit']);
    Route::post('/superadmin/verifikasi/edit/{id}', [VerifikasiController::class, 'update']);
    Route::get('/superadmin/verifikasi/delete/{id}', [VerifikasiController::class, 'delete']);

    Route::get('/superadmin/evaluasi', [EvaluasiController::class, 'index']);
    Route::get('/superadmin/evaluasi/add', [evaluasiController::class, 'add']);
    Route::post('/superadmin/evaluasi/add', [evaluasiController::class, 'store']);
    Route::get('/superadmin/evaluasi/edit/{id}', [evaluasiController::class, 'edit']);
    Route::post('/superadmin/evaluasi/edit/{id}', [evaluasiController::class, 'update']);
    Route::get('/superadmin/evaluasi/delete/{id}', [evaluasiController::class, 'delete']);

    Route::get('/laporan/klien', [LaporanController::class, 'klien']);
    Route::get('/laporan/klien/print', [LaporanController::class, 'pdfklien']);
    Route::get('/laporan/dokumen/print', [LaporanController::class, 'pdfdokumen']);
    Route::get('/laporan/evaluasi/print', [LaporanController::class, 'pdfevaluasi']);
    Route::get('/laporan/verifikasi/print', [LaporanController::class, 'pdfverifikasi']);
    Route::get('/laporan/dokumen', [LaporanController::class, 'dokumen']);
    Route::get('/laporan/verifikasi', [LaporanController::class, 'verifikasi']);
    Route::get('/laporan/evaluasi', [LaporanController::class, 'evaluasi']);
});
Route::get('/logout', function () {
    Auth::logout();
    Session::flash('success', 'Anda Telah Logout');
    return redirect('/');
});
