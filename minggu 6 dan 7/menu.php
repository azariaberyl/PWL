<?php
if (isset($_SESSION["login"])) {
    $user = "logout";
} else {
    $user = "login";
}
?>
<div class="menu">
    <ul>
        <li><a href="index.php?p=home">Home</a></li>
        <li><a href="index.php?p=sekolah">Sekolah</a></li>
        <li><a href="index.php?p=login"><?php echo "$user"?></a></li>
    </ul>
</div>