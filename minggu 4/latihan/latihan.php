<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table, td,th {
            border: 1px solid grey ;
        }

        th {
            width: 40%;
        }

        table {
            border-collapse: collapse;
            height: 300px
        }

        input[type=text], input[type=number] {
            width:80%;
        }
    </style>
    <title>Form Mahasiswa</title>
</head>
<body>
    <form action="latihanproses.php" method="post">
        <table>
            <!-- NIM -->
            <tr>
                <th>NIM:</th>
                <td><input type="text" name="nim" id="nim" required ></td>
            </tr>
            <!-- Program Studi -->
            <tr>
                <th>Program Studi</th>
                <td><select name="prodi" id="prodi" required>
                    <option value="">Pilih Data</option>
                    <option value="A11">Teknik Informatika S1</option>
                    <option value="A12">Sistem Informasi S1</option>
                    <option value="A22">Teknik Informatika D3</option>
                </select></td>
            </tr>
            <!-- Nilai Tugas -->
            <tr>
                <th>Nilai Tugas</th>
                <td><input type="number" name="tugas" min="0" max="100" required ></td>
            </tr>
            <!-- UTS -->
            <tr>
                <th>Nilai UTS</th>
                <td><input type="number" name="uts" min="0" max="100" required ></td>
            </tr>
            <!-- UAS -->
            <tr>
                <th>Nilai UAS</th>
                <td><input type="number" name="uas" min="0" max="100" required ></td>
            </tr>
            <!-- Catatan Khusus -->
            <tr>
                <th rowspan="3" >Catatan Khusus</th>
                <td>
                    <input type="checkbox" name="kehadiran" id="kehadiran" value="Kehadiran >= 70%" >
                    <label for="kehadiran">Kehadiran >= 70%</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="interaktif" id="interaktif" value="Interaktif di kelas" >
                    <label for="interaktif">Interaktif di kelas</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="tidakTerlambat" id="tidakTerlambat" value="Tidak terlambat mengumpulkan tugas" >
                    <label for="tidakTerlambat">Tidak terlambat mengumpulkan tugas</label>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="SIMPAN"></td>
            </tr>
        </table>
    </form>
</body>
</html>