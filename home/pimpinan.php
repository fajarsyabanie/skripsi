<?php
	$sql = $koneksi->query("SELECT count(id) as bongkaran from bongkaran");
	while ($data= $sql->fetch_assoc()) {
	
		$bongkaran=$data['bongkaran'];
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
<?php
	$sql = $koneksi->query("SELECT count(id) as bensin from bensin");
	while ($data= $sql->fetch_assoc()) {
	
		$bensin=$data['bensin'];
	}
?>
<?php
	$sql = $koneksi->query("SELECT count(id) as entertaiment from entertaiment");
	while ($data= $sql->fetch_assoc()) {
	
		$entertaiment=$data['entertaiment'];
	}
?>
<?php
	$sql = $koneksi->query("SELECT count(id) as kasbon_beli from kasbon_beli");
	while ($data= $sql->fetch_assoc()) {
	
		$kasbon_beli=$data['kasbon_beli'];
	}
?>
<?php
	$sql = $koneksi->query("SELECT count(id) as rencana_kunjungan from rencana_kunjungan");
	while ($data= $sql->fetch_assoc()) {
	
		$rencana_kunjungan=$data['rencana_kunjungan'];
	}
?>
<?php
	$sql = $koneksi->query("SELECT count(id) as mutasi from mutasi");
	while ($data= $sql->fetch_assoc()) {
	
		$mutasi=$data['mutasi'];
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
				<a href="?page=MyAppPimpinan/data_bongkaran" class="small-box-footer">More info
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
				<a href="?page=MyAppPimpinan/data_dinas" class="small-box-footer">More info
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
				<a href="?page=MyAppPimpinan/data_kasbon" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>


		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h4>
						<?= $bensin; ?>
					</h4>

					<p>Data Pembelian BBM</p>
				</div>
				<div class="icon">
					<i class="fas fa-gas-pump"></i>
				</div>
				<a href="?page=MyAppPimpinan/data_bensin" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-primary">
				<div class="inner">
					<h4>
						<?= $entertaiment; ?>
					</h4>

					<p>Data Entertaiment</p>
				</div>
				<div class="icon">
					<i class="fas fa-music"></i>
				</div>
				<a href="?page=MyAppPimpinan/data_entertaiment" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h4>
						<?= $kasbon_beli; ?>
					</h4>

					<p>Data Kasbon</p>
				</div>
				<div class="icon">
					<i class="fas fa-money-bill-wave"></i>
				</div>
				<a href="?page=MyAppPimpinan/data_kasbonbeli" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-orange">
				<div class="inner">
					<h4>
						<?= $rencana_kunjungan; ?>
					</h4>

					<p>Data Rencana Kunjungan</p>
				</div>
				<div class="icon">
					<i class="fas fa-cab"></i>
				</div>
				<a href="?page=MyAppPimpinan/data_kunjungan" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h4>
						<?= $mutasi; ?>
					</h4>

					<p>Data Mutasi Kas</p>
				</div>
				<div class="icon">
					<i class="fas fa-file-invoice-dollar"></i>
				</div>
				<a href="?page=MyAppPimpinan/data_mutasi" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>