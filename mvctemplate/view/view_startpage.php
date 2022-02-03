<?php

class view_startpage{

  private $topbottom;

  function __construct(){
    $this->topbottom=new topbottom();

  }

  public function render($KanVaraVadSomHelstMenHeterNuarrvolvo){

    $this->topbottom->top();

    foreach ($KanVaraVadSomHelstMenHeterNuarrvolvo as $key => $value) {
      echo "<h1>" .$key.":".$value."</h1>";
    }



    $this->topbottom->bottom();

  }




}

?>
