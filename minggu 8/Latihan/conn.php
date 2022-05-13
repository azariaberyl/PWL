<?php
$engi="mysql";
$dbname = "crud_pdo";
$host = "localhost";
$user = "root";
$pass = "";
$koneksi = new PDO("$engi: dbname=$dbname;host=$host",$user,$pass);
?>