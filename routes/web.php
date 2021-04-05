<?php

use App\Http\Controllers\cliente;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LugareController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\BahiaController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\VacancyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| Rutas del sistema
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/admin', function () {
    return view('admin');
})->name('admin');

Route::resource('lugare', LugareController::class)->names('lugare');

Route::resource('parking', ParkingController::class)->names('parking');

Route::patch('parking/{id}', 'ParkingController@update')->name('ParkingController.update');

Route::resource('historico', HistoryController::class)->only(['index']);

Route::resource('clients', ClientController::class)->except(['show']);

Route::resource('vagas', VacancyController::class)->except(['show', 'destroy']);

Route::resource('bahia', BahiaController::class)->names('bahia');

Route::patch('bahia/{id}', 'BahiaController@update')->name('BahiaController.update');

