<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Jurusan</title>
</head>
<body>
    <form action="prosesradio.php" method="post">
        <h2>Pilih Jurusan Anda :</h2>
        <input type="radio" name="jurusan" value="TI" checked>Teknik Informatika <br>
        <input type="radio" name="jurusan" value="SI"> Sistem Informasi <br>
        <input type="radio" name="jurusan" value="SK"> Sistem Komputer <br>
        <input type="radio" name="jurusan" value="KA"> Komputerisasi Akutansi <br>
        <input type="submit" name="Pilih" value="Pilih">
    </form>
</body>
</html>