<?php
class Mobil
{
  var $warna;
  var $merk;
  var $harga;

  function __construct(){
    $this->warna = "Biru";
    $this->merk = "BMW";
    $this->harga = "10000000";
  }

  function gantiWarna($warnaBaru){
    $this->warna = $warnaBaru;
  }

  function tampilWarna(){
    echo "Warna mobilnya: $this->warna";
  }
}

$a = new Mobil();
$b = new Mobil();
echo "<b>Mobil Pertama</b><br>";
$a->tampilWarna();
echo "<br>Mobil pertma ganti warna<br>";
$a->gantiWarna("Merah");
$a->tampilWarna();

echo "<br><b>Mobil Kedua</b><br>";
$b->gantiWarna("Hijau");
$b->tampilWarna();
?>