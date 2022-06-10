<?php
include "conf.php";
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
        <li class="button1"><a href="">Home/Logo</a></li>
        <?php if (isLogin()){
          echo '<li class="button1"><a href="dashboard.php">Dashboard</a></li>';
        }?>
      </ul>
      <ul>
        <?php if (isLogin()){ ?>
          <li class="button1"><a href="logout.php">Logout</a></li>
        <?php
        } else {
          ?>
          <li class="button1"><a href="login.html">Login</a></li>
          <li class="button1"><a href="register.html">Register</a></li>
        <?php }?>
      </ul>
    </nav>

    <header>
      <div class="container">
        <div class="header-content">
          <div id="header-left">
            <h1 id="search-label">
              Masukan kode <br />
              untuk memulai
            </h1>
            <form action="" method="get">
              <input
                type="search"
                name="room"
                id="room"
                placeholder="Masukan kode"
              />
            </form>
          </div>
          <div id="header-right">
            <h2 style="font-weight: 600">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis
              amet iste vero laborum aliquid quae numquam rerum eum nostrum
              veniam magni, facilis rem molestiae tenetur odio! Minus doloribus
              quasi ipsum.
            </h2>
          </div>
        </div>
      </div>
    </header>

    <section>
      <div></div>
      <div></div>
    </section>
  </body>
</html>
