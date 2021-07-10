<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('kontak.index');
    }

    public function gallery()
    {
        return view('gallery.index');
    }

}
