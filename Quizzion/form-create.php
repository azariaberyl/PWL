<?php
include 'conf.php';
// $
if (isLogin()){
// function 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Quizion</title>
  </head>
  <body style="background-color: #f7f9fa">
    <nav style="background-color: white">
      <ul>
        <li class="button1"><a href="index.php">Home/Logo</a></li>
        <li class="button1"><a href="dashboard.php">Dashboard</a></li>
      </ul>
      <ul>
        <li class="button1"><a href="logout.php">Logout</a></li>
      </ul>
    </nav>

    <div class="container" style="width: 85%">
      <!-- Form -->
      <div class="question-container">
        <form action="" method="post">
          <!-- Judul -->
          <h1 class="judul">Judul</h1>
          <input
            type="text"
            name="title"
            class="title"
            placeholder="Ketikan judul"
          />
          <!-- Question -->
          <div class="question" style="display: block">
            <div class="end-container">
              <a href="" class="button2">Delete</a>
            </div>
            <!-- Type Soal -->
            <!-- <input type="hidden" name="type" id="type" value="radio" /> -->
            <!-- Soal -->
            <input class="title" type="text" name="pertanyaan" value = "Contoh pertanyaan, berikut ini yang bukan merupakan bahasa
              pemrograman adalah" placeholder="Masukan pertanyaan">
            <!-- Jawaban -->
            <div class="pilihan">
              <label for="1">A</label>
              <input type="text" name="Pilihan 1" id="1" value="1" />
            </div>
            <div class="pilihan">
              <label for="2">B</label>
              <input type="text" name="Pilihan 2" id="2" value="2" />
            </div>
            <div class="pilihan">
              <label for="3">C</label>
              <input type="text" name="Lorem" id="3" value="3" />
            </div>
            <div class="pilihan">
              <label for="4">D</label>
              <input type="text" name="Lorem" id="4" value="4" />
            </div>
          </div>
          <div class="end-container">
            <p>Pilih salah satu tipe pertanyaan</p>
            <a href="" class="button2">Opsional</a>
            <a href="" class="button2">Isian</a>
          </div>
          <div class="end-container" style="background-color: rgba(0, 0, 0, 0)">
            <input
              type="submit"
              class="button2"
              name="simpan"
              style="font-size: 1em; border: none; font-weight: 600"
              value="Simpan"
            />
          </div>
        </form>
      </div>
      <!-- Button Create -->
    </div>
  </body>
</html>
<?php
} else {
  echo "Anda belum login";
}
?>