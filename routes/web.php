<?php

use App\Http\Controllers\ControllerCRUD;
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
Route::get('/',[ControllerCRUD::class,'show']);
Route::get('/resource',[ControllerCRUD::class,'create']);
Route::get('/weekly',[ControllerCRUD::class,'index']);
Route::post('/element',[ControllerCRUD::class,'store']);
