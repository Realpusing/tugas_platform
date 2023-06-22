<?php

use App\Http\Controllers\LoginControl;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;

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


Route::get('/', function () {return view('pengguna.sesi');})->name('login');
Route::post('/postlogin', 'LoginControl@postlogin')->name('postlogin');
Route::get('/admin', function () {return view('pengguna.admin');})->name('login');

//Route untuk Data Buku



//Route untuk Logout
    Route::group(['middleware'=>['auth']], function(){
    Route::get('/user', function () {return view('pengguna.view_home');});
    Route::get('/menuutama', function () {return view('view_home');});
    
    Route::get('/buku', 'BukuController@bukutampil');
    Route::post('/buku/tambah','BukuController@bukutambah');
    Route::get('/buku/hapus/{id_buku}','BukuController@bukuhapus');
    Route::put('/buku/edit/{id_buku}', 'BukuController@bukuedit');
    Route::get('/bukuuser', 'BukuController@menutampil');//jangan diubah untuk menampilkan tabel
    
    //Route untuk Data Buku
    Route::get('/pinjamuser', 'PinjamController@menutampil');//jangan diubah untuk menampilkan tabel
    Route::get('/homeutama', function(){return view('view_home');});
    Route::get('/home', function(){return view('pengguna.view_home');});//jangan diubah untuk menampilkan tabel

    //Route untuk Data Peminjaman
    Route::get('/pinjam', 'PinjamController@pinjamtampil');
    Route::post('/pinjam/tambah','PinjamController@pinjamtambah');
    Route::get('/pinjam/hapus/{id_pinjam}','PinjamController@pinjamhapus');
    Route::put('/pinjam/edit/{id_pinjam}', 'PinjamController@pinjamedit');
    Route::get('/pinjamuser', 'PinjamController@menutampil');
    
    
    Route::get('/logout','LoginControl@logout')->name('logout');
    //Route untuk Data Donatur
    Route::get('/donatur', 'DonaturController@donaturtampil');
    Route::post('/donatur/tambah','DonaturController@donaturtambah');
    Route::get('/donatur/hapus/{id_donatur}','DonaturController@donaturhapus');
    Route::put('/donatur/edit/{id_donatur}', 'DonaturController@donaturedit');
    
    Route::get('/denda', 'DendaController@dendatampil');
    Route::post('/denda/tambah', 'DendaController@dendatambah');
    Route::get('/denda/hapus/{id_denda}', 'DendaController@dendahapus');
    Route::put('/denda/edit/{id_denda}', 'DendaController@dendaedit');
    Route::get('/dendauser', 'DendaController@menutampil');//jangan diubah untuk menampilkan tabel
    
});



