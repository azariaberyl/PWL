<?php
include '../conf.php';
include '../conn.php';
$id = get('id');
$hapus = $koneksi->prepare("DELETE FROM barang WHERE `kode_barang` = '".$id."'");
$hapus->execute();
header("location:../index.php");
?>