<?php

use App\Models\Sampahs;
use App\Models\Penjemputan;
use App\Models\Setorsampah;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\PermenController;
use App\Http\Controllers\ProjekController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\SampahsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KoefisienController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\JenisbahanController;
use App\Http\Controllers\KontraktorController;
use App\Http\Controllers\HargabahansController;
use App\Http\Controllers\PenjemputanController;
use App\Http\Controllers\SetorsampahController;
use App\Http\Controllers\UpahpekerjaController;
use App\Http\Controllers\DaftarpekerjaController;
use App\Http\Controllers\KoefisienpekerjaController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
//     return view('welcome');
// });


Route::group(['middleware' => ['guest']], function () {

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/registrasi', [AuthController::class, 'registrasi'])->name('registrasi');
    Route::post('/post', [AuthController::class, 'post'])->name('login.post');
    Route::post('/store', [AuthController::class, 'store'])->name('registrasi.store');
});
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/cetak/{id}', [ProjekController::class, 'cetak'])->name('cetak');

    Route::get('user/show/{username}', [UserController::class, 'show'])->name('user.show');
    Route::get('profile/{username}', [UserController::class, 'profile'])->name('profile');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('/profile/update/{id}', [UserController::class, 'profileupdate'])->name('profile.update');



Route::group(['middleware' => ['auth', 'role:Pengepul']], function () {


    Route::get('/penjemputan', [PenjemputanController::class, 'index'])->name('penjemputan.index');
    Route::get('/penjemputan/terima/{id}', [PenjemputanController::class, 'terima'])->name('penjemputan.terima');
    Route::get('/penjemputan/tolak/{id}', [PenjemputanController::class, 'tolak'])->name('penjemputan.tolak');

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
});

Route::group(['middleware' => ['auth', 'role:Penjual']], function () {

    
    Route::post('/ajukanpost', [HomeController::class, 'ajukanpost'])->name('ajukan.post');
    Route::get('/riwayat-penjemputan', [PenjemputanController::class, 'riwayatpenjemputan'])->name('penjemputan.riwayat');


});
Route::group(['middleware' => ['auth', 'role:Petugas']], function () {

    Route::get('/sampah', [SampahsController::class, 'index'])->name('sampah');
    Route::get('/sampah/create', [SampahsController::class, 'create'])->name('sampah.create');
    Route::post('/sampah/store', [SampahsController::class, 'store'])->name('sampah.store');
    Route::get('/sampah/edit/{id}', [SampahsController::class, 'edit'])->name('sampah.edit');
    Route::get('/sampah/delete/{id}', [SampahsController::class, 'destroy'])->name('sampah.delete');
    Route::post('/sampah/update/{id}', [SampahsController::class, 'update'])->name('sampah.update');

    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/show/{id}', [UserController::class, 'show'])->name('user.show');



    Route::get('/setorsampah', [SetorsampahController::class, 'index'])->name('setor.index');

    Route::get('/setor/daftarpengepul', [SetorsampahController::class, 'daftarPengepul'])->name('setor.daftarpengepul');
    Route::get('/setor/create/{id}', [SetorsampahController::class, 'create'])->name('setor.create');
    Route::post('/setor/store', [SetorsampahController::class, 'store'])->name('setor.store');
});
