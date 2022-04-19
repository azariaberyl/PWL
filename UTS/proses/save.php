<?php
    include '../conf.php';
    include '../conn.php';
    $nama = post('nama');
    $harga = post('harga');
    $jmlStok = post('jml_stok');
    $logo = "";
    if($_FILES['gambar']['tmp_name']!=""){
        $tmp_logo = $_FILES['gambar']['tmp_name'];
        $logo = $_FILES['gambar']['name'];
        move_uploaded_file($tmp_logo, "../foto/".$logo);
    }
    $simpan = $koneksi->prepare("INSERT INTO `barang`(`nama`, `harga`, `gambar`, `jml_stok`) VALUES ('$nama',$harga,'$logo',$jmlStok)");
    $simpan->execute();
    header("location:../index.php");
?>