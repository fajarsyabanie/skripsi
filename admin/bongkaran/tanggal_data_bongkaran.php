<?php
if(isset($_POST['kimochi'])){
    $_SESSION['tanggal_awal'] = $_POST['tanggal_awal'];
    $_SESSION['tanggal_akhir'] = $_POST['tanggal_akhir'];
    header('Location: ./?page=MyApp/data_bongkaran');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <div class="row">
            <div class="col-md-12">
                <label for="">Tanggal Awal</label>
                <input type="date" name="tanggal_awal" id="">
            </div>
            <div class="col-md-12">
                <label for="">Tanggal Akhir</label>
                <input type="date" name="tanggal_akhir" id="">
            </div>
            <button type="submit" name="kimochi">Kimochi Desu</button>
        </div>
    </form>
</body>

</html>