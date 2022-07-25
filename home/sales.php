<?php
	$sql = $koneksi->query("SELECT count(id) as absensi from absensi");
	while ($data= $sql->fetch_assoc()) {
	
		$absensi=$data['absensi'];
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
			<div class="small-box bg-red">
				<div class="inner">
					<h4>
						<?= $absensi; ?>
					</h4>

					<p>Data Absensi</p>
				</div>
				<div class="icon">
					<i class="fas fa-fingerprint"></i>
				</div>
				<a href="?page=karyawan/data_absensi" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>