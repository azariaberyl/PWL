<?php
include "../model/conf.php";
if(isLogin()){

/* Id dari data yang mau dihapus */
$id = get('id');

/* Database yang dipake user */
$user = getLogin();

/* Data dari editing */
$data = $_POST;
$key = array_keys($data);
print_r($data);
print_r("<br>");
print_r($key);

/* Mendapatkan lastId 
digunakan untuk mendapatkan id terakhir yang di database
digunakan untuk menambah data pada tabel participant agar pertanyaan dan id sama
pertanyaan$lastId+1
0 sebagai nilai awal
*/
$lastId = 0;

/* Edit judulnya */
$judul = $data['title'];
editJudul($conn, $user,$judul, $id);

/* table yang diedit saat ini
table yang berdasarkan kode / sebuah pertanyaan2 / tableP
*/
$tableName= getSingleTableDatabase($conn, $user, $id)[0];
echo $tableName;

/* Hapus data pertanyaan dari tabel p 
$deleted adalah array dari id yang akan dihapus
*/
$deleted = $data[$key[count($data)-2]];
print_r($deleted);
foreach ($deleted as $key => $value) {
  delTableP($conn, $tableName, $value);
  delParticipantTable($conn, "p$tableName", $value);
  echo "Berhasil menghapus id: $value";
}

/* Menambahkan data */


header("location:../view/dashboard.php");
}else {
  echo "Silahkan login";
}
?>