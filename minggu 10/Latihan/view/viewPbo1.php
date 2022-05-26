<?php
include_once("controller/controllerPbo1.php");
?>
<b>Mobil Pertama</b><br>
<?php $a->tampilWarna() ?>
<br>Mobil pertama ganti warna <br>
<?php
$a->gantiWarna("Merah");
$a->tampilWarna();
?>
<br><b>Mobil Kedua</b><br>
<?php
$b->gantiWarna("Hijau");
$b->tampilWarna();
?>