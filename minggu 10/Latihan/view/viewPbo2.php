<?php
include_once("controller/controllerPbo2.php");
?>
<form action=<?php echo "'".$form->action."'" ?> method="POST">
  <table width="100%">
  <?php
  for ($j=0; $j<count($form->fields); $j++) {
  echo "<tr><td align='right'>".$form->fields[$j]['label']."</td>";
  echo "<td><input type='text' name='".$form->fields[$j]['name']."'></td></tr>";
}
  echo "<tr><td colspan='2'>";
  echo "<input type='submit' value='".$form->submit."'></td></tr>";
  ?>
  </table>
</form>