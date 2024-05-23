<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Payment\PixController;
use App\Http\Controllers\Payment\BoletoController;

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
    return view('welcome');
});

//Route::post('boleto', [BoletoController::class, 'boleto'])->name('payment.boleto');
Route::post('pix', [PixController::class, 'createCharge'])->name('payment.pix');