<?php

use Illuminate\Http\Request;

Route::group([
  'middleware' => 'api',
  'prefix' => 'auth'
], function () {
  Route::post('login', 'AuthController@login');
  Route::post('signup', 'AuthController@signup');
  Route::post('logout', 'AuthController@logout');
  Route::post('refresh', 'AuthController@refresh');
  Route::post('me', 'AuthController@me');  
});

Route::apiResource('/member', 'MemberController');
Route::apiResource('/category', 'CategoryController');
Route::apiResource('/publisher', 'PenerbitController');
Route::apiResource('/author', 'PenulisController');
Route::apiResource('/book', 'BookController');
Route::get('/category/select/list', 'CategoryController@list');
Route::get('/publisher/select/list', 'PenerbitController@list');
Route::get('/author/select/list', 'PenulisController@list');
Route::get('/member/select/list', 'MemberController@list');
Route::get('/member/search/{keyword}', 'MemberController@search');
Route::get('/book/select/list', 'BookController@list');
Route::get('/book/search/{keyword}', 'BookController@search');
Route::apiResource('/loan', 'LoanController');
Route::get('/loan/borrowed/book', 'LoanController@borroweds');
Route::patch('/loan/return/{id}', 'LoanController@returnBook');
Route::get('/perpus/global-info', 'HomeController@globalInfo');

