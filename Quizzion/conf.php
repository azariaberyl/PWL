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
function get($item){
  return isset($item) ? htmlspecialchars($_GET[$item]) : null;
}
function post($item){
  return isset($item) ? htmlspecialchars($_POST[$item]) : null;
}
function createTable($conn, $tableName){
  $connTemp = $conn;
  try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    // sql to create table
    $sql = "CREATE TABLE $tableName(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,tableName VARCHAR(255) NOT NULL,participant int(30) NOT NULL)";
  
    // use exec() because no results are returned
    $conn->exec($sql);
    // echo "Table $tableName created successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  $conn = $connTemp;
}
function isLogin(){
  if (isset($_SESSION["login"])) {
    return true;
  } else {
    return false;
  }
}
$engi = "mysql";
$host = "localhost";
$dbse = "quizion";
$user = "root";
$pass = "";
$conn = new PDO("$engi:dbname=$dbse;host=$host", $user,$pass);
?>