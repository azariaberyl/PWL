<?php
class Form {
  public $fields = array();
  public $action;
  public $submit = "Submit Form";
  public $jumField = 0;
  function __construct ($action, $submit) {
    $this->action  = $action;
    $this->submit   = $submit;
  }
  function addField($name, $label){
    $this->fields[$this->jumField]["name"] = $name;
    $this->fields[$this->jumField]["label"] = $label;
    $this->jumField++;
  }
}
class Model {
  public function getForm(){
    return new Form("", "");
  }
}
?>