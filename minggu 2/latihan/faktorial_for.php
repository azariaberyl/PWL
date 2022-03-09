<html><body>
    <form method="GET" action="faktorial_for.php">
        <input type="number" name="number">
        <input type="submit" name="submit"> 
    </form>
    <?php
    if (isset($_GET["submit"])){
        $number = $_GET["number"];
        echo "Faktorial dari $number ";
        $result = $number;

        for ($number; $number>1;$number--){
            $result*=($number-1);
        }
        echo "adalah $result";
    }
    ?>
</body></html>