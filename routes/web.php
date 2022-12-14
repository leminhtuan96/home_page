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
Route::get('/create', [ScreenController::class,"create"])->name("create");
Route::post('/create', [ScreenController::class,"store"])->name("store");

Route::get("/search/", [ScreenController::class, 'search'])->name('search');
