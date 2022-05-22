<!--
Beroende på vad användaren vill göra kommer index.php att kalla på olika funktioner
i controllern. På startsidan används funktionen "default" för att bygga upp sökrutan
och bockarna för ingridienser. Om användaren söker på ett recept används "fetchResults"
för att hämta rätt recept från databasen och sedan printa ut deras snippets för
användaren att se. "showChosenRecipe" används för att visa receptet som användaren
har valt eller precis skapat.
-->

<?php

class controller_hittaRecept{
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

  public function default(){
    $this->view_startpage->top();
    $this->view_startpage->header();
    $this->view_startpage->bottom();
  }

  public function fetchResults(){
    $this->view_startpage->top();
    $this->model_getRecipePages->searchbarfunction($this->view_startpage,$this->view_showSnippets);
    $this->view_startpage->bottom();
  }

  public function showChosenRecipe(){
    $this->view_startpage->top();
    $arrmedrecept=$this->model_getOneRecipe->findChosenRecipe();
    $this->view_showTrueRecipe->viewChosenRecipe($arrmedrecept);
    $this->view_startpage->bottom();
  }
}
?>
