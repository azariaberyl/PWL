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
    $stmt = $conn->prepare("SELECT id, judul, kode, participant FROM $tableName");
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


/* menghapus field tabel user (KP)
data ini berada dalam TableDatabase / database berdasarkan username + id
*/
function delTable($con, $tableName, $id){
  /* Mengambil kode dari data yang ingin dihapus */
  try {
    $conn = $con;
    $stmt = $conn->prepare("SELECT kode FROM $tableName WHERE id=\"$id\"");
    $stmt->execute();
    
    // set the resulting array to associative
    $result = $stmt->fetch();
    $kode = $result[0];
    // print_r($kode);
  } catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }

  /* Akan menghapus sebuah tabel user (KP)
  Maka akan menghapus juga database KP
  yaitu yang berasal dari namaTable dalam TableName / database berdasarkan username + id
  */
  try {
    $conn = $con;
    /* Menghapus row di KP */
    $sql = "DELETE FROM $tableName WHERE kode=\"$kode\"";
  
    // use exec() because no results are returned
    $conn->exec($sql);
    // echo "Record deleted successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }

  /* Drop table yang berkaitan dengan KP
  table participant dan table pertanyaans
  */
  try {
    $conn = $con;
    /* Drop table */
    $sql = "DROP TABLE `$kode`, `p$kode`";
    $conn->exec($sql);
  } catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
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
/* Menyimpan jawaban user
ketika user mengklik submit maka akan menambah field di participantTable
dan menganti value user participant+1
*/
function saveUserAnswer(
  $conn, $tableParticipant, $columns, $userId, $value, $tableUser, $participant, $kode){
  $connTemp = $conn;
  try {
    $sql = "INSERT INTO $tableParticipant (userId, $columns) VALUES ($userId, $value)";
    // use exec() because no results are returned
    $conn->exec($sql);

    $sql1 = "UPDATE $tableUser SET participant=$participant WHERE kode=\"$kode\"";
    // print_r($sql1);
    // Prepare statement
    $stmt = $conn->prepare($sql1);
    // execute the query
    $stmt->execute();
    echo "New record created successfully";
  } catch(PDOException $e) {
    echo "$e";
  }
  
  $conn = $connTemp;
}
/* Mendapatkan user berdasarkan id
returnnya user+userid
*/
function getUserById($con, $id){
  $conn = $con;

  $stmt = $conn->prepare("SELECT id, username FROM users WHERE id=$id");
  $stmt->execute();
  $result = $stmt->fetch();
  $data = "{$result['username']}{$result['id']}";
  return $data;
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