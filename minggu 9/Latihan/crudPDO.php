<?php
class crudPDO
{
  public $koneksi;
  function __construct($koneksi){
    $this->koneksi = $koneksi;
  }
  function create($nama, $alamat, $logo=""){
    if ($_FILES['logo']['tmp_name']!=""){
      $tmp_name = $_FILES['logo']['tmp_name'];
      $logo = $_FILES['logo']['name'];
      move_uploaded_file($tmp_logo, "../../assets/foto/".$logo);
    }
    $stmt = $this->koneksi->prepare("INSERT INTO sekolah (`nama`,`alamat`,`logo`) VALUES ('$nama','$alamat','$logo')");
    $stmt->execute();
  }
  function read($id){
    $stmt = $this->koneksi->prepare("SELECT * FROM sekolah WHERE `id` = '$id'");
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return data;
  }
  function update($id, $nama, $alamat, $update_logo=""){
    if ($_FILES['logo']['tmp_name']!=""){
      $tmp_logo = $_FILES['logo']['tmp_name'];
      $logo = $_FILES['logo']['name'];
      move_uploaded_file($tmp_logo, "../../assets/foto/".$logo);
      $update_logo = ",`logo`='".$logo."'";
    }
    $stmt = $this->koneksi->prepare("UPDATE sekolah SET
    `nama`='$nama',`alamat`='$alamat' $update_logo
    WHERE
    `id` ='$id");
    $stmt->execute();
  }
  function delete($id){
    $stmt= $this->koneksi->prepare("DELETE FROM sekolah WHERE `id` = '$id'");
    $stmt->execute();

  }
}
?>