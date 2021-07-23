@extends('layouts.utama')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
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
        <div class="row">
            <div class="col-md-6 mt-2">
                <img src="{{ url('assets/banner/hadir.jpg') }}" width="60%" alt="">
            </div>
            <div class="col-md-6 mt-2">
                <img src="{{ url('assets/banner/hadir2.jpg') }}" width="60%" alt="">
            </div>
        </div>
    </div>


</div>
@endsection
