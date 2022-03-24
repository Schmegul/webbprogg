<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors',1);
error_reporting( E_ALL);
header('Content-Type:text/html; charset=UTF-8');
mb_internal_encoding('UTF-8');
mb_http_output( 'UTF-8');

require "controller/controller_startpage.php";
require "model/model_startpage.php";
require "view/page/startbottom.php";
require "view/view_startpage.php";
require_once('dbconnect.php');

$db=new dbcon();


$url="http://localhost". $_SERVER['REQUEST_URI'];
$arrurl=parse_url($url);
//echo "<br><br>";
var_dump($arrurl);

$url_parts=explode('/', $arrurl['path']);
var_dump($url_parts);


if($url_parts[3]=="index"){

 $tb=new topbottom();
  $model = new Model_startpage();
  $view  = new view_startpage();
  $controller = new controller_startpage($model,$view);


$tb->top();

  if($_GET["märke"]=="volvo"){
//    $controller->showVolvo();

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
// var_dump($user);


function printchild($pk){
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

 <!-- slutet på div-tagen ska vara utanför loopen och barnkommentarerna ska påbörjas innan loopen slutar -->
</div>

ARTIKEL;
  }
}

function haschild($id_pk){

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

function rekursion($id_pk){

  $barna=haschild($id_pk);

  if(!empty($barna)){

      echo '<div id="hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh" style="margin-left:30px;border:3px solid blue;">';

    foreach ($barna as $barn) {
      printchild($barn['in_pk']);

      rekursion($barn['in_pk']);
    }
    echo '</div>';
  }
}

function printpost($super_pk){

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

    <!-- slutet på div-tagen ska vara utanför loopen och barnkommentarerna ska påbörjas innan loopen slutar -->
    </div>

SUPER;
    }
}

//sqp fråga hämtar alla super
//loop

$data=[
   'super' => 1,
];
$stmt= $db->pdo->prepare('select * from inlägg where :super=super');
$stmt->execute($data);
$super=$stmt->fetchAll();

foreach ($super as $post){
printpost($post['in_pk']);
rekursion($post['in_pk']);
}


$tb->bottom();




}if($_GET["märke"]=="saab"){
    $controller->showSaab();
  }
}

?>
