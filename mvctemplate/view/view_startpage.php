<?php

class view_startpage{

  private $topbottom;

  function __construct(){
    $this->topbottom=new topbottom();
    //ÖPPNA BODY
echo <<<INLÄGG
      <div style="height:200px;width:300px;background-color:green;margin-left:30px;">
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
  public function printchild($pk){
    require_once('dbconnect.php');
    $db=new dbcon();

    $data=[
      'pk' => $pk,
    ];
    $stmt= $db->pdo->prepare('select * from inlägg where :pk=in_pk');
    $stmt->execute($data);
    $user=$stmt->fetchAll();


  foreach ($user as $artikel) {

echo <<<ARTIKEL


    <div style="height:200px;width:300px;background-color:green;">

    <h5 class="card-title">{$artikel['Rubrik']}</h5>
    <p class="card-text">{$artikel['Text']}</p>
    <div class="suga" style="height:20px;width:30px;background-color:blue;cursor:pointer;"></div>
    <form method="post" action="kommentera.php" class="form" style="height:80px;width:200px;background-color:purple;display:none;">
    <input type="text" name="Rubrik">
    <input type="text" name="brödtext">
    <input type="hidden" name="fk" value="{$artikel['in_pk']}">
    <input type="submit">
    </form>
    pk: {$artikel['in_pk']}
    fk: {$artikel['in_fk']}
  </div>

ARTIKEL;
    }
  }

  public function printpost($super_pk){

    require_once('dbconnect.php');
    $db=new dbcon();

    $data=[
       'super' => 1,
       'super_pk' => $super_pk,
    ];
    $stmt= $db->pdo->prepare('select * from inlägg where :super=super and in_pk=:super_pk');
    $stmt->execute($data);
    $super=$stmt->fetchAll();

      foreach ($super as $super) {

echo <<<SUPER

      <div style="height:200px;width:300px;background-color:green;">

      <h5 class="card-title">{$super['Rubrik']}</h5>
      <p class="card-text">{$super['Text']}</p>
      <div class="suga" style="height:20px;width:30px;background-color:blue;cursor:pointer;"></div>
      <form method="post" action="kommentera.php" class="form" style="height:80px;width:200px;background-color:purple;display:none;">
      <input type="text" name="Rubrik">
      <input type="text" name="brödtext">
      <input type="hidden" name="fk" value="{$super['in_pk']}">
      <input type="submit">
      </form>
      pk: {$super['in_pk']}
      fk: {$super['in_fk']}
      super: 1;
      </div>

SUPER;
      }
  }
function bodyclose(){
  //FIXA SEN
}
}

?>
