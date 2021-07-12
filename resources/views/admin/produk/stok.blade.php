@extends('admin-lte/app')
@section('title', 'Data Stok Produk')
@section('stok-produk', 'menu-open')
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
				
			</div>

			<!-- /.card-header -->
			<div class="card-body table-responsive p-0">
				<table class="table table-hover text-nowrap">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Sisa Stok /butir</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($telurs as $telur)
						<tr>
							<td>{{ $telur->nama_telur }}</td>
							<td>{{ $telur->stok }}</td>
							<td>
								<a href="/stok-produk/{{ $telur->id }}/editstok" class="btn btn-warning btn-sm"><i
									class="fas fa-edit"></i> Edit</a>
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

@endsection