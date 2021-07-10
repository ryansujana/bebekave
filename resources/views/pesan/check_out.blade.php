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
                        <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <h3><i class="fa fa-shopping-cart"></i> Check Out</h3>
                        @if (!empty($pesanan))
                            <p align="right">Tanggal Pesan : {{ $pesanan->tanggal }}</p>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Telur</th>
                                        <th>Jumlah</th>
                                        <th>Harga /Kg</th>
                                        <th>Total Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($pesanan_details as $pesanan_detail)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $pesanan_detail->telur->nama_telur }}</td>
                                            <td>{{ $pesanan_detail->jumlah }} Kg</td>
                                            <td>Rp. {{ number_format($pesanan_detail->telur->harga) }} /Kg</td>
                                            <td>Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                            <td>
                                                <form action="{{ url('check-out') }}/{{ $pesanan_detail->id }}"
                                                    method="POST">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Anda Yakin ingin hapus ?');"><i
                                                            class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="4" align="right"><strong>Total Harga :</strong> </td>
                                        <td><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                        <td>
                                            <a href="{{ url('konfirmasi-check-out') }}" class="btn btn-success"
                                                onclick="return confirm('Anda Yakin mau check out ?');">
                                                <i class="fa fa-shopping-cart"></i> Check Out</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
