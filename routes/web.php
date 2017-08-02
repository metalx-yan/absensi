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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => 'web'], function () {


	Route::resource('absen', 'AbsenController', ['only' => ['store', 'destroy']]);
	Route::get('register/admin', 'HomeController@admin')->name('ruang.absen');

	Route::get('ruang/absen', 'RuangController@absen')->name('ruang.absen');
	Route::get('ruang/{id}/mahasiswa/{nim}/join', 'RuangController@join')->name('ruang.masuk');
	Route::get('ruang/{id}/mahasiswa/{nim}/out', 'RuangController@batal')->name('ruang.keluar');
	Route::resource('ruang', 'RuangController');
	Route::get('mahasiswa/profile', 'MahasiswaController@profile')->name('mahasiswa.profile');
	Route::resource('mahasiswa', 'MahasiswaController', ['except' => 'create']);
	Route::get('/', function () {
    return view('welcome');
	});



});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
