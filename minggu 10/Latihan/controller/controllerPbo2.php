<?php
include_once("model/modelPbo2.php");
class Controller2{
  public $model;
  function __construct(){
    $this->model = new Model();
  }
  function invoke(){
    $form = $this->model->getForm();
    include "view/viewPbo2.php";
  }
}
?>