<!--
Innehåller funktionerna som printar ut hela sidan. Om nödvändigt så etablerar funktionerna anslutningar
till databasen. Därefter väljer en sql-fråga ut vilka delar ur databasen som ska printas ut. Detta beror
på huruvida det som ska printas ut är ett superinlägg eller en kommentar till ett superinlägg/kommentar.
Alla kommentarer till en viss förälder läggs sedan i en gemensam div för att automatiskt indenteras
åt höger. Alla kommentarer, superinlägg samt även rutan som skapar nya superinlägg har en knapp som öppnar
två input-fält, en för rubrik och en för brödtext. En submit-knapp skickar sedan vidare informationen
till inlägg.php om det är ett nytt superinlägg respektive kommentera.php om det är en ny kommentar som
skrivits. Därifrån läggs det in i databasen och när index uppdateras hos klienten nästa gång så skrivs
det nya inlägget/kommentaren ut med printpost() respektive printchild().
-->

<?php

class view_startpage{

  function __construct(){}

  public function inlägg(){                        // html kod för rutan där användaren skapar ett nytt superinlägg

echo <<<INLÄGG

    <div style="height:200px;width:300px;background-color:green;">
    <h1>Skapa inlägg</h1><br>
    <form method="post" action="inlägg.php" class="form" style="height:80px;width:200px;background-color:purple;">
    <input type="text" name="Rubriker">
    <input type="text" name="brödtexter">
    <input type="hidden" name="fker"  value="1">
    <input type="submit">
    </form>
    </div>

INLÄGG;
}

  public function printchild($pk){                 // funktionen som printar ut kommentarer till superinlägg eller andra inlägg

    require_once('dbconnect.php');
    $db=new dbcon();

    $data=[
      'pk' => $pk,
    ];
    $stmt= $db->pdo->prepare('select * from inlägg where :pk=in_pk'); // väljer alla databasfiler vars pk matchar värdet funktionen får ifrån model_startpage.php
    $stmt->execute($data);
    $kommentar=$stmt->fetchAll();

    foreach ($kommentar as $kommentar) {           // för varje kommentar i databasen som stämmer med sql-frågan printas en kommentar ut

echo <<<KOMMENTERA

      <div style="width:300px;background-color:green;">
      <h3 class="card-title">{$kommentar['Rubrik']}</h3>
      <p class="card-text">{$kommentar['Innehall']}</p>
      <div class="knapp" style="height:20px;width:86px;background-color:blue;cursor:pointer;">Kommentera</div>
      <form method="post" action="kommentera.php" class="form" style="height:80px;width:200px;background-color:purple;display:none;">
      <input type="text" name="Rubrik">
      <input type="text" name="brödtext">
      <input type="hidden" name="fk" value="{$kommentar['in_pk']}">
      <input type="submit">
      </form>
      </div>

KOMMENTERA;
    }
  }

  public function printpost($super_pk){            // funktionen som printar ut superinläggen

    require_once('dbconnect.php');
    $db=new dbcon();

    $data=[
      'super' => 1,
      'super_pk' => $super_pk,
    ];
    $stmt= $db->pdo->prepare('select * from inlägg where :super=super and in_pk=:super_pk'); // väljer alla databasfiler som är superinlägg samt vars pk matchar värdet funktionen får från model_startpage.php
    $stmt->execute($data);
    $super=$stmt->fetchAll();

    foreach ($super as $super) {                   // för varje superinlägg i databasen som stämmer med sql-frågan printas ett super inlägg ut

echo <<<SUPER

      <div style="width:300px;background-color:green;">
      <h3 class="card-title">{$super['Rubrik']}</h3>
      <p class="card-text">{$super['Innehall']}</p>
      <div class="knapp" style="height:20px;width:86px;background-color:blue;cursor:pointer;">Kommentera</div>
      <form method="post" action="kommentera.php" class="form" style="height:80px;width:200px;background-color:purple;display:none;">
      <input type="text" name="Rubrik">
      <input type="text" name="brödtext">
      <input type="hidden" name="fk" value="{$super['in_pk']}">
      <input type="submit">
      </form>
      </div>

SUPER;
    }
  }
}

?>
