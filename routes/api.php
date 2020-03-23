<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
    });

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');



// PETUGAS \\
Route::get('/petugas', 'petugas@login');
Route::get('/tampilpetugas', 'petugas@tampilpetugas')->middleware('jwt_ok');
Route::post('/petugas', 'petugas@register');
Route::put('/petugas/{id}', 'petugas@update');
Route::delete('/petugas/{id}', 'petugas@delete');

// pelanggan \\
Route::get('/pelanggan', 'pelanggan@tampil')->middleware('jwt.verify');
Route::put('/pelanggan/{id}', 'pelanggan@update')->middleware('jwt.verify');
Route::delete('/pelanggan/{id}', 'pelanggan@delete')->middleware('jwt.verify');
Route::post('/pelanggan', 'pelanggan@store')->middleware('jwt.verify');

// transaksi \\
Route::get('transaksi/{id}', 'transaksi@tampil_pinjam')->middleware('jwt.verify');
Route::put('/transaksi/{id}', 'transaksi@update')->middleware('jwt.verify');
Route::delete('/transaksi/{id}', 'transaksi@delete')->middleware('jwt.verify');
Route::post('/transaksi', 'transaksi@store')->middleware('jwt.verify');
