<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Telur;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $telurs = Telur::select()->latest()->simplePaginate(3);
        return view('admin/produk/index', compact('telurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $request->validate([
            'nama_telur' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png', //ekstensi
            'harga' => 'required',
            'stok' => 'required',
            'keterangan' => 'required',

        ]);

        $gambar = time() .'-' .$request->gambar->getClientOriginalName();
        $request->gambar->move('assets/produk', $gambar);

        Telur::create([
            'nama_telur' => $request->nama_telur,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'keterangan' => $request->keterangan,
            'gambar' => $gambar
        ]);
        return redirect('/produk');
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
        $telurs = Telur::select('id','nama_telur','harga','gambar','stok', 'keterangan')->whereId($id)->firstOrfail();
        return view('admin/produk/edit', compact('telurs'));
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
        $request->validate([
            'nama_telur' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png', //ekstensi
            'harga' => 'required',
            'stok' => 'required',
            'keterangan' => 'required',

        ]);

        $data = [
            'nama_telur' =>$request->nama_telur,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'keterangan' => $request->keterangan,
            'user_id' => Auth::user()->id
        ];

        $telurs = Telur::select('gambar', 'id')->whereId($id)->first();
        if($request->gambar){
            File::delete('assets/produk/'.$telurs->gambar);

            $gambar = time() .'-' .$request->gambar->getClientOriginalName();
            $request->gambar->move('assets/produk', $gambar);

            $data['gambar'] = $gambar;
        }
        $telurs->update($data);

        return redirect('/produk');
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
