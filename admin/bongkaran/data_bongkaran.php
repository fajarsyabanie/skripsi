<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT * FROM dinas WHERE id='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<section class="content-header">
	<h1>
		Pengajuan
		<small>Bongkaran</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				<b>Website Administrasi keuangan PT Total Sarana Mandiri</b>
			</a>
		</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<div class="row">
				<a href="?page=MyApp/add_bongkaran" title="Tambah Data" class="btn btn-primary">
					<i class="glyphicon glyphicon-plus"></i> Tambah Pengajuan Bongkaran</a>
				<a  href="admin/bongkaran/print_bongkaran.php" target="_blank" title="Tambah Data" class="btn btn-success ">
					<i class="glyphicon glyphicon-print"></i> Print Data</a>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Karyawan</th>
							<th>Tanggal Bongkaran</th>
							<th>Container</th>
							<th>Jumlah Pengajuan</th>
							<th>Kelola</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("SELECT B.*, K.nama from bongkaran B INNER JOIN karyawan K ON B.id_karyawan = K.nik ORDER BY 
				  tanggal_bongkaran DESC");
						while ($data = $sql->fetch_assoc()) {
						?>

							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td>
									<?php echo $data['nama']; ?>
								</td>
								<td>
									<?php echo date('l,d M Y', strtotime($data['tanggal_bongkaran'])); ?>
								</td>
								<td>
									<?php echo $data['container']; ?>
								</td>
								<td>
									<?php echo 'Rp ', number_format($data['sewa_mobil'] + $data['konsumsi'] + $data['forklift'] + $data['ekspedisi'] + $data['tol'] + $data['lainnya']); ?>
								</td>

								<td>
									<a href="?page=MyApp/edit_bongkaran&kode=<?php echo $data['id']; ?>" title="Ubah" class="btn btn-success">
										<i class="glyphicon glyphicon-edit"></i>
									</a>
									<a href="admin/bongkaran/print_data_bongkaran.php?kode=<?php echo $data['id']; ?>" title="Print" target="_blank" class="btn btn-success">
										<i class="glyphicon glyphicon-print"></i>
									</a>
									<a href="?page=MyApp/del_bongkaran&kode=<?php echo $data['id']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')" title="Hapus" class="btn btn-danger">
										<i class="glyphicon glyphicon-trash"></i>
									</a>
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