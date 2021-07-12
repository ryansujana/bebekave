@extends('admin-lte/app')
@section('title', 'Data Produk')
@section('produk', 'menu-open')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <br>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                    Tambah Produk
                </button>
            </div>

            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Gambar</th>
                            <th>Harga /Kg</th>
                            <th>Stok</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($telurs as $telur)
                        <tr>
                            <td>{{ $telur->nama_telur }}</td>
                            <td>
                                <img src="{{ url('assets/produk') }}/{{ $telur->gambar }}"
                                style="width:80px; height:80px" alt="">
                            </td>
                            <td>Rp. {{ number_format($telur->harga) }}</td>
                            <td>{{ $telur->stok }}</td>
                            <td>{{ $telur->keterangan }}</td>
                            <td>
                                <a href="/produk/{{ $telur->id }}/edit" class="btn btn-warning btn-sm"><i
                                    class="fas fa-edit"></i> Edit</a>
                                    <a href="/produk/{{ $telur->id }}/delete"
                                        class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus');"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            {{ $telurs->links() }}
        </div>
    </div>



    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Produk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/produk" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" name="nama_telur" class="form-control" value="{{ old('nama_telur') }}" id="nama_telur" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga</label>
                            <input type="number" name="harga" class="form-control" value="{{ old('harga') }}" id="harga" placeholder="Harga">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Stok</label>
                            <input type="number" name="stok" class="form-control" id="stok" value="{{ old('stok') }}" placeholder="Stok">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Keterangan</label>
                            <textarea name="keterangan" class="form-control" id="keterangan">{{ old('keterangan') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="gambar" class="form-control-label">Gambar</label>
                            <input type="file" name="gambar" class="form-control" value="{{ old('gambar') }}" id="sampul"
                            aria-describedby="emailHelp">
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    @endsection
