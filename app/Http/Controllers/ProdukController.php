<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Telur;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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

        Alert::success('Produk berhasil ditambahkan', 'Success');
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
            'gambar' => 'mimes:jpg,jpeg,png', //ekstensi
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

        Alert::success('Produk berhasil diupdate', 'Success');
        return redirect('/produk');
    }

    public function delete($id)
    {
        $telurs = Telur::select('id')->whereId($id)->firstOrFail();
        $telurs->delete();

        Alert::success('Produk berhasil dihapus', 'Success');
        return redirect('/produk');
    }

    public function stok()
    {
        $telurs = Telur::select()->latest()->simplePaginate(10);
        return view('admin/produk/stok', compact('telurs'));
    }

    public function stok_edit($id)
    {
        $telurs = Telur::select('id','stok')->whereId($id)->firstOrfail();
        return view('admin/produk/editstok', compact('telurs'));
    }

    public function update_stok(Request $request, $id)
    {
        $request->validate([
            'stok' => 'required',

        ]);

        $data = [
            'stok' => $request->stok,
            'user_id' => Auth::user()->id

        ];

        $telurs = Telur::select('id')->whereId($id)->first();

        $telurs->update($data);

        Alert::success('Stok berhasil diupdate', 'Success');
        return redirect('/stok-produk');
    }
}
