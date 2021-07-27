<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',\App\Http\Controllers\HomeController::class . '@dashboard');
Route::get('/',\App\Http\Controllers\HomeController::class . '@home');
Route::get('/Dashboard',\App\Http\Controllers\HomeController::class . '@dashboard');
Route::get('/Dashboard',\App\Http\Controllers\HomeController::class . '@home');
Route::get('/Customer',\App\Http\Controllers\CustomerController::class . '@index');
Route::post('/Tambah/Customer',\App\Http\Controllers\CustomerController::class . '@store');
Route::get('/Hapus/Customer/{id}',\App\Http\Controllers\CustomerController::class . '@hapus');
