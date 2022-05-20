<?php
class Form
{
  var $field = array();
  var $action;
  var $submit = "Submit Form";
  var $jumField=0;
  function __construct($action, $submit){
    $this->action = $action;
    $this->submit = $submit;
  }

  function displayForm(){
    echo "<form action='".$this->action."' method='POST'>";
    echo "<table width='100%'>";
    for ($j=0; $j<count($this->field); $j++) {
      echo "<tr><td align='right'>".$this->field[$j]['label']."</td>";
      echo "<td><input type='text' name='".$this->field[$j]['name']."'></td></tr>";
    }
    echo "<tr><td colspan='2'>";
    echo "<input type='submit' value='".$this->submit."'></td></tr>";
    echo "</table>";
  }

  function addField($name, $label) {
    $this->field[$this->jumField]['name'] = $name;
    $this->field[$this->jumField]['label'] = $label;
    $this->jumField++;
  }
}

?>