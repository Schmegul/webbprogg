<?php

class controller_hittaRecept{
  //$vss,$vstr,$vsp,$mgor,$mgrp
  private $vss;
  private $vstr;
  private $vsp;
  private $mgor;
  private $mgrp;

  public function __construct($vss,$vstr,$vsp,$mgor,$mgrp){
    $this->view_showSnippets=$vss;
    $this->view_showTrueRecipe=$vstr;
    $this->view_startpage=$vsp;
    $this->model_getOneRecipe=$mgor;
    $this->model_getRecipePages=$mgrp;
  }

  public function namn(){

    $this->view_startpage->top();
    $this->view_showSnippets->tester();
    $this->view_showTrueRecipe->tester();
    $this->model_getOneRecipe->tester();
    $this->view_startpage->bottom();

  }
  public function mode(){

    $this->model_getRecipePages->searchbarfunction($this->view_startpage);

  }
}
?>
