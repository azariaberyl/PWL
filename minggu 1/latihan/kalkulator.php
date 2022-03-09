<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_GET["submit"])){
        $bil1 = $_GET["bil1"];
        $bil2 = $_GET["bil2"];
        $hasil = 0;
        $operator = $_GET["operator"];
    
        switch ($operator){
            case "tambah":
                $hasil = $bil1+$bil2;
                break;
            case "kurang":
                $hasil = $bil1-$bil2;
                break;
            case "kali":
                $hasil = $bil1*$bil2;
                break;
            case "bagi":
                $hasil = $bil1/$bil2;
                break;
            default:
                $hasil = 0;
        }
    }
    ?>
    <form action="kalkulator.php" method="get">
        <label for="bil1">Bilangan 1</label>
        <input type="number" name="bil1" value=<?php echo "$bil1" ?> > <br>
        <label for="bil2">Bilangan 2</label>
        <input type="number" name="bil2" value=<?php echo "$bil2" ?> > <br><br>
        <label for="hasil">Hasil</label>
        <input type="number" name="hasil" disabled value=<?php echo "$hasil" ?> > <br><br>

        <label for="operator">Operator</label>
        <select name="operator" id="">
            <option value="tambah">Tambah</option>
            <option value="kurang">Kurang</option>
            <option value="bagi">Bagi</option>
            <option value="kali">Kali</option>
        </select>
        <input type="submit" name="submit" value="=">

    </form>
</body>
</html>