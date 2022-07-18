<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\TerkirimController;
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

Route::get('/', [HomeController::class, 'index']);

//masuk
Route::get('/masuk', [MasukController::class, 'index']) ->name('masuk');
Route::get('/masuk/detail/{id_masuk}', [MasukController::class, 'detail']);
Route::get('/masuk/add', [MasukController::class, 'add']);
Route::post('/masuk/insert', [MasukController::class, 'insert']);
Route::get('/masuk/edit/{id_masuk}', [MasukController::class, 'edit']);
Route::post('/masuk/update/{id_masuk}', [MasukController::class, 'update']);
Route::get('/masuk/delete/{id_masuk}', [MasukController::class, 'delete']);

//terkirim
Route::get('/terkirim', [TerkirimController::class, 'index']) ->name('terkirim');
Route::get('/terkirim/detail/{id_terkirim}', [TerkirimController::class, 'detail']);
Route::get('/terkirim/add', [TerkirimController::class, 'add']);
Route::post('/terkirim/insert', [TerkirimrController::class, 'insert']);
Route::get('/terkirim/edit/{id_terkirim}', [TerkirimController::class, 'edit']);
Route::post('/terkirim/update/{id_terkirim}', [TerkirimController::class, 'update']);
Route::get('/terkirim/delete/{id_terkirim}', [TerkirimController::class, 'delete']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
