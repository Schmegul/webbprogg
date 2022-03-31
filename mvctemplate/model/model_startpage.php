<!--
Har hand om att upptäcka huruvida ett inlägg/kommentar har ett/flera barn. Om inlägget/kommentaren har
barn så printas, med hjälp av rekursion, det första barnet som sedan även det kontolleras om det har
barn. Om detta barn har egna barn så printas det första egna barnet ut. Detta fortsätter tills rekursionen
kommer till en kommentar utan barn. Den går då tillbaka till den sista kommentarens förälder och
kontorllerar om denna har ännu ett barn utöver den redan utskrivna, barnlösa, kommentaren. Rekursionen
fortsätter på detta vis ända tills den är tillbaka till superinlägget och superinlägget inte har några
fler barn som kan skrivas ut. Först då stängs superinlägget och kontrollen av nästa superinlägg kan börja.
-->

<?php

class model_startpage{

  function __construct(){}

    public function haschild($id_pk){   // funktionen som avgör om ett inlägg har ett barn
      require_once('dbconnect.php');
      $db=new dbcon();
      $antalbarn;
      $data = [
        'pk' => $id_pk,
      ];
      $stmt= $db->pdo->prepare('select * from inlägg where super=0 and :pk=in_fk');   // väljer alla databasfiler som inte är super inlägg och vars foreignkey stämmer med värdet som den får från rekursion()
      $stmt->execute($data);
      $antalbarn=$stmt->fetchAll();
      return $antalbarn;
    }

    public function rekursion($id_pk, $view){   // printar ut förälderns kommentar och dess barn. När den är klar med en kommentar och dess barn kallar den på sig själv och ser om föräldern har ännu en kommentar, och om denna kommentar har kommentarer
      $barna=$this->haschild($id_pk);
      if(!empty($barna)){                       // om $barna inte är tom betyder det att kommentaren har barn och då exekveras loopen
        echo '<div class="kommentar" style="margin-left:30px;border-left:3px solid blue;">';
        foreach ($barna as $barn) {
          $view->printchild($barn['in_pk']);      // kallar på printchild() i view_startpage.php för att printa ut barnet till kommentaren
          $this->rekursion($barn['in_pk'], $view);// kallar sedan på sig själv igen för att se om den nya kommentaren har barn. Om kommentaren inte har barn så går den tillbaka och ser om föräldern har fler barn utöver den nya kommentaren
        }
        echo '</div>';                          // stänger kommentträdet oavsett om det finns barn till föräldern eller inte
    }
  }
}

?>
