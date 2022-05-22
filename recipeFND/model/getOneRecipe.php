<!--
Liten funktion som hämtar det valda receptets primary key ifrån url:n och sedan använder
den för att hämta rätt recept från databasen. Receptet lagras i $pknummer och skickas
sedan tillbaka till koden som kallade på funktionen.
-->

<?php

class model_getOneRecipe{

  function __construct(){}

    public function findChosenRecipe(){
      $db=new dbcon();
      $data=[
        'pk'=> $_REQUEST['recp']
      ];
      $sql="SELECT * FROM individrecept WHERE in_pk LIKE :pk";
      $stmt=$db->pdo->prepare($sql);
      $stmt->execute($data);
      $pknummer=$stmt->fetchAll();
      return $pknummer;
    }
  }
  ?>
