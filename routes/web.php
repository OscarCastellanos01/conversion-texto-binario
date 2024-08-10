<?php

use App\Http\Controllers\ConversionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/convert', function () {
    return view('convert');
});

Route::post('/convert-text-to-binary', [ConversionController::class, 'convertTextToBinary'])->name('convert.text.to.binary');
Route::post('/convert-binary-to-text', [ConversionController::class, 'convertBinaryToText'])->name('convert.binary.to.text');