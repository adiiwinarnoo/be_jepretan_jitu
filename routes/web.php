<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Hrd\AbsensiController;
use App\Http\Controllers\Hrd\UsersController;
use App\Http\Controllers\Hrd\DashboardController;
use App\Http\Controllers\Hrd\ReportController;
use App\Http\Controllers\Auth\LoginController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect('/login');
});

// LOGIN
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginProses', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/hrd/hadir', [AbsensiController::class, 'hadir'])->name('hadir');
Route::get('/hrd/izin', [AbsensiController::class, 'izin'])->name('izin');
Route::get('/hrd/sakit', [AbsensiController::class, 'sakit'])->name('sakit');
Route::get('/hrd/dinas', [AbsensiController::class, 'dinas'])->name('dinas');

Route::get('/hrd/users', [UsersController::class, 'index'])->name('users');
Route::get('/hrd/users/view/{id}', [UsersController::class, 'show'])->name('users.show');
Route::get('/hrd/users/add', [UsersController::class, 'create'])->name('users.create');
Route::post('/hrd/users/store', [UsersController::class, 'store'])->name('users.store');
Route::get('/hrd/users/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
Route::put('/hrd/users/update', [UsersController::class, 'update'])->name('users.update');

Route::get('/hrd/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/hrd/report', [ReportController::class, 'index'])->name('report');
Route::get('/hrd/cetak-report', [ReportController::class, 'cetak'])->name('cetak');
