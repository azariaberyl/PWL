<?php
include_once("model/modelPbo1.php");
class Controller{
  public $model;
  function __construct(){
    $this->model = new Model();
  }
  function invoke(){
    $a = $this->model->getMobil();
    $b = $this->model->getMobil();
    include "view/viewPbo1.php";
  }
}
?>