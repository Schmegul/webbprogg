<?php

class model_startpage{

  function __construct(){

  }
  public function haschild($id_pk){
  require_once('dbconnect.php');
  $db=new dbcon();
  $antalbarn;
  $data = [
    'pk' => $id_pk,
  ];
  $stmt= $db->pdo->prepare('select * from inlägg where super=0 and :pk=in_fk');
  $stmt->execute($data);
  $antalbarn=$stmt->fetchAll();
  return $antalbarn;
  }

  public function rekursion($id_pk, $view){
    $barna=$this->haschild($id_pk);
    if(!empty($barna)){
        echo '<div id="kommentar" style="margin-left:30px;border:3px solid blue;">';
      foreach ($barna as $barn) {
        $view->printchild($barn['in_pk']);
        $this->rekursion($barn['in_pk'], $view);
      }
      echo '</div>';
    }
  }







}

?>
