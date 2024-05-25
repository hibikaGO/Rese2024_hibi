<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\RegisterController;

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

Route::get('/',[ShopController::class,'index']);
Route::post('/search',[ShopController::class,'search']);
Route::get('/detail/{id}',[ShopController::class,'detail'])->name('detail');
Route::get('/done',[ShopController::class,'done']);
Route::get('/mypage',[MypageController::class,'index'])->middleware('auth')->name('mypage');
Route::post('/favorites/add/{shopId}', [FavoriteController::class,'addToFavorites'])->name('favorites.add');
Route::post('/favorites/remove/{shopId}', [FavoriteController::class,'removeFromFavorites'])->name('favorites.remove');
Route::post('/detail/confirm', [ReserveController::class, 'confirmReservation'])->name('reservation.confirm');
Route::post('/detail/store', [ReserveController::class, 'storeReservation'])->name('reservation.store');
Route::delete('/reservations/{id}', [ReserveController::class, 'destroy'])->name('reservations.destroy');
Route::get('/thanks',[ShopController::class,'thanks']);
Route::post('/register', [RegisterController::class, 'store'])->name('register');