<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

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

Route::get('/', [IndexController::class,'callFoto'] )->name('callFoto');

Route::post('/foto',[IndexController::class,'fotoekle'])->name('fotoekle');
Route::get('/fotoSil/{id}',[IndexController::class,'fotoSil'])->name('fotoSil');

Route::get('/editGet/{id}',[IndexController::class,'editGet'])->name('editGet');
Route::post('/editPost',[IndexController::class,'editPost'])->name('editPost');
Route::get('/editfotoSil/{id}',[IndexController::class,'editfotoSil'])->name('editfotoSil');

Route::put('/editFotoPost/{id}',[IndexController::class,'editFotoPost'])->name('editFotoPost');
