<!--
Funktion vars syfte är att printa ut receptet som användaren valt/skapat.
-->

<?php

class view_showTrueRecipe{

  function __construct(){}

    public function viewChosenRecipe($pknummer){    // variabeln är primary key:n till receptet som den får från getOneRecipe.php

echo <<<RECEPT

      <!-- Simpel kod för att skriva ut det valda receptets viktiga delar -->
      <h1>{$pknummer[0]['rubrik']}</h1>
      <a href="http://localhost/webbprogg/recipeFND/">Gå tillbaka</a>
      <h2>{$pknummer[0]['beskrivning']}</h2><br>
      <div style="border:3px solid black;">{$pknummer[0]['mängdingrid']}</div><br><br>
      {$pknummer[0]['utförande']}<br><br><br><br><br>

RECEPT;
    }
  }
  ?>
