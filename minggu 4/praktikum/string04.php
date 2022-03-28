<?php
$str = "Is your name O'Reilly ?";
$str2 = addslashes ($str);
$str3 = stripslashes ($str2);
echo "<b>String asli</b> : $str";
echo "<br><b>addslashes()</b> : $str2"; // Menambah backslashes
echo "<br><b>stripslashes()</b> : $str3" // Menghapus backslashes before '
?>