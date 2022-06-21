<?php
include "../model/conf.php";
if(isLogin()){

$post = isset($_POST['submit'])? $_POST : null;
$value = array_slice($post,2,count($post)-3);
$columns = array_keys($value);
$participant = post('participant')+1;
$kode = post('kode');
$userId = $_SESSION['login']['id'];
// echo "<br>";
// echo implode("', '", $columns);
// echo "<br>";
// echo implode(", ", $value);
// echo "<br>";
// echo $participant;
// echo "<br>";
// echo $userId;
saveUserAnswer($conn, "p$kode", implode(", ", $columns), $userId, implode(", ", $value), getLogin(), $participant);
} else{echo "Silahkan login";}
?>