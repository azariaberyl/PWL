<html>
  <head></head>
  <body>
    <a href="index.php">Home</a>
    <a href="index.php?c=1">PBO1</a>
    <a href="index.php?c=2">PBO2</a>
    <a href="index.php?c=3">PBO3</a>
    <br>
    <?php
    if (isset($_GET["c"])) {
      if ($_GET["c"]=="1"){
        include_once "controller/controllerPbo1.php";
        $controller = new Controller();
        $controller->invoke();
      }
      elseif ($_GET["c"]=="2") {
        include_once "controller/controllerPbo2.php";
        $controller = new Controller2();
        $controller->invoke();
      }
      elseif ($_GET["c"]=="3") {
        include_once "controller/controllerPbo3.php";
        $controller = new Controller3();
        $controller->invoke();
      }
    }
    ?>
  </body>
</html>