<?php
include "../model/conf.php";
if (isLogin()){



?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style.css" />
    <title>Quizion</title>
  </head>
  <body style="background-color: #f7f9fa">
    <nav style="background-color: white">
      <ul>
        <li class="button1"><a href="../index.php">Home</a></li>
        <li class="button1"><a href="dashboard.php">Dashboard</a></li>
      </ul>
      <ul>
        <li class="button1"><a href="../controller/logout.php">Logout</a></li>
      </ul>
    </nav>

    <div class="container" style="width: 85%">
      <div class="participant">
        <a href="participant-view.php?">Jane</a>
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