<?php
include "conn.php";
session_start();
if (isset($_POST["login"])){
    echo "Login";
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $hasil = $koneksi->prepare("SELECT username, pass FROM crud_pdo.tb_user");
    $hasil->execute();
    $data = $hasil->fetchAll();
    foreach ($data as $key) {
        if ($user == $key["username"] && $pass == $key["pass"]){
            echo "Berhasil";
            // Menciptakan session
            $_SESSION["login"] = $user;
            header("location:index.php");
            break;
        }
    }
} else {
    echo "Gagal";
}
?>
<div style="width: 80%; margin:auto">
    <form style="width:90%" action="" method="post">
        <label for="user">Username</label>
        <input type="text" id="user" name="user"><br>
        <label for="user">Password</label>
        <input type="pass" id="user" name="pass"><br>
        <input style="margin:auto;margin-top:20px" name="login" type="submit" value="Login">
    </form>
</div>