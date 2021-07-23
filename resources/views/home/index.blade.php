@extends('layouts.utama')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
         <div
         class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
         @if (Route::has('login'))
         <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            @role('member')
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline"><i class="fa fa-shopping-cart"></i> Belanja</a>
            <span><h4>Selamat berbelanja {{ auth()->user()->name }}</h4></span>
            @endrole

            @role('admin')
            <span><h4>Selamat datang : {{ auth()->user()->name }}</h4></span>
            <a href="{{ url('beranda') }}" class="btn btn-default btn-sm"><i class="fa fa-gears"></i> Halaman Admin</a>
            @endrole

            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}"
            class="ml-4 text-sm text-gray-700 underline">Register</a>
            @endif
            @endauth
        </div>
        @endif

        @if (Route::has('login'))
        @auth

        @else
        <h5>Login member untuk memulai berbelanja <i class="fa fa-shopping-cart"></i></h5>
        @endauth
        @endif


        <div class="banner">
            <img src="{{ url('assets/banner/bann1.png') }}" alt="">
        </div>
    </div>
</div>

<div class="container">
    <div class="row mt-5">
        <div class="div-col-md-12" style="margin-top: 30px">
            <h3>Mengapa memilih telur ditoko kami</h3>
        </div>
    </div>

    <div class="iklan">
        <div class="row mt-4" style="text-align: center; position: center">
            <div class="col-md-2">
                <div class="card" style="width: 100%;">
                    <img src="{{ url('assets/banner/asin1.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Telur berkualitas.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card" style="width: 100%;">
                    <img src="{{ url('assets/banner/asin2.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Lebih Murah.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card" style="width: 100%;">
                    <img src="{{ url('assets/banner/asin3.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Proses orderan cepat.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card" style="width: 100%;">
                    <img src="{{ url('assets/banner/asin4.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Hasil telur langsung dari petani.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card" style="width: 100%;">
                    <img src="{{ url('assets/banner/asin5.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Hemat waktu dan biaya.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card" style="width: 100%;">
                    <img src="{{ url('assets/banner/asin6.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">24 jam siap melayani.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-12">
        <h3>Kami hadir untuk anda</h3>
    </div>
    <div class="row text-center" style="padding: 20px;">
        <div class="col-md-6 mt-2">
            <img src="{{ url('assets/banner/hadir.jpg') }}" width="100%" alt="">
        </div>
        <div class="col-md-6 mt-2">
            <img src="{{ url('assets/banner/hadir2.jpg') }}" width="100%" alt="">
        </div>
    </div>
</div>
</div>

@endsection
