<?php

use App\Http\Controllers\ScreenController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [ScreenController::class,"index"])->name("index");
Route::resource('screen-records', ScreenController::class)->except(['index']);
Route::get("screen-records/search/", [ScreenController::class, 'search'])->name('search');
