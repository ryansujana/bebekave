<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\UtamaController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenetasanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MembersController;
use RealRashid\SweetAlert\Facades\Alert;


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
Route::get('/kontak', [UtamaController::class, 'kontak']);// functionnya 'kontak'
Route::get('/gallery', [UtamaController::class, 'gallery']);

// Ini proses atau logika untuk ke login atau /login
Route::get('/cek-role', function (){  // cek-role berada di controller LoginController->routeserviceprovider=CEKROLE, CEKROLE artinya sama dengan /cek-role
	//Jika auth usernya sebagai Admin
	if(auth()->user()->hasRole('admin')){
		// Maka akan ke:
		Alert::success('Selamat datang admin', 'Success');
		return redirect('/beranda');
	}else{
		// kalau bukan admin, loginnya sebagai member, maka
		return redirect('/'); //ini halaman awal
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
	Route::get('/produk/{id}/delete', [ProdukController::class, 'delete']);
	Route::resource('/penetasan', PenetasanController::class);

	//users
	Route::resource('/list-admin', AdminController::class);
	Route::resource('/list-member', MembersController::class);

	//stok-produk
	Route::get('/stok-produk', [ProdukController::class, 'stok']);
	Route::get('/stok-produk/{id}/editstok', [ProdukController::class, 'stok_edit']);
	Route::post('/stok-produk/{id}', [ProdukController::class, 'update_stok']);

	//Laporan
	Route::get('laporan-transaksi', [PesanController::class, 'laporan_transaksi']);
	Route::get('laporan-transaksi/{tglawal}/{tglakhir}', [PesanController::class, 'tampildatakeseluruhan']);

	//Filter Date
	// Route::get('filter-data', [PesanController::class, 'halamanrekap'])->name('filter-data');

});

