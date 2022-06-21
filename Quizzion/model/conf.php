<?php
session_start();
function tableExists($pdo, $table) {
  $pdoTemp = $pdo;
  try {
    $result = $pdo->query("SELECT 1 FROM {$table} LIMIT 1");
  } catch (Exception $e) {
    return FALSE;
  }
  $pdo = $pdoTemp;
  return $result !== FALSE;
}
// Mendapatkan kodeuser user+userId
function getLogin(){
  return "{$_SESSION['login']['username']}{$_SESSION['login']['id']}";
}
function get($item){
  return isset($item) ? htmlspecialchars($_GET[$item]) : null;
}
function post($item){
  return isset($item) ? htmlspecialchars($_POST[$item]) : null;
}

/*
Create Database KP
Membuat database baru untuk menyimpan data table user (kumpulan pertanyaan)
tableName berdasarkan username dan id
*/
function createTableDatabase($conn, $tableName){
  $connTemp = $conn;
  try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    // sql to create table
    $sql = "CREATE TABLE $tableName(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,judul VARCHAR(255) NOT NULL,participant int(30) NOT NULL, kode VARCHAR(255) NOT NULL)";
  
    // use exec() because no results are returned
    $conn->exec($sql);
    // echo "Table $tableName created successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  $conn = $connTemp;
}
/* Get Table Database KP
mendapatkan semua data yang akan ditampilkan dalam dashboard
*/
function getTableDatabase($conn, $tableName){
  $connTemp = $conn;
  try {
    $stmt = $conn->prepare("SELECT judul, kode, participant FROM $tableName");
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->fetchAll();
    $conn = $connTemp;
    return $result;
  } catch(PDOException $e) {
    $conn = $connTemp;
    echo "Error: " . $e->getMessage();
  }
}
/* 
menambahkan field data ke tabel user (KP)
data ini akan berada dalam TableDatabase / database berdasarkan username + id 
*/
function insertTable($conn, $tableDatabase, $judul, $kode){
  $connTemp = $conn;
  try {
    $sql = "INSERT INTO $tableDatabase (`judul`, `participant`, `kode`) VALUES (\"$judul\",0, \"$kode\")";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  
  $conn = $connTemp;
}

/*
Mendapatkan field data tabel user (kumpulan pertanyaan)
data ini berada dalam TableDatabase / database berdasarkan username + id
*/
function getTableUser($conn, $tableDatabase){
  $connTemp = $conn;
  try {
    $stmt = $conn->prepare("SELECT * FROM $tableDatabase");
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->fetchAll();
    $conn = $connTemp;
    return $result;
  } catch(PDOException $e) {
    $conn = $connTemp;
    echo "Error: " . $e->getMessage();
  }
}

/* menghapus field tabel user (KP)
data ini berada dalam TableDatabase / database berdasarkan username + id
*/
function delTable($conn, $tableDatabase, $id){
  /* Akan menghapus sebuah tabel user (KP)
  Maka akan menghapus juga database KP
  yaitu yang berasal dari namaTable dalam TableDatabase / database berdasarkan username + id
  */
  try {
    $connTemp = $conn;
    // sql to delete a record
    $sql = "DELETE FROM $tableDatabase WHERE id=$id";
  
    // use exec() because no results are returned
    $conn->exec($sql);
    // echo "Record deleted successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  $conn = $connTemp;
  /* Tambahkan kode untuk menghapus database table user (KP).
  database KP menyimpan semua pertanyaan2
  */
}
/* 
Membuat tabel pertanyaan berasal dari kode
tableName berasal dari kode
*/
function createTableP($conn, $tableName){
  $connTemp = $conn;
  try {
  
    // sql to create table
    $sql = "CREATE TABLE $tableName (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pertanyaan VARCHAR(255) NOT NULL,
    optiona VARCHAR(255) NOT NULL,
    optionb VARCHAR(255) NOT NULL,
    optionc VARCHAR(255) NOT NULL,
    optiond VARCHAR(255) NOT NULL
    )";
  
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table MyGuests created successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  
  $conn = $connTemp;
}
/* Menambahkan data ke TableP
*/
function insertTableP(
  $conn, $tableName, $pertanyaan, $optiona,$optionb,$optionc,$optiond){

  $connTemp = $conn;
  try {
    $sql = "INSERT INTO $tableName (`pertanyaan`, `optiona`, `optionb`, `optionc`, `optiond`) VALUES (\"$pertanyaan\", \"$optiona\", \"$optionb\", \"$optionc\", \"$optiond\")";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  $conn = $connTemp;
}
/* Mengambil data dari TableP
*/
function getTableP($conn, $tableName){
  $connTemp = $conn;
  try {
    $stmt = $conn->prepare("SELECT pertanyaan, optiona, optionb, optionc, optiond FROM $tableName");
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->fetchAll();
    return $result;
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = $connTemp;
}
/* Membuat tabel participant
*/
function createParticipantTable($conn, $tableName, $jumlahPertanyaan){
  $connTemp = $conn;
  try {
  
    // sql to create table
    $sql = "CREATE TABLE $tableName (
    userId INT(6) PRIMARY KEY
    )";
  
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table $tableName created successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  $conn = $connTemp;

  try {
    // sql to create table
    for ($i=1; $i <= $jumlahPertanyaan; $i++) { 
      $sql = "ALTER TABLE $tableName ADD pertanyaan$i int(1);";
      // use exec() because no results are returned
      $conn->exec($sql);
    }
    echo "Table Add successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
}
// check login
function isLogin(){
  if (isset($_SESSION["login"])) {
    return true;
  } else {
    return false;
  }
}

// Connection to database
$engi = "mysql";
$host = "localhost";
$dbse = "quizion";
$user = "root";
$pass = "";
$conn = new PDO("$engi:dbname=$dbse;host=$host", $user,$pass);
?>