<!DOCTYPE html>
<html lang="en">
<body>
    <?php
    $nim = "A11.2020.80011";
    $nama = "Sutrisno";
    $umur = 23;
    $nilai = 82.25;
    $status = TRUE;
    echo "NIM : " . $nim . "<br>";
    echo "Nama : $nama<br>";
    print "Umur: " . $umur;print "<br>";
    printf ("Nilai : %.3f<br>", $nilai);
    if ($status){
        echo "Status : Aktif";
    } else {
        echo "Status : Tidak Aktif";
    }
    ?>
</body>
</html>