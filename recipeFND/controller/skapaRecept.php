<?php

class controller_skapaRecept{

  private $vsc;
  private $vstr;
  private $mfs;
  private $mgor;

  public function __construct($vsc,$vstr,$mfs,$mgor){

    $this->view_showCreator=$vsc;
    $this->view_showTrueRecipe=$vstr;
    $this->model_filterSendoff=$mfs;
    $this->model_getOneRecipe=$mgor;

  }

  public function namner(){

    $this->view_showCreator->tester();
    $this->view_showTrueRecipe->tester();
    $this->model_filterSendoff->tester();
    $this->model_getOneRecipe->tester();

  }
}
?>
