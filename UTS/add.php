<h2>Tambah Data Barang</h2>
<form method="POST" action="proses/save.php"
enctype="multipart/form-data">
    <table>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama"></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="text" name="harga"></td>
        </tr>
        <tr>
            <td>Stock</td>
            <td><input type="text" name="jml_stok"></td>
        </tr>
        <tr>
            <td>Logo</td>
            <td><input type="file" name="gambar"></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit">Simpan</button></td>
        </tr>
    </table>
</form
