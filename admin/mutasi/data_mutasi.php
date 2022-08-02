<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT * FROM mutasi WHERE id='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<section class="content-header">
	<h1>
		Laporan
		<small>Arus Kas Keluar</small>
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
			<a href="?page=MyApp/add_mutasi" title="Tambah Data" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Tambah Laporan Arus Kas Keluar</a>
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
							<th>Perwakilan</th>
							<th>Pembuat</th>
							<th>Periode</th>
							<th>Kelola</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("SELECT M.*, K.nama, P.nama_perwakilan FROM mutasi M INNER JOIN karyawan K on M.id_karyawan = K.nik INNER JOIN perwakilan P on M.id_cabang = P.id");
						while ($data = $sql->fetch_assoc()) {
						?>

							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td>
									<?php echo $data['nama_perwakilan']; ?>
								</td>
								<td>
									<?php echo $data['nama']; ?>
								</td>
								<td>
									<?php echo date('d M Y', strtotime($data['t_awal'])), ' - ',  date('d M Y', strtotime($data['t_akhir'])); ?>
								</td>

								<td>
									<a href="?page=MyApp/edit_mutasi&kode=<?php echo $data['id']; ?>" title="Ubah" class="btn btn-success">
										<i class="glyphicon glyphicon-edit"></i>
									</a>
									<a href="admin/mutasi/print_mutasi.php?kode=<?php echo $data['id']; ?>" title="Print" target="blank" class="btn btn-success">
										<i class="glyphicon glyphicon-print"></i>
									</a>
									<a href="?page=MyApp/del_mutasi&kode=<?php echo $data['id']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')" title="Hapus" class="btn btn-danger">
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