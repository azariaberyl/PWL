<html><body>
<form method="GET" action="faktorial_while.php">
        <input type="number" name="number">
        <input type="submit" name="submit"> 
    </form>
    <?php
    if (isset($_GET["submit"])){
        $num = $_GET["number"];
        echo "Hasil faktorial dari $num adalah ";
        $result = $num;
        do {
            $result*=($num-1);
            $num--;
        } while ($num > 1);
        echo "$result";
    }
    ?>
</body></html>