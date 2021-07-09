<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Telur;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $telur = Telur::where('id', $id)->first();

        return view('pesan.index', compact('telur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function pesan(Request $request, $id)
    {
        $telur = Telur::where('id', $id)->first();
        $tanggal = Carbon::now();

        //Validasi apakah melebihi stok
        if($request->jumlah_pesan > $telur->stok)
        {
            return redirect('pesan/'.$id);
        }

         //cek validasi
        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        //menyimpan ke DB pesanan
        if(empty($cek_pesanan))
        {
        $pesanan = new Pesanan;
        $pesanan->user_id = Auth::user()->id;
        $pesanan->tanggal = $tanggal;
        $pesanan->status = 0;
        $pesanan->jumlah_harga = 0;
        $pesanan->save();
        }



        //simpan ke db pesanan_detail
        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

        //cek pesanan detail
        $cek_pesanan_detail = PesananDetail::where('telur_id', $telur->id)->where('pesanan_id', $pesanan_baru->id)->first();
        if(empty($cek_pesanan_detail))
        {
        $pesanan_detail = new PesananDetail;
        $pesanan_detail->telur_id = $telur->id;
        $pesanan_detail->pesanan_id = $pesanan_baru->id;
        $pesanan_detail->jumlah = $request->jumlah_pesan;
        $pesanan_detail->jumlah_harga = $telur->harga*$request->jumlah_pesan;
        $pesanan_detail->save();
        }else{
        $pesanan_detail = PesananDetail::where('telur_id', $telur->id)->where('pesanan_id', $pesanan_baru->id)->first();
        $pesanan_detail->jumlah = $pesanan_detail->jumlah+$request->jumlah_pesan;

        //harga sekarang
        $harga_pesanan_detail_baru = $telur->harga*$request->jumlah_pesan;
        $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
        $pesanan_detail->update();
        }

        //jumlah total
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga+$telur->harga*$request->jumlah_pesan;
        $pesanan->update();

        return redirect('home');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
