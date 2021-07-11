<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\UtamaController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenetasanController;


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
	return view('layouts.utama');
});

Auth::routes();

//home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [UtamaController::class, 'index']);
Route::get('/profil', [UtamaController::class, 'profil']);
Route::get('/kontak', [UtamaController::class, 'kontak']);
Route::get('/gallery', [UtamaController::class, 'gallery']);

Route::get('/cek-role', function (){
	if(auth()->user()->hasRole('admin')){
		return redirect('/beranda');
	}else{
		return redirect('/');
	}
});

Route::group(['middleware' => ['auth', 'role:member']], function(){
	
	Route::get('pesan/{id}', [PesanController::class, 'index']);
	Route::post('pesan/{id}', [PesanController::class, 'pesan']);
	Route::get('check-out', [PesanController::class, 'check_out']);
	Route::delete('check-out/{id}', [PesanController::class, 'delete']);

	Route::get('konfirmasi-check-out', [PesanController::class, 'konfirmasi']);

	Route::get('member', [MemberController::class, 'index']);
	Route::post('member', [MemberController::class, 'update']);

	Route::get('history', [HistoryController::class, 'index']);
	Route::get('history/{id}', [HistoryController::class, 'detail']);
});


//halaman admin
Route::group(['middleware' => ['auth']], function(){
	Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
	Route::resource('/produk', ProdukController::class);
	Route::resource('/penetasan', PenetasanController::class);
});

