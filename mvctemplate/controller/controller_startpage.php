<?php

class controller_startpage{

private $model;
private $view;

public function __construct($model,$view){

  $this->model=$model;
  $this->view=$view;

}

public function showVolvo(){

  $data=[
     'super' => 1,
  ];
  $db = new dbcon();
  $stmt= $db->pdo->prepare('select * from inlägg where :super=super');
  $stmt->execute($data);
  $super=$stmt->fetchAll();

  foreach ($super as $post){
  $this->view->printpost($post['in_pk']);
  $this->model->rekursion($post['in_pk'], $this->view);
    }
  }
}

 ?>
