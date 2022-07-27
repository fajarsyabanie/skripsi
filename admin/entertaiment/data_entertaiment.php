<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT * FROM entertaiment WHERE id='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<section class="content-header">
	<h1>
		Data
		<small>Formulir Entertaiment</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				<b>Website Administrasi Keuangan PT Total Sarana Mandiri Cabang Banjarmasin</b>
			</a>
		</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<a href="?page=MyApp/add_entertaiment" title="Tambah Data" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Buat Formulir Entertaiment</a>
			<a href="admin/entertaiment/print_entertaiment.php" target="_blank" title="Tambah Data" class="btn btn-success ">
				<i class="glyphicon glyphicon-print"></i> Print Data</a>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Karyawan</th>
							<th>Tanggal</th>
							<th>Kegiatan</th>
							<th>Nama Tempat</th>
							<th>Alamat</th>
							<th>Jumlah</th>
							<th>Nama Relasi</th>
							<th>Posisi</th>
							<th>Nama Perusahaan</th>
							<th>Kelola</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("SELECT E.*, K.nama from entertaiment E INNER JOIN karyawan K ON E.id_karyawan = K.nik ORDER BY 
				  tanggal DESC");
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
									<?php echo date('l,d M Y', strtotime($data['tanggal'])); ?>
								</td>
								<td>
									<?php echo $data['jenis']; ?>
								</td>
								<td>
									<?php echo $data['nama_tempat']; ?>
								</td>
								<td>
									<?php echo $data['alamat']; ?>
								</td>
								<td>
									<?php echo $data['jumlah'], ' Orang' ?>
								</td>
								<td>
									<?php echo $data['nama_relasi'] ?>
								</td>
								<td>
									<?php echo $data['posisi_relasi'] ?>
								</td>
								<td>
									<?php echo $data['perusahaan_relasi'] ?>
								</td>

								<td>
									<a href="?page=MyApp/edit_entertaiment&kode=<?php echo $data['id']; ?>" title="Ubah" class="btn btn-success">
										<i class="glyphicon glyphicon-edit"></i>
									</a>
									<a href="admin/entertaiment/print_data_entertaiment.php?kode=<?php echo $data['id']; ?>" title="Print" target="blank" class="btn btn-success">
										<i class="glyphicon glyphicon-print"></i>
									</a>
									<a href="?page=MyApp/del_entertaiment&kode=<?php echo $data['id']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')" title="Hapus" class="btn btn-danger">
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