<?php
	$sql = $koneksi->query("SELECT count(id) as dinas from dinas");
	while ($data= $sql->fetch_assoc()) {
	
		$dinas=$data['dinas'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(id) as entertaiment from entertaiment");
	while ($data= $sql->fetch_assoc()) {
	
		$entertaiment=$data['entertaiment'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(id) as rencana_kunjungan from rencana_kunjungan");
	while ($data= $sql->fetch_assoc()) {
	
		$rencana_kunjungan=$data['rencana_kunjungan'];
	}
?>


<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Dashboard
		<small>Karyawan</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">

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
				<a href="?page=MyApp/data_entertaiment" class="small-box-footer">More info
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
				<a href="?page=MyApp/data_kunjungan" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>