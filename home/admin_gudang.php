<?php
	$sql = $koneksi->query("SELECT count(id) as bongkaran from bongkaran");
	while ($data= $sql->fetch_assoc()) {
	
		$bongkaran=$data['bongkaran'];
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
						<?= $bongkaran; ?>
					</h4>

					<p>Data Bongkaran</p>
				</div>
				<div class="icon">
					<i class="fas fa-fingerprint"></i>
				</div>
				<a href="?page=MyAppGudang/data_bongkaran" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>