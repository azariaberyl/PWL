<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Form</title>
    <style>
        th {
            padding: 10px;
        }
    </style>
</head>
<?php
    if(isset($_POST["submit"])){
        $tugas = $_POST["tugas"];
        $uts = $_POST["uts"];
        $nim = $_POST["nim"];
        $uas = $_POST["uas"];

        $prodi = $_POST["prodi"];
        
    }
?>
<body>
    <table>
        <tr>
            <th>Program Studi</th>
            <th>NIM</th>
            <th>Nilai Akhir</th>
            <th>STATUS</th>
            <th>Catatan Khusus</th>
        </tr>
        <tr>
            <!-- Prodi -->
            <td><?php
            switch ($prodi) {
                case 'A11':
                    echo "Teknik Informatika S1";
                    break;
                case 'A12':
                    echo "Sistem Informasi S1";
                    break;
                case 'A22':
                    echo "Teknik Informatika D3";
                    break;
                
                default:
                    echo "Error";
                    break;
            }
            ?></td>
            <!-- Nim -->
            <td>
                <?php echo "$nim "; ?>
            </td>
            <!-- Nilai Akhir -->
            <td>
                <?php
                $na = (0.4*$tugas) + (0.3*$uts) + (0.3*$uas);
                echo $na;
                ?>
            </td>
            <!-- Status -->
            <td>
                <?php
                if ($na >= 60 ){
                    echo "Lulus";
                } else {
                    echo "Gagal";
                }
                 ?>
            </td>
            <td>
                <ul>
                    <?php
                    $arr = array();
                    if(isset($_POST["kehadiran"])){
                        $kehadiran = $_POST["kehadiran"];
                        array_push($arr,$kehadiran);
                    }
                    if(isset($_POST["interaktif"])){
                        $interaktif = $_POST["interaktif"];
                        array_push($arr,$interaktif);
                    }
                    if(isset($_POST["tidakTerlambat"])){
                        $tidakTerlambat = $_POST["tidakTerlambat"];
                        array_push($arr,$tidakTerlambat);
                    }
                    foreach ($arr as $key => $value) {
                        echo "<li>$value</li>";
                    }
                    ?>
                </ul>
            </td>
        </tr>
    </table>
</body>
</html>
