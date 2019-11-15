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

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('/mahasiswa')->group(function () {
    Route::get('/', 'MahasiswaController@index')->name('mahasiswa');
    Route::get('/tambah', 'MahasiswaController@create')->name('mahasiswa.tambah');
    Route::post('/simpan', 'MahasiswaController@store')->name('mahasiswa.simpan');
});

Route::prefix('/kriteria')->group(function () {
    Route::get('/', 'KriteriaController@index')->name('kriteria');
    Route::get('/tambah', 'KriteriaController@create')->name('kriteria.tambah');
    Route::post('/tambah', 'KriteriaController@store')->name('kriteria.simpan');
});

Route::prefix('/nilai')->group(function() {
    Route::get('/', 'NilaiController@index')->name('nilai');
    Route::get('/{id}', 'NilaiController@create')->name('nilai.tambah');
    Route::post('/{id}', 'NilaiController@store')->name('nilai.simpan');
});