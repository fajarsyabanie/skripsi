<?php
if(isset($_GET['kode'])){
            $sql_hapus = "DELETE FROM rencana_kunjungan WHERE id='".$_GET['kode']."'";
            $query_hapus = mysqli_query($koneksi, $sql_hapus);

            $sql_hapus2 = "DELETE FROM kunjungan_rincian WHERE id_kunjungan='".$_GET['kode']."'";
            $query_hapus2 = mysqli_query($koneksi, $sql_hapus2);

            if ($query_hapus && $query_hapus2) {
                echo "<script>
                Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=MyApp/data_kunjungan';
                    }
                })</script>";
                }else{
                echo "<script>
                Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=MyApp/data_kunjungan';
                    }
                })</script>";
            }
        }

