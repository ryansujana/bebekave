@extends('admin-lte/app')
@section('title', 'Edit Produk')
@section('content')
    <div class="row">
        <!-- Form Control starts -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-text"></h5>
                    <div class="f-right">
                    </div>

                    <div class="card-block">
                        <form action="/produk/{{ $telurs->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_telur" class="form-control-label">Nama</label>
                                        <input type="text" name="nama_telur" class="form-control"
                                            value="{{ old('nama_telur') ? old('nama_telur') : $telurs->nama_telur }}"
                                            id="nama_telur" aria-describedby="emailHelp" placeholder="Judul">
                                        @error('nama_telur')
                                            <div class="alert alert-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="gambar" class="form-control-label">Gambar</label>
                                        <input type="file" name="gambar" class="form-control" value="{{ old('gambar') }}"
                                            id="gambar" aria-describedby="emailHelp">
                                        @error('gambar')
                                            <div class="alert alert-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="stok" class="form-control-label">Stok</label>
                                        <input type="number" name="stok" class="form-control"
                                            value="{{ old('stok') ? old('stok') : $telurs->stok }}" id="stok"
                                            aria-describedby="emailHelp" placeholder="Stok">
                                        @error('stok')
                                            <div class="alert alert-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="harga" class="form-control-label">Harga</label>
                                        <input type="number" name="harga" class="form-control"
                                            value="{{ old('harga') ? old('harga') : $telurs->harga }}" id="harga"
                                            aria-describedby="emailHelp" placeholder="Harga">
                                        @error('harga')
                                            <div class="alert alert-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="editor" class="form-control-label">Keterangan</label>
                                        <textarea class="form-control" id="editor" rows="4"
                                            name="keterangan">{{ old('keterangan') ? old('keterangan') : $telurs->keterangan }}</textarea>
                                        @error('keterangan')
                                            <div class="alert alert-danger">
                                                <div class="alert alert-danger"><small>{{ $message }}</small></div>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <h5>Gambar</h5>
                                    <img src="/assets/produk/{{ $telurs->gambar }}" height="300px" width="400px" alt="">
                                </div>

                            </div>


                            <button type="submit" class="btn btn-warning waves-effect waves-light m-r-30">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
