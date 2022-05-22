<!--
Funktion vars syfte är att skriva ut alla snippets till recepten den får från getRecipePages.
-->

<?php

class view_showSnippets{

  function __construct(){}

    public function printsnippets($dbarray){

      $htmlanswer='<div style="display:flex-wrap;">';   // en enkel wrapper för alla recept

      foreach ($dbarray as $value) {    // för varje matchning mellan användarens input och databasens recept skrivs receptet ut direkt med ajax för användaren att se

        $htmlanswer=$htmlanswer.'<div style="margin:20px;background-color:pink;border:3px solid black;"><h2>'.$value['rubrik'].'</h2><p>'.$value['beskrivning'].'</p><a href="/webbprogg/recipeFND/recipes?recp='.$value['in_pk'].'">Receptet för '.$value['rubrik'].'</a><br><br> </div>';

      }
      $htmlanswer=$htmlanswer.'</div>';   // stänger wrappern
      echo $htmlanswer;
    }
  }
  ?>
