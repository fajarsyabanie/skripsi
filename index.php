<?php
//Mulai Sesion
session_start();
if (isset($_SESSION["ses_username"]) == "") {
	header("location: login.php");
} else {
	$data_id = $_SESSION["ses_id"];
	$data_nama = $_SESSION["ses_nama"];
	$data_user = $_SESSION["ses_username"];
	$data_level = $_SESSION["ses_level"];
}

//KONEKSI DB
include "inc/koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PT TOTAL SARANA MANDIRI</title>
	<link rel="icon" href="dist/img/logo.jpg">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/911d4709ac.js" crossorigin="anonymous"></script>
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/select2.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<!-- <a href="index.php" class="logo"> -->
			<a class="logo">
				<span class="logo-lg">
					<img src="dist/img/logo.jpg" width="37px">
					<b>PT TSM</b>
				</span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- Messages: style can be found in dropdown.less-->
						<li class="dropdown messages-menu">
							<a class="dropdown-toggle">
								<span>
									<b>
										Website Administrasi keuangan PT Total Sarana Mandiri
									</b>
								</span>
							</a>
						</li>
					</ul>
				</div>
			</nav>
		</header>

		<!-- =============================================== -->

		<!-- Left side column. contains the sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				</<b>
				<div class="user-panel">
					<div class="pull-left image">
						<img src="dist/img/avatar.jpg" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p>
							<?php echo $data_nama; ?>
						</p>
						<span class="label label-warning">
							<?php echo $data_level; ?>
						</span>
					</div>
				</div>
				</br>
				<!-- /.search form -->
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu">
					<li class="header">MAIN NAVIGATION</li>

					<!-- Level  -->
					<?php
					if ($data_level == "Administrator") {
					?>
						<li class="treeview">
							<a href="?page=admin">
								<i class="fa fa-dashboard"></i>
								<span>Dashboard</span>
								<span class="pull-right-container">
								</span>
							</a>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-folder"></i>
								<span>Kelola Data</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">

								<li>
									<a href="?page=MyApp/data_kasbon">
										<i class="fas fa-dollar"></i>Peminjaman Karyawan</a>
								</li>
								<li>
									<a href="?page=MyApp/data_bongkaran">
										<i class="fa fa-truck"></i>Bongkaran</a>
								</li>
								<li>
									<a href="?page=MyApp/data_dinas">
										<i class="fas fa-car"></i>Perjalanan Dinas</a>
								</li>

								<li>
									<a href="?page=MyApp/data_entertaiment">
										<i class="fas fa-music"></i> Data Entertaiment</a>
								</li>
								<li>
									<a href="?page=MyApp/data_mutasi">
										<i class="fas fa-file-invoice-dollar"></i> Mutasi Kas Kecil</a>
								</li>
							</ul>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-truck"></i>
								<span>Perjalanan/BBM</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">

								<li>
									<a href="?page=MyApp/data_bensin">
										<i class="fa fa-gas-pump"></i>Pemakaian Bensin</a>
								</li>
								<li>
									<a href="?page=MyApp/data_kunjungan">
										<i class="fas fa-cab"></i> Rencana Kunjungan</a>
								</li>
							</ul>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-money"></i>
								<span>Pengajuan</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">

								<li>
									<a href="?page=MyApp/data_kasbonbeli">
										<i class="fa fa-dollar"></i>Kasbon</a>
								</li>
							</ul>
						</li>

						<li class="treeview">
							<a href="?page=MyApp/data_karyawan">
								<i class="far fa-address-book"></i>
								<span>Data Karyawan</span>
								<span class="pull-right-container">
								</span>
							</a>
						</li>


						<!-- <li class="treeview">
							<a href="#">
								<i class="fa fa-print"></i>
								<span>Laporan</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="admin/kasbon/print_kasbon.php" target="blank">
										<i class="fa fa-file"></i>Laporan Pinjaman Karyawan</a>
								</li>
								<li>
									<a href="admin/bongkaran/print_bongkaran.php" target="blank">
										<i class="fa fa-file"></i>Laporan Pengajuan Bongkaran</a>
								</li>
								<li>
									<a href="admin/dinas/print_dinas.php" target="blank">
										<i class="fa fa-file"></i>Laporan Perjalanan Dinas</a>
								</li>
								<li>
									<a href="admin/gaji/print_gaji.php" target="blank">
										<i class="fa fa-file"></i>Laporan Slip Gaji</a>
								</li>
								<li>
									<a href="admin/absensi/print_absensi.php" target="blank">
										<i class="fa fa-file"></i>Laporan Absensi Karyawan</a>
								</li>
							</ul>
						</li> -->

						<li class="header">SETTING</li>

						<li class="treeview">
							<a href="?page=MyApp/data_pengguna">
								<i class="fa fa-user"></i>
								<span>Pengguna Sistem</span>
								<span class="pull-right-container">
								</span>
							</a>
						</li>

					<?php
					} elseif ($data_level == "Sales") {
					?>

						<li class="treeview">
							<a href="?page=sales">
								<i class="fa fa-dashboard"></i>
								<span>Dashboard</span>
								<span class="pull-right-container">
								</span>
							</a>
						</li>

						<li>
							<a href="?page=MyAppSales/data_dinas">
								<i class="fas fa-car"></i>Perjalanan Dinas</a>
						</li>

						<li>
							<a href="?page=MyAppSales/data_entertaiment">
								<i class="fas fa-music"></i> Data Entertaiment</a>
						</li>

						<li>
							<a href="?page=MyAppSales/data_kunjungan">
								<i class="fas fa-car"></i> Rencana Kunjungan</a>
						</li>






					<?php

					} elseif ($data_level == "Pimpinan") {
					?>

						<li class="treeview">
							<a href="?page=pimpinan">
								<i class="fa fa-dashboard"></i>
								<span>Dashboard</span>
								<span class="pull-right-container">
								</span>
							</a>
						</li>
						<li class="treeview">
							<a href="?page=MyAppPimpinan/data_kasbon">
								<i class="fas fa-dollar"></i>
								<span>Data Peminjaman Karyawan</span>
								<span class="pull-right-container">
								</span>
							</a>
						</li>
						<li class="treeview">
							<a href="?page=MyAppPimpinan/data_bongkaran">
								<i class="fa fa-truck"></i>
								<span>Data Bongkaran</span>
								<span class="pull-right-container">
								</span>
							</a>
						</li>
						<li class="treeview">
							<a href="?page=MyAppPimpinan/data_dinas">
								<i class="fas fa-car"></i>
								<span>Data Perjalanan Dinas</span>
								<span class="pull-right-container">
								</span>
							</a>
						</li>
						<li class="treeview">
							<a href="?page=MyAppPimpinan/data_entertaiment">
								<i class="fas fa-music"></i>
								<span>Data Entertaiment</span>
								<span class="pull-right-container">
								</span>
							</a>
						</li>
						<li class="treeview">
							<a href="?page=MyAppPimpinan/data_mutasi">
								<i class="fas fa-file-invoice-dollar"></i>
								<span>Data Mutasi Kas Kecil</span>
								<span class="pull-right-container">
								</span>
							</a>
						</li>
						<li class="treeview">
							<a href="?page=MyAppPimpinan/data_bensin">
								<i class="fa fa-gas-pump"></i>
								<span>Data Pemakaian Bensin</span>
								<span class="pull-right-container">
								</span>
							</a>
						</li>
						<li class="treeview">
							<a href="?page=MyAppPimpinan/data_kunjungan">
								<i class="fas fa-cab"></i>
								<span>Data Rencana Kunjungan</span>
								<span class="pull-right-container">
								</span>
							</a>
						</li>
						<li class="treeview">
							<a href="?page=MyAppPimpinan/data_kasbonbeli">
								<i class="fa fa-dollar"></i>
								<span>Data Kasbon</span>
								<span class="pull-right-container"></span>
							</a>

			<?php

					} elseif ($data_level == "Admin Gudang") {
			?>

				<li class="treeview">
					<a href="?page=admin_gudang">
						<i class="fa fa-dashboard"></i>
						<span>Dashboard</span>
						<span class="pull-right-container">
						</span>
					</a>
				</li>

				<li>
					<a href="?page=MyAppGudang/data_bongkaran">
						<i class="fa fa-truck"></i>Bongkaran</a>
				</li>



			<?php

					}
			?>

			<li>
				<a href="logout.php" onclick="return confirm('Anda yakin keluar dari aplikasi ?')">
					<i class="fa fa-sign-out"></i>
					<span>Logout</span>
					<span class="pull-right-container"></span>
				</a>
			</li>


			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- =============================================== -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<!-- Main content -->
			<section class="content">
				<?php
				if (isset($_GET['page'])) {
					$hal = $_GET['page'];

					switch ($hal) {
							//Klik Halaman Home Pengguna
						case 'admin':
							include "home/admin.php";
							break;
						case 'pimpinan':
							include "home/pimpinan.php";
							break;
						case 'sales':
							include "home/sales.php";
							break;
						case 'admin_gudang':
							include "home/admin_gudang.php";
							break;



							//punya admin
							//Pengguna
						case 'MyApp/data_pengguna':
							include "admin/pengguna/data_pengguna.php";
							break;
						case 'MyApp/add_pengguna':
							include "admin/pengguna/add_pengguna.php";
							break;
						case 'MyApp/edit_pengguna':
							include "admin/pengguna/edit_pengguna.php";
							break;
						case 'MyApp/del_pengguna':
							include "admin/pengguna/del_pengguna.php";
							break;

							//Karyawan
						case 'MyApp/data_karyawan':
							include "admin/karyawan/data_karyawan.php";
							break;
						case 'MyApp/add_karyawan':
							include "admin/karyawan/add_karyawan.php";
							break;
						case 'MyApp/edit_karyawan':
							include "admin/karyawan/edit_karyawan.php";
							break;
						case 'MyApp/del_karyawan':
							include "admin/karyawan/del_karyawan.php";
							break;

							//kasbon
						case 'MyApp/data_kasbon':
							include "admin/kasbon/data_kasbon.php";
							break;
						case 'MyApp/add_kasbon':
							include "admin/kasbon/add_kasbon.php";
							break;
						case 'MyApp/edit_kasbon':
							include "admin/kasbon/edit_kasbon.php";
							break;
						case 'MyApp/del_kasbon':
							include "admin/kasbon/del_kasbon.php";
							break;


							//bongkaran
						case 'MyApp/data_bongkaran':
							include "admin/bongkaran/data_bongkaran.php";
							break;
						case 'MyApp/add_bongkaran':
							include "admin/bongkaran/add_bongkaran.php";
							break;
						case 'MyApp/edit_bongkaran':
							include "admin/bongkaran/edit_bongkaran.php";
							break;
						case 'MyApp/del_bongkaran':
							include "admin/bongkaran/del_bongkaran.php";
							break;
						case 'MyApp/print_bongkaran':
							include "admin/bongkaran/print_bongkaran.php";
							break;
						case 'MyApp/print_data_bongkaran':
							include "admin/bongkaran/print_data_bongkaran.php";
							break;

							//dinas
						case 'MyApp/data_dinas':
							include "admin/dinas/data_dinas.php";
							break;
						case 'MyApp/add_dinas':
							include "admin/dinas/add_dinas.php";
							break;
						case 'MyApp/edit_dinas':
							include "admin/dinas/edit_dinas.php";
							break;
						case 'MyApp/del_dinas':
							include "admin/dinas/del_dinas.php";
							break;
						case 'MyApp/print_dinas':
							include "admin/dinas/print_dinas.php";
							break;

							



							//bensin
						case 'MyApp/data_bensin':
							include "admin/bensin/data_bensin.php";
							break;
						case 'MyApp/add_bensin':
							include "admin/bensin/add_bensin.php";
							break;
						case 'MyApp/edit_bensin':
							include "admin/bensin/edit_bensin.php";
							break;
						case 'MyApp/del_bensin':
							include "admin/bensin/del_bensin.php";
							break;
						case 'MyApp/print_bensin':
							include "admin/bensin/print_bensin.php";
							break;

							//kunjungan
						case 'MyApp/data_kunjungan':
							include "admin/kunjungan/data_kunjungan.php";
							break;
						case 'MyApp/add_kunjungan':
							include "admin/kunjungan/add_kunjungan.php";
							break;
						case 'MyApp/edit_kunjungan':
							include "admin/kunjungan/edit_kunjungan.php";
							break;
						case 'MyApp/del_kunjungan':
							include "admin/kunjungan/del_kunjungan.php";
							break;
						case 'MyApp/print_kunjungan':
							include "admin/kunjungan/print_kunjungan.php";
							break;

							

							//entertaiment
						case 'MyApp/data_entertaiment':
							include "admin/entertaiment/data_entertaiment.php";
							break;
						case 'MyApp/add_entertaiment':
							include "admin/entertaiment/add_entertaiment.php";
							break;
						case 'MyApp/edit_entertaiment':
							include "admin/entertaiment/edit_entertaiment.php";
							break;
						case 'MyApp/del_entertaiment':
							include "admin/entertaiment/del_entertaiment.php";
							break;
						case 'MyApp/print_entertaiment':
							include "admin/entertaiment/print_entertaiment.php";
							break;

							

							//mutasi
						case 'MyApp/data_mutasi':
							include "admin/mutasi/data_mutasi.php";
							break;
						case 'MyApp/add_mutasi':
							include "admin/mutasi/add_mutasi.php";
							break;
						case 'MyApp/edit_mutasi':
							include "admin/mutasi/edit_mutasi.php";
							break;
						case 'MyApp/del_mutasi':
							include "admin/mutasi/del_mutasi.php";
							break;
						case 'MyApp/print_mutasi':
							include "admin/mutasi/print_mutasi.php";
							break;


							//kasbonbeli
						case 'MyApp/data_kasbonbeli':
							include "admin/kasbonbeli/data_kasbonbeli.php";
							break;
						case 'MyApp/add_kasbonbeli':
							include "admin/kasbonbeli/add_kasbonbeli.php";
							break;
						case 'MyApp/edit_kasbonbeli':
							include "admin/kasbonbeli/edit_kasbonbeli.php";
							break;
						case 'MyApp/del_kasbonbeli':
							include "admin/kasbonbeli/del_kasbonbeli.php";
							break;
						case 'MyApp/print_kasbonbeli':
							include "admin/kasbonbeli/print_kasbonbeli.php";
							break;

							//punya sales

							//dinas sales
						case 'MyAppSales/data_dinas':
							include "sales/dinas/data_dinas.php";
							break;
						case 'MyAppSales/add_dinas':
							include "sales/dinas/add_dinas.php";
							break;
						case 'MyAppSales/edit_dinas':
							include "sales/dinas/edit_dinas.php";
							break;
						case 'MyAppSales/del_dinas':
							include "sales/dinas/del_dinas.php";
							break;
						case 'MyAppSales/print_dinas':
							include "sales/dinas/print_dinas.php";
							break;

							//entertaiment sales
						case 'MyAppSales/data_entertaiment':
							include "sales/entertaiment/data_entertaiment.php";
							break;
						case 'MyAppSales/add_entertaiment':
							include "sales/entertaiment/add_entertaiment.php";
							break;
						case 'MyAppSales/edit_entertaiment':
							include "sales/entertaiment/edit_entertaiment.php";
							break;
						case 'MyAppSales/del_entertaiment':
							include "sales/entertaiment/del_entertaiment.php";
							break;
						case 'MyAppSales/print_entertaiment':
							include "sales/entertaiment/print_entertaiment.php";
							break;

							//kunjungan sales
						case 'MyAppSales/data_kunjungan':
							include "sales/kunjungan/data_kunjungan.php";
							break;
						case 'MyAppSales/add_kunjungan':
							include "sales/kunjungan/add_kunjungan.php";
							break;
						case 'MyAppSales/edit_kunjungan':
							include "sales/kunjungan/edit_kunjungan.php";
							break;
						case 'MyAppSales/del_kunjungan':
							include "sales/kunjungan/del_kunjungan.php";
							break;
						case 'MyAppSales/print_kunjungan':
							include "sales/kunjungan/print_kunjungan.php";
							break;

							//punya admin gudang
							
							//bongkaran admin gudang
						case 'MyAppGudang/data_bongkaran':
							include "admin_gudang/bongkaran/data_bongkaran.php";
							break;
						case 'MyAppGudang/add_bongkaran':
							include "admin_gudang/bongkaran/add_bongkaran.php";
							break;
						case 'MyAppGudang/edit_bongkaran':
							include "admin_gudang/bongkaran/edit_bongkaran.php";
							break;
						case 'MyAppGudang/del_bongkaran':
							include "admin_gudang/bongkaran/del_bongkaran.php";
							break;
						case 'MyAppGudang/print_bongkaran':
							include "admin_gudang/bongkaran/print_bongkaran.php";
							break;

							//punya pimpinan
						case 'MyAppPimpinan/data_bensin':
							include "pimpinan/bensin/data_bensin.php";
							break;
						case 'MyAppPimpinan/data_bongkaran':
							include "pimpinan/bongkaran/data_bongkaran.php";
							break;
						case 'MyAppPimpinan/data_dinas':
							include "pimpinan/dinas/data_dinas.php";
							break;
						case 'MyAppPimpinan/data_entertaiment':
							include "pimpinan/entertaiment/data_entertaiment.php";
							break;
						case 'MyAppPimpinan/data_kasbon':
							include "pimpinan/kasbon/data_kasbon.php";
							break;
						case 'MyAppPimpinan/data_kasbonbeli':
							include "pimpinan/kasbonbeli/data_kasbonbeli.php";
							break;
						case 'MyAppPimpinan/data_kunjungan':
							include "pimpinan/kunjungan/data_kunjungan.php";
							break;
						case 'MyAppPimpinan/data_mutasi':
							include "pimpinan/mutasi/data_mutasi.php";
							break;


							//default
						default:
							echo "<center><br><br><br><br><br><br><br><br><br>
				  <h1> Halaman tidak ditemukan !</h1></center>";
							break;
					}
				} else {
					// Auto Halaman Home Pengguna
					if ($data_level == "Administrator") {
						include "home/admin.php";
					} elseif ($data_level == "Admin Gudang") {
						include "home/admin_gudang.php";
					} elseif ($data_level == "Pimpinan") {
						include "home/pimpinan.php";
					} elseif ($data_level == "Sales") {
						include "home/sales.php";
					}
				}
				?>



			</section>
			<!-- /.content -->
		</div>

		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="pull-right hidden-xs">
			</div>
			<center><strong>Copyright &copy; Fajar Sya'banie
		</footer>
		<div class="control-sidebar-bg"></div>

		<!-- ./wrapper -->

		<!-- jQuery 2.2.3 -->
		<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
		<!-- Bootstrap 3.3.6 -->
		<script src="bootstrap/js/bootstrap.min.js"></script>


		<script src="plugins/select2/select2.full.min.js"></script>
		<!-- DataTables -->
		<script src="plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

		<!-- AdminLTE App -->
		<script src="dist/js/app.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="dist/js/demo.js"></script>
		<!-- page script -->


		<script>
			$(function() {
				$("#example1").DataTable();
				$('#example2').DataTable({
					"paging": true,
					"lengthChange": false,
					"searching": false,
					"ordering": true,
					"info": true,
					"autoWidth": false
				});
			});
		</script>

		<script>
			$(function() {
				//Initialize Select2 Elements
				$(".select2").select2();
			});
		</script>
</body>

</html>