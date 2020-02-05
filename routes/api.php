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
Route::get('book', 'BookController@book');
Route::get('bookall', 'BookController@bookAuth')->middleware('jwt.verify');
Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');

// BUKU \\
Route::get('/buku', 'buku@tampil')->middleware('jwt.verify');
Route::put('/buku/{id}', 'buku@update')->middleware('jwt.verify');
Route::delete('/buku/{id}', 'buku@delete')->middleware('jwt.verify');
Route::post('/buku', 'buku@store')->middleware('jwt.verify');

// PETUGAS \\
Route::get('/petugas', 'petugas@login');
Route::put('/petugas/{id}', 'petugas@update');
Route::delete('/petugas/{id}', 'petugas@delete');

// ANGGOTA \\
Route::get('/anggota', 'anggota@tampil')->middleware('jwt.verify');
Route::put('/anggota/{id}', 'anggota@update')->middleware('jwt.verify');
Route::delete('/anggota/{id}', 'anggota@delete')->middleware('jwt.verify');
Route::post('/anggota', 'anggota@store')->middleware('jwt.verify');

// PEMINJAMAN \\
Route::get('Peminjaman/{id}', 'Peminjaman@tampil_pinjam')->middleware('jwt.verify');
Route::put('/Peminjaman/{id}', 'Peminjaman@update')->middleware('jwt.verify');
Route::delete('/Peminjaman/{id}', 'Peminjaman@delete')->middleware('jwt.verify');
Route::post('/Peminjaman', 'Peminjaman@store')->middleware('jwt.verify');
