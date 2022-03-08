<!DOCTYPE html>
<html lang="en">
<body>
    <?php 
    $a = 5;
    $b = 4;
    echo "$a == $b : ". ($a == $b);
    echo "<br>$a != $b : ". ($a != $b);
    echo "<br>$a > $b : ". ($a > $b);
    echo "<br>$a < $b : ". ($a < $b);
    echo "<br>($a == $b) && ($a > $b) : ".(($a != $b) && ($a > $b));
    echo "<br>($a == $b) || ($a > $b) : ".(($a != $b) || ($a > $b));
    ?>
</body>
</html>