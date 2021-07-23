@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('home') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $telur->nama_telur }}</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 mt-1">
            <div class="card">
                <div class="card-header">
                    <h2>{{ $telur->nama_telur }}</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ url('assets/produk') }}/{{ $telur->gambar }}" width="100%"
                            class="rounded mx-auto d-block" alt="">
                        </div>
                        <div class="col-md-6 mt-5">
                            <h2>{{ $telur->nama_telur }}</h2>
                            <table class="table table-border">
                                <tbody>
                                    <tr>
                                        <td><strong>Harga</strong></td>
                                        <td>:</td>
                                        <td>Rp. {{ number_format($telur->harga) }} /Butir</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Stok</strong></td>
                                        <td>:</td>
                                        <td>{{ $telur->stok }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Keterangan</strong></td>
                                        <td>:</td>
                                        <td>{{ $telur->keterangan }}</td>
                                    </tr>

                                    <tr>
                                        <td><strong>Jumlah Pesanan</strong></td>
                                        <td>:</td>
                                        <td>
                                            <form action="{{ url('pesan') }}/{{ $telur->id }}" method="POST">
                                                @csrf
                                                <input type="text" name="jumlah_pesan" class="form-control" required>
                                                <button type="submit" class="btn btn-primary mt-2"><i
                                                    class="fa fa-shopping-cart"></i> Masukan
                                                Keranjang</button>
                                            </form>
                                        </td>
                                    </tr>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
