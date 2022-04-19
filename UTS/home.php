<?php
    $hasil = $koneksi->prepare("SELECT * FROM barang ORDER BY kode_barang DESC");
    $hasil->execute();
    $data = $hasil->fetchAll();
    $i = 1;
    foreach ($data as $key) {
?>
<tr>
    <td style="width:200px"><img style="width: 100px;" class="img-mini" src="foto/<?php echo $key['gambar'];?>"></td>
    <td><?php echo $key['nama'];?></td>
    <td><?php echo $key['harga'];?></td>
    <td><?php echo $key['jml_stok'];?></td>
    <td><a href="edit.php?id=<?php echo $key['kode_barang'];?>">Edit</a></td>
    <td><a href="proses/delete.php?id=<?php echo $key['kode_barang'];?>">Delete</a></td>
    
</tr>
<?php
    $i++;
} ?>