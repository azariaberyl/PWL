<?php
include "../model/conf.php";
if (isLogin()){
/* Data yang disimpan di KP user+userId
judul, participant = 0, kode = user+userId+rand()
*/
$rand=rand();
$user = getLogin();
$kode = "{$_SESSION['login']['id']}x$rand";
$judul = post('title');
echo "$judul, $kode";
$post = $_POST;
echo "Array utuh <br>";
print_r($post);
try {
  $jumlahPertanyaan=0;
  insertTable($conn, $user, $judul, $kode);
  createTableP($conn, $kode);
  for ($i=1; $i <= count($post)-2; $i+=5) { 
    // echo "<br> Ini array $i";
    $jumlahPertanyaan++;
    $key = array_keys($post);
    $pertanyaan = $post[$key[$i]];
    $optiona = $post[$key[$i+1]];
    $optionb = $post[$key[$i+2]];
    $optionc = $post[$key[$i+3]];
    $optiond = $post[$key[$i+4]];
    insertTableP($conn, $kode, $pertanyaan, $optiona, $optionb, $optionc, $optiond);
    
  }
  createParticipantTable($conn, "p$kode", $jumlahPertanyaan);
  header("location:../view/dashboard.php");
} catch (\Throwable $th) {
  echo "Gagal, silahkan kembali kehalaman sebelumnya dan coba lagi";
}
} else{echo "Silahkan login";}
?>