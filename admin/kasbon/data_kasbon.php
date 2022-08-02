<section class="content-header">
	<h1>
		Pengajuan
		<small>Permohonan Peminjaman Karyawan</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				<b>Website Absensi dan Administrasi keuangan PT Total Sarana Mandiri</b>
			</a>
		</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<a href="?page=MyApp/add_barang" title="Tambah Data" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Tambah Pengajuan Peminjaman</a>
			<a href="admin/kasbon/print_kasbon.php" target="_blank" title="Tambah Data" class="btn btn-success ">
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
							<th>Tanggal Pengajuan</th>
							<th>Besarnya Pinjaman</th>
							<th>Keperluan Peminjaman</th>
							<th>Jangka Waktu</th>
							<th>Pemotongan Per Bulan</th>
							<th>Cara Pengembalian</th>
							<th>Kelola</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("SELECT B.*, K.nama FROM kasbon B INNER JOIN karyawan K on B.id_karyawan = K.nik ORDER BY tanggal DESC");
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
									<?php echo date('d M Y', strtotime($data['tanggal'])); ?>
								</td>
								<td>
									<?php echo 'Rp ', number_format($data['besar_pinjaman']); ?>
								</td>
								<td>
									<?php echo $data['keperluan']; ?>
								</td>
								<td>
									<?php echo $data['jangka_waktu'], ' Bulan' ?>
								</td>
								<td>
									<?php echo 'Rp ', number_format($data['jumlah_pemotongan']); ?>
								</td>
								<td>
									<?php echo $data['cara_pengembalian']; ?>
								</td>
								<td>
									<a href="?page=MyApp/edit_barang&kode=<?php echo $data['id']; ?>" title="Ubah" class="btn btn-success">
										<i class="glyphicon glyphicon-edit"></i>
									</a>
									<a href="admin/kasbon/print_data_kasbon.php?kode=<?php echo $data['id']; ?>" title="Ubah" target="blank" class="btn btn-success">
										<i class="glyphicon glyphicon-print"></i>
									</a>
									<a href="?page=MyApp/del_barang&kode=<?php echo $data['id']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')" title="Hapus" class="btn btn-danger">
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