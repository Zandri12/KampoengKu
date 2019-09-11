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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'VoteController@index')->name('dashboard');

//AdminPage/user/add
Route::get('/kampoengku/pengguna', 'VoteController@data_pengguna')->name('pengguna');
Route::get('/kampoengku/pengguna/edit/{id}', 'VoteController@edit')->name('edit');
Route::put('/kampoengku/pengguna/update/{id}', 'VoteController@update')->name('update');
Route::get('/kampoengku/pengguna/delete/{id}','VoteController@destroy');

//AdminPage/user/panitia_akun
Route::get('/kampoengku/pengguna/panitia', 'VoteController@data_panitia')->name('data_panitia');

//konfirmasi
Route::get('/kampoengku/pengguna/konfirmasi', 'VoteController@data_kandidat_panitia')->name('confirmations');

// button terima atau tidaknya kandidat
Route::get('/kampoengku/admin/konfirmasi/{id}', 'VoteController@konfirmasi_kandidat')->name('konfirmasi_kandidat');
Route::get('/kampoengku/tolak/{id}', 'VoteController@konfirmasi_kandidat_tolak')->name('konfirmasi_kandidat_ditolak');


//AdminPage/user/masyarakat_akun
Route::get('/kampoengku/pengguna/masyarakat', 'VoteController@data_masyarakat')->name('data_masyarakat');

//cetak/pdf


Route::get('/cetak', 'VoteController@ct');
Route::get('/voting/cetak_pdf', 'VoteController@cetak_pdf');
// Route::get('/generate-pdf','VoteController@generatePDF');

//mail permohonan untuk menjadi kandidat ke Admin
Route::get('/kampoengku/admin/permintaan', 'VoteController@admin_permohonan')->name('admin_permohonan');


//Kandidat/Permintaan(formulir permohonan)
Route::post('/Kandidat/tambah', 'VoteController@tambah_kandidat')->name('kandidat');
Route::get('/Kandidat/data/tambah', 'VoteController@data_kandidat')->name('datas_kandidat');


//pemilihan

Route::get('/pemilihan/evoting', 'VoteController@pilih_kandidat')->name('pemungutan');
//kartu suara
Route::get('/pemilihan/pilih/{id}', 'VoteController@pilihan')->name('pilihan');

//hasil pemilihan
Route::get('/pemilihan/simpan/{id}', 'VoteController@simpan_hasil_voting')->name('hasil_voting');
Route::get('/pemilihan/hasil/data', 'VoteController@views_hasil_voting')->name('data_hasil_voting');

//hasil 
Route::get('/pemilihan/hasil', 'VoteController@chart_hasil')->name('hasil');

//event(kalender)
// Route::resource('/events','VoteController@kalen');

//profile
Route::get('/profiles','VoteController@profiles')->name('profile');

//data/pemilihannya

Route::get('/pemilihan/data/evoting', 'VoteController@datakk')->name('hasil_di_panitia');


//
Route::post('/save', 'VoteController@save')->name('save');
Route::get('/delete/{id}','VoteController@delete');

//jumlah kandidat

Route::post('/pemilihan/save', 'VoteController@simpan')->name('pisimpanlihan');
Route::get('/pemilihan/kandidat/delete/{id}','VoteController@hapustotal');


