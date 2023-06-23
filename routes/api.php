<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AbsensiController;
use App\Http\Controllers\Api\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [AuthController::class, 'register']);
Route::post('/upload-katalog', [AuthController::class, 'uploadKatalog']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgot-password', [AuthController::class, 'forgotPasssword']);
Route::post('/review', [AuthController::class, 'review']);
Route::post('/absensi/izin', [AbsensiController::class, 'izin']);
Route::post('/absensi/sakit', [AbsensiController::class, 'sakit']);
Route::post('/absensi/dinas', [AbsensiController::class, 'dinas']);
Route::post('/absensi/checkin', [AbsensiController::class, 'checkin']);
Route::post('/absensi/checkout', [AbsensiController::class, 'checkout']);
Route::post('/absensi/izinApprove', [AbsensiController::class, 'izinApprove']);
Route::post('/absensi/izinApprove_', [AbsensiController::class, 'izinApprove_']);
Route::get('/absensi/historyr/{date_now}', [AbsensiController::class, 'absensiHis']);
Route::get('/profile/{id}', [AuthController::class, 'getProfile']);
Route::post('/profile-update/{id}', [AuthController::class, 'updateProfile']);
Route::post('/payment', [AuthController::class, 'requestPayment']);
Route::get('/absensi/izinList', [AbsensiController::class, 'izinList']);
Route::get('/absensi/historyList', [AbsensiController::class, 'absensiHisList']);
Route::get('/katalog-all', [AuthController::class, 'getKatalog']);
Route::get('/katalog/{id}', [AuthController::class, 'getKatalogById']);
Route::get('/review/{id}', [AuthController::class, 'getReview']);
Route::get('/payment', [AuthController::class, 'getPayment']);
Route::get('/payment/fotographer', [AuthController::class, 'getPaymentFotoGrapher']);
Route::post('/payment-update/{id}', [AuthController::class, 'updatePayment']);