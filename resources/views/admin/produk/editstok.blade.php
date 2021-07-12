@extends('admin-lte/app')
@section('title', 'Edit Stok')
@section('content')
<div class="row">
    <!-- Form Control starts -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-header-text"></h5>
                <div class="f-right">
                </div>

                <div class="card-block">
                    <form action="/stok-produk/{{ $telurs->id }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="stok" class="form-control-label">Stok</label>
                                    <input type="number" name="stok" class="form-control"
                                    value="{{ old('stok') ? old('stok') : $telurs->stok }}" id="stok"
                                    aria-describedby="emailHelp" placeholder="Stok">
                                    @error('stok')
                                    <div class="alert alert-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>

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
