<?php
class Mobil {
  public $warna;
  public $merk;
  public $harga;
  function __construct ($warna, $merk, $harga) {
    $this->warna  = $warna;
    $this->merk   = $merk;
    $this->harga  = $harga;
  }
  function gantiWarna($warna){
    $this->warna = $warna;
  }
  function tampilWarna(){
    echo "$this->warna";
  }
}
class Model {
  public function getMobil(){
    return new Mobil("Biru", "BMW", "100000000");
  }
}
?>