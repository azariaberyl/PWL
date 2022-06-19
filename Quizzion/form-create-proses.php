<?php
include "conf.php";
/* Data yang disimpan di KP user+userId
judul, participant = 0, kode = user+userId+rand()
*/
$rand=rand();
$user = getLogin();
$kode = "$user$rand";
$judul = post('title');
echo "$judul, $kode";
$post = $_POST;
echo "Array utuh <br>";
print_r($post);
for ($i=1; $i <= count($post)-2; $i+=5) { 
  echo "<br> Ini array $i";
  $key = array_keys($post);
  $pertanyaan = $post[$key[$i]];
  $optiona = $post[$key[$i+1]];
  $optionb = $post[$key[$i+2]];
  $optionc = $post[$key[$i+3]];
  $optiond = $post[$key[$i+5]];
  echo "$pertanyaan $optiona $optionb $optionc $optiond";
  
}
// try {
//   insertTable($conn, $user, $judul, $kode);
//   createTableP($conn, $kode);
// } catch (\Throwable $th) {
//   //throw $th;
// }

// header("location:dashboard.php");
?>