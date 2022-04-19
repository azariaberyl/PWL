<?php
    include '../conf.php';
    include '../conn.php';
    $id = post('kode_barang');
    $nama = post('nama');
    $harga = post('harga');
    $jmlStok = post('jml_stok');
    $update_logo = "";
    if($_FILES['logo']['tmp_name']!=""){
        $tmp_logo = $_FILES['logo']['tmp_name'];
        $logo = $_FILES['logo']['name'];
        move_uploaded_file($tmp_logo, "../foto/".$logo);
        $update_logo = ",`logo`='".$logo."'";
    }
    $simpan = $koneksi->prepare("UPDATE barang SET
        `nama` = '$nama',
        `harga` = $harga,
        `gambar` = '$update_logo',
        `jml_stok` = $jmlStok
    WHERE
        `kode_barang` ='".$id."'"
    );
    $simpan->execute();
    header("location:../index.php?p=barang&id=$id");
?>
