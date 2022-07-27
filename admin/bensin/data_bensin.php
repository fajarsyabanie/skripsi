<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT * FROM bensin WHERE id='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<section class="content-header">
	<h1>
		Laporan
		<small>Penggunaan Bahan Bakar</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				<b>Website Administrasi Keuangan PT Total Sarana Mandiri</b>
			</a>
		</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<a href="?page=MyApp/add_bensin" title="Tambah Data" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Tambah Laporan Pengisian BBM</a>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse">
					<i class="fa fa-minus"></i>
				</button>
				<button type="button" class="btn btn-box-tool" data-widget="remove">
					<i class="fa fa-remove"></i>
				</button>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Tanggal</th>
							<th>Armada</th>
							<th>Tujuan</th>
							<th>Pemakaian</th>
							<th>Pengisian BBM</th>
							<th>Harga/Ltr</th>
							<th>Biaya</th>
							<th>Diisi Oleh</th>
							<th>Kelola</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("SELECT * FROM bensin B INNER JOIN karyawan K ON K.nik = B.id_karyawan INNER JOIN armada A ON A.id = B.id_armada");
						while ($data = $sql->fetch_assoc()) {
						?>

							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td>
									<?php echo date('l,d M Y',strtotime($data['t_isi'])); ?>
								</td>
								<td>
									<?php echo $data['nama_armada']; ?>
								</td>
								<td>
									<?php echo $data['tujuan']; ?>
								</td> 
								<td>
									<?php echo $data['km_akhir'] - $data['km_awal'];
									echo ' km' ?>
								</td>
								<td>
									<?php echo round($data['biaya'] / $data['harga'],2);
									echo ' ltr' ?>
								</td>
								<td>
									<?php echo 'Rp ' ,number_format ($data['harga']); ?>
								</td>
								<td>
									<?php echo 'Rp ' ,number_format ($data['biaya']); ?>
								</td>
								<td>
									<?php echo $data['nama']; ?>
								</td>


								<td>
									<a href="?page=MyApp/edit_bensin&kode=<?php echo $data['id']; ?>" title="Ubah" class="btn btn-success">
										<i class="glyphicon glyphicon-edit"></i>
									</a>
									<a href="?page=MyApp/print_bensin&kode=<?php echo $data['id']; ?>" title="Ubah" class="btn btn-success">
										<i class="glyphicon glyphicon-print"></i>
									</a>
									<a href="?page=MyApp/del_bensin&kode=<?php echo $data['id']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')" title="Hapus" class="btn btn-danger">
										<i class="glyphicon glyphicon-trash"></i>
								</td>
							</tr>
						<?php
						}
						?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</section>