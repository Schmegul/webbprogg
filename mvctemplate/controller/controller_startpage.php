<!--
Hämtar de synliga delarna av bloggen från view_startpage.php (inlägg(), printchild(), printpost()) som
bygger upp hemsidan med inlägg. Hämtar metoderna haschild() och rekursion() från model_startpage.php
som avgör om ett inlägg/kommentar har barn. Kombinerar dessa funktioner i en loop för varje superinlägg
den hittar i databasen och skickar sedan tillbaka den kompletta html koden till index.php där funktionen
kallas på. 
-->

<?php

class controller_startpage{

  private $model;
  private $view;

  public function __construct($model,$view){

    $this->model=$model;                                                    // lagrar variabeln $model i model
    $this->view=$view;                                                      // lagrar variabeln $view i view

  }

  public function initiera(){                                               // exekverar allt som har med superinlägg, kommentarer och databasen att göra

    $data=[
      'super' => 1,
    ];
    $db = new dbcon();
    $stmt= $db->pdo->prepare('select * from inlägg where :super=super');    // väljer alla databasfiler som är superinlägg
    $stmt->execute($data);
    $super=$stmt->fetchAll();

    $this->view->inlägg();                                                  // kallar på funktionen inlägg() från view_startpage.php. Skriver ut rutan för nya superinlägg
    foreach ($super as $post){                                              // för varje superinlägg i databasen exekveras loopen
      $this->view->printpost($post['in_pk']);                               // kallar på funktionen printpost() från view_startpage.php med variabeln in_pk från databasen. Skriver ut alla superinlägg
      $this->model->rekursion($post['in_pk'], $this->view);                 // kallar på funktionen rekursion() från model_startpage.php med variabeln in_pk från databasen. Avgör om superinläggen har barn och skriver då ut dessa. Avgör sedan om dessa barn har egna barn
    }
  }
}

?>
