<?php

use App\Http\Controllers\WithdrawalController;
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
    return view('layout');
});
Route::get('/',[WithdrawalController::class,'show']);
Route::get('/resource',[WithdrawalController::class,'create']);
Route::get('/weekly',[WithdrawalController::class,'index']);
Route::post('/element',[WithdrawalController::class,'store']);
