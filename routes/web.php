<?php

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

const PERPUS = 'perpus';

Route::view('/', PERPUS);
Route::view('/{a}', PERPUS);
Route::view('/{a}/{b}', PERPUS);
Route::view('/{a}/{b}/{c}', PERPUS);
Route::view('/{a}/{b}/{c}/{d}', PERPUS);
Route::view('/{a}/{b}/{c}/{d}/{e}', PERPUS);