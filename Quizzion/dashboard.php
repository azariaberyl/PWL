<?php
include "conf.php";
$login = $_SESSION["login"];
if (isset($_SESSION["login"])){
  $userTable = "{$_SESSION['login']['username']}{$_SESSION['login']['id']}";
  if (!tableExists($conn, $userTable)){
    // print_r($userTable);
    createTable($conn, $userTable);
  }
?>

<!DOCTYPE html>
<html lang="id">
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
      <!-- Profile overview -->
      <div id="profile-overview">
        <p><?php echo "{$login['username']}" ?></p>
        <p>Room</p>
      </div>
      <!-- Create room button -->
      <div class="end-container">
        <a href="form-create.html" class="button2">Buat</a>
      </div>
      <!-- Table overview -->
      <div id="table-overview">
        <div>
          <a href="" class="button2"> Edit</a>
          <a href="" class="button2"> Hapus</a>
        </div>
        <div id="bottom">
          <h3>Table Name</h3>
          <h4>Participant</h4>
        </div>
      </div>
    </div>
  </body>
</html>
<?php
}
else {
  echo "Login gagal";
}
?>