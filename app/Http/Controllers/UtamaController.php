<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Telur;

class UtamaController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function profil()
    {
        return view('profil.index');
    }

    public function kontak()
    {
        return view('kontak.index');// kontak adalah folder
    }

    public function gallery()
    {
        $telurs = Telur::all();

        return view('gallery.index', compact('telurs'));
    }

}
