<?php

class controller_startpage{

  private $model;
  private $view;

  public function __construct($model,$view){


    $this->model=$model;
    $this->view=$view;
  }



public function showVolvo(){

  $arrvolvo=$this->model->getVolvo();
  $this->view->render($arrvolvo);

}
public function showSaab(){


}

}
?>
