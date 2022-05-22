<!--
Beroende på vad användaren vill göra kommer index.php att kalla på olika funktioner
i controllern. Om användaren vill skapa ett nytt recept kommer funktionen "createRecipe"
att kallas på. View-filen view_showCreator kommer därefter bygga upp receptskaparen.
-->

<?php

class controller_skapaRecept{
  private $vsc;
  private $vsp;

  public function __construct($vsc,$vsp){
    $this->view_showCreator=$vsc;
    $this->view_startpage=$vsp;
  }

  public function createRecipe(){
    $this->view_startpage->top();
    $this->view_showCreator->buildCreator();
    $this->view_startpage->bottom();
  }
}
?>
