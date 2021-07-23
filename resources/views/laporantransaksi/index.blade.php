@extends('admin-lte/app')
@section('title', 'Laporan Transaksi')
@section('laporan-transaksi', 'menu-open')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body table-responsive p-0">

				<div class="row">
					<div class="col-md-6" style="padding: 30px">
						<div class="form-group">
							<label for="label">Tanggal Awal</label>
							<input type="date" name="tglawal" id="tglawal" class="form-control" />
						</div>

						<div class="form-group">
							<label for="label">Tanggal Akhir</label>
							<input type="date" name="tglakhir" id="tglakhir" class="form-control" />
						</div>

						<div class="form-group">
							<a href="" onclick="this.href='/laporan-transaksi/'+ document.getElementById('tglawal').value + 
							'/' + document.getElementById('tglakhir').value " class="btn btn-primary col-md-12">
							Lihat <i class="fas fa-search"></i>
						</a>
					</div>
				</div>

				<table class="table table-hover text-nowrap">
					<thead>
						<tr>
							<th>No</th>
							<th>Tanggal</th>
							<th>Nama</th>
							<th>Status</th>
							<th>Jumlah Telur</th>
							<th>Jumlah Harga</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; ?>
						@foreach ($pesanan_details as $pesanan)
						<tr>
							<td>{{ $no++ }}</td>
							<td>{{ $pesanan->pesanan->tanggal }}</td>
							<td>{{ $pesanan->pesanan->user->name }}</td>
							<td>
								@if ($pesanan->pesanan->status == 1)
								Sudah dipesan & Belum dibayar
								@else
								Sudah dibayar
								@endif
							</td>	
							<td>{{ $pesanan->jumlah }} /Kg</td>	
							<td>{{ $pesanan->jumlah_harga }}</td>	
						</tr>
						@endforeach

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


@endsection
