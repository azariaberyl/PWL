<?php
    include 'conn.php';
    include 'conf.php';
    global $koneksi;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Toko ABC</title>
</head>
<body>

    <?php include 'menu.php';?>
    <div class="space"></div>
    <a href="add.php">Tambah Barang</a>
    <div class="welcome">Pengelola Barang dan User Toko ABC</div>
    <table class="content">
        <tr>
            <th>Logo</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th colspan="2">Action</th>
        </tr>

        <?php
        if (!is_null(get('p'))){
            inc('home');
        }
        ?>
    </table>
</body>
</html>