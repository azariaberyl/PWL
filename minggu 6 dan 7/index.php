<?php
include 'conn.php';
include 'conf.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/css.css" >
    <title>PDO CRUDSRUD</title>
</head>
<body>
    <div class="top-gray"></div>
    <div class="header">
        <div class="big-logo">Latihan CRUDSRUD</div>
        <?php include 'menu.php';?>
    </div>
    <div class="content"><div class="container">
        <?php
        
        if(!is_null(get('p'))){
            switch (get('p')) {
            case 'home':
                inc('home');
                break;
            case 'sekolah':
                switch (get('m')) {
                case 'home':
                    inc('tampilan/sekolah/all');
                    break;
                case 'add':
                    inc('tampilan/sekolah/add');
                    break;
                case 'edit':
                    inc('tampilan/sekolah/edit');
                    break;
                    default:
                    inc('tampilan/sekolah/all');
                    break;
                }
                break;
            case 'login':
                if (isset($_SESSION["login"])){
                    unset ($_SESSION);
                    session_destroy();
                    header("location:index.php");
                    break;
                } else {
                    inc('../minggu 8/Latihan/login');
                    break;
                }
            default:
                inc('home');
                break;
            }
        }else{ 
            inc('home'); 
        } ?>
    </div></div>
</body>
</html>