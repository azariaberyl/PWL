<?php
include_once("model/modelPbo3.php");
class Controller3{
  public $model;
  function __construct(){
    $this->model = new Model();
  }
  function invoke(){
    $form = $this->model->getForm();
    $form->addField("txtnim", "Nim");
    $form->addField("txtnama", "Nama");
    $form->addField("txtalamat", "Alamat");
    include "view/viewPbo3.php";
  }
}
?>