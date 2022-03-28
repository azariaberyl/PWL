<?php
function luas_lingkaran($jari){
    return 3.14 * $jari * $jari;
}
//  Menampilkan defined-function yang didukung oleh PHP.
$arr = get_defined_functions();
echo "<pre>";
print_r($arr);
echo "</pre>";
?>