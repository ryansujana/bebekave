<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Telur;
use App\Models\Pesanan;

class BerandaController extends Controller
{
	
	public function index()
	{
		$jumlah_produk = Telur::count();
		$jumlah_transaksi = Pesanan::count();

		return view('admin/beranda/index', compact('jumlah_produk', 'jumlah_transaksi'));
	}
}
