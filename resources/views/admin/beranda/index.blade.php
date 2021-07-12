@extends('admin-lte/app')
@section('title', 'Beranda')
@section('beranda', 'menu-open')
@section('content')

<!-- Small boxes (Stat box) -->
<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h3>{{ $jumlah_produk }}</h3>

				<p>Data Produk Telur</p>
			</div>
			<div class="icon">
				<i class="ion ion-bag"></i>
			</div>
			<a href="{{ url('produk') }}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>{{ $jumlah_transaksi }}</h3>

				<p>Semua Transaksi</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="{{ url('laporan-transaksi') }}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
	
</div>
<!-- /.row -->

@endsection
