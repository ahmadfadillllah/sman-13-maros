<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\NomorSUratController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WaliKelasController;
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
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/post', [AuthController::class, 'login_post'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'checkRole:admin,siswa,wali kelas']], function(){
    //Dashboard
    Route::get('/dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');

    //Kelas
    Route::get('/kelas/index', [KelasController::class, 'index'])->name('kelas.index');
    Route::post('/kelas/index/insert', [KelasController::class, 'insert'])->name('kelas.insert');
    Route::post('/kelas/index/update/{id}', [KelasController::class, 'update'])->name('kelas.update');
    Route::get('/kelas/index/destroy/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');

    //Siswa
    Route::get('/siswa/index', [SiswaController::class, 'index'])->name('siswa.index');
    Route::post('/siswa/index/insert', [SiswaController::class, 'insert'])->name('siswa.insert');
    Route::post('/siswa/index/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::get('/siswa/index/destroy/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

    //Wali Kelas
    Route::get('/wali_kelas/index', [WaliKelasController::class, 'index'])->name('wali_kelas.index');
    Route::post('/wali_kelas/index/insert', [WaliKelasController::class, 'insert'])->name('wali_kelas.insert');
    Route::post('/wali_kelas/index/update/{id}', [WaliKelasController::class, 'update'])->name('wali_kelas.update');
    Route::get('/wali_kelas/index/destroy/{id}', [WaliKelasController::class, 'destroy'])->name('wali_kelas.destroy');

    //Users
    Route::get('/users/index', [UsersController::class, 'index'])->name('users.index');
    Route::post('/users/index/update/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::get('/users/index/destroy/{id}', [UsersController::class, 'destroy'])->name('users.destroy');

    //Nomor Surat
    Route::get('/nomor_surat/index', [NomorSUratController::class, 'index'])->name('nomor_surat.index');
    Route::post('/nomor_surat/index/insert', [NomorSUratController::class, 'insert'])->name('nomor_surat.insert');
    Route::post('/nomor_surat/index/update/{id}', [NomorSUratController::class, 'update'])->name('nomor_surat.update');
    Route::get('/nomor_surat/index/destroy/{id}', [NomorSUratController::class, 'destroy'])->name('nomor_surat.destroy');

    //Pelanggaran
    Route::get('/pelanggaran/index', [PelanggaranController::class, 'index'])->name('pelanggaran.index');
    Route::get('/pelanggaran/index/{siswa_id}/show', [PelanggaranController::class, 'show'])->name('pelanggaran.show');
    Route::post('/pelanggaran/index/insert/{siswa_id}', [PelanggaranController::class, 'insert'])->name('pelanggaran.insert');
    Route::post('/pelanggaran/index/send/{siswa_id}', [PelanggaranController::class, 'send'])->name('pelanggaran.send');
    Route::get('/pelanggaran/index/send_again/{siswa_id}', [PelanggaranController::class, 'send_again'])->name('pelanggaran.send_again');
    Route::post('/pelanggaran/index/update/{id}', [PelanggaranController::class, 'update'])->name('pelanggaran.update');
    Route::get('/pelanggaran/index/destroy/{id}', [PelanggaranController::class, 'destroy'])->name('pelanggaran.destroy');

    // Buat Surat
    Route::get('/e-mail/{id}', [EmailController::class, 'index'])->name('email.index');

    //Profile
    Route::get('/profile/change_password', [ProfileController::class, 'change_password'])->name('profile.change_password');
    Route::post('/profile/change_password/update', [ProfileController::class, 'change_password_update'])->name('profile.change_password.update');
    Route::get('/profile/change_avatar', [ProfileController::class, 'change_avatar'])->name('profile.change_avatar');
    Route::post('/profile/change_avatar/update', [ProfileController::class, 'change_avatar_update'])->name('profile.change_avatar.update');

});
