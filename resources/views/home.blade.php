@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5">
            <img src="{{ url('assets/logo/logo.png') }}" class="rounded mx-auto d-block" width="700px" alt="">
        </div>
        @foreach ($telurs as $telur)
        <div class="col-md-4 mt-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ url('assets/produk') }}/{{ $telur->gambar }}" height="250px"
                alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $telur->nama_telur }}</h5>
                    <p class="card-text">
                        <strong>Harga :</strong> Rp. {{ number_format($telur->harga) }} /Butir <br>
                        <strong>Stok :</strong> {{ $telur->stok }}
                        <hr>
                        <strong>Keterangan :</strong><br>
                        {{ $telur->keterangan }}
                    </p>
                    <a href="{{ url('pesan') }}/{{ $telur->id }}" class="btn btn-dark btn-block"><i
                        class="fa fa-shopping-cart"></i> Pesan</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                {{ $telurs->links() }}
            </div>
        </div>
    </div>
    @endsection
