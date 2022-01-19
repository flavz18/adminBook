<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardBukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardKategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/buku',[BukuController::class,'index']);
Route::get('/buku/{buku_detil:slug}',[BukuController::class,'show']);

Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);

Route::get('/register',[RegisterController::class,'index'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store']);

Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth');
Route::get('/dashboard/buku/checkSlug',[DashboardBukuController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/buku', DashboardBukuController::class)->Middleware('auth');

Route::get('/dashboard/kategori/checkSlug',[DashboardKategoriController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/kategori', DashboardKategoriController::class)->Middleware('auth');