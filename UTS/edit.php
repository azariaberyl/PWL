<?php
include 'conn.php';
include 'conf.php';
$hasil = $koneksi->prepare("SELECT * FROM barang WHERE `kode_barang` ='".get('id')."'");
$hasil->execute();
$data = $hasil->fetch(PDO::FETCH_ASSOC);
?>
<h2>Edit Data Barang</h2>
<form method="POST" action="proses/update.php"
enctype="multipart/form-data">
    <input type="text" name="kode_barang" value="<?php echo $data['kode_barang'];?>"/>
    <table>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" value="<?php echo $data['nama'];?>"></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="text" name="harga" value="<?php echo $data['harga'];?>"></td>
        </tr>
        <tr>
            <td>Stock</td>
            <td><input type="text" name="jml_stok" value="<?php echo $data['jml_stok'];?>"></td>
        </tr>
        <tr>
            <td>Logo</td>
            <td><input type="file" name="gambar" value="<?php echo $data['gambar'];?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit">Update</button></td>
        </tr>
    </table>
</form
