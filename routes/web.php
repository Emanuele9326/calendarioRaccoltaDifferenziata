<?php

use App\Http\Controllers\DBcontroller;
use App\Http\Controllers\MainView;
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

Route::get('/',[MainView::class,'__invoke']);
Route::get('viewaddConf', [DBcontroller::class, 'create']);
Route::post('store-conf', [DBcontroller::class, 'store']);
Route::get('collection', [DBcontroller::class, 'index']);