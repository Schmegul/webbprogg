<?php

class controller_startpage{

private $model;
private $view;

public function __construct($model,$view){

  $this->model=$model;
  $this->view=$view;

}

public function showVolvo(){

     $arrVolvo=$this->model->getVolvoSpec();

      $this->view->render($arrVolvo);


}

public function showSaab(){

   $arrVolvo=$model->getVolvoSpec();
}

}

 ?>
