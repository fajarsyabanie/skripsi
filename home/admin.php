<?php
	$sql = $koneksi->query("SELECT count(id) as bongkaran from bongkaran");
	while ($data= $sql->fetch_assoc()) {
	
		$bongkaran=$data['bongkaran'];
	}
?>
<?php
	$sql = $koneksi->query("SELECT count(id) as karyawan from karyawan");
	while ($data= $sql->fetch_assoc()) {
	
		$karyawan=$data['karyawan'];
	}
?>
<?php
	$sql = $koneksi->query("SELECT count(id) as dinas from dinas");
	while ($data= $sql->fetch_assoc()) {
	
		$dinas=$data['dinas'];
	}
?>
<?php
	$sql = $koneksi->query("SELECT count(id) as kasbon from kasbon");
	while ($data= $sql->fetch_assoc()) {
	
		$kasbon=$data['kasbon'];
	}
?>


<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Dashboard
		<small>Administrator</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-blue">
				<div class="inner">
					<h4>
						<?= $bongkaran; ?>
					</h4>

					<p>Data Bongkaran</p>
				</div>
				<div class="icon">
					<i class="fas fa-truck"></i>
				</div>
				<a href="?page=MyApp/data_bongkaran" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h4>
						<?= $karyawan; ?>
					</h4>

					<p>Data Karyawan</p>
				</div>
				<div class="icon">
					<i class="fa fa-users"></i>
				</div>
				<a href="?page=MyApp/data_karyawan" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-orange">
				<div class="inner">
					<h4>
						<?= $dinas; ?>
					</h4>

					<p>Data Perjalanan Dinas</p>
				</div>
				<div class="icon">
					<i class="fas fa-car"></i>
				</div>
				<a href="?page=MyApp/data_dinas" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h4>
						<?= $kasbon; ?>
					</h4>

					<p>Data Peminjaman Karyawan</p>
				</div>
				<div class="icon">
					<i class="fa fa-dollar"></i>
				</div>
				<a href="?page=MyApp/data_kasbon" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>


		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h4>
						<?= $gaji; ?>
					</h4>

					<p>Data Slip Gaji</p>
				</div>
				<div class="icon">
					<i class="fas fa-money-bill-wave"></i>
				</div>
				<a href="?page=MyApp/data_gaji" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>