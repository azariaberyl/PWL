<?php
session_start();
if (isset($_POST["Login"])){
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    // Perikas login
    if ($user == "achmatin" && $pass = "123"){
        // Menciptakan session
        $_SESSION["login"] = $user;
        // Menuju ke halaman pemeriksaan session
        echo "<h1>Anda berhasil LOGIN</h1>";
        echo "<h2>Klick <a href='session02.php'>di sini (session02.php)</a></h2>";
    }
} else {
    ?>
    <html>
        <head>
            <title>Login here . . .</title>
        </head>
        <body>
            <form action="" method="post">
                <h2>Login here</h2>
                Username: <input type="text" name="user" id=""><br>
                Password: <input type="password" name="pass" id=""><br>
                <input type="submit" name="Login" value="Log in">
            </form>
        </body>
    </html>
<?php } ?>