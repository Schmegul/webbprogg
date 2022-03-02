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
echo "<br><br>";
var_dump($arrurl);

$url_parts=explode('/', $arrurl['path']);
var_dump($url_parts);


// $data = [
//   'user' => $_SESSION['user'],
// ];
// if(){
//   $artikel_id  =filter_input(INPUT_GET, 'artikel_id',FILTER_SANITIZE_SPECIAL_CHARS);
//   $antal  =filter_input(INPUT_GET, 'antal',FILTER_SANITIZE_NUMBER_INT);
//
// $data = [
//     'Rubrik' => $artikel_id,
//     'Text' => $antal,
// ];
// $sql = "INSERT INTO inlägg (Rubrik,Text) VALUES (:Rubrik, :Text)";
// $stmt= $db->pdo->prepare($sql);
// $stmt->execute($data);
// }

if($url_parts[3]=="index"){

 $tb=new topbottom();
  $model = new Model_startpage();
  $view  = new view_startpage();
  $controller = new controller_startpage($model,$view);


$tb->top();

  if($_GET["märke"]=="volvo"){
//    $controller->showVolvo();
$stmt= $db->pdo->prepare('select * from inlägg');
$stmt->execute();
$user=$stmt->fetchAll();
var_dump($user);
foreach ($user as $artikel) {
  $css = $artikel['in_pk']*10;
  /*<img class="card-img-top" src="bilder/{$artikel['bild']}" alt="Card image cap">*/
  //href="deletecartartiklar.php?cartartikel_pk={$artikel['cartartikel_pk']}"
echo <<<ARTIKEL


  <div style="height:120px;width:300px;background-color:green;margin-left:$css;">

  <h5 class="card-title">{$artikel['Rubrik']}</h5>
  <p class="card-text">{$artikel['Text']}</p>
  <div class="suga" style="height:20px;width:30px;background-color:blue;cursor:pointer;"></div>
  pk: {$artikel['in_pk']}
  fk: {$artikel['in_fk']}

 <!-- slutet på div-tagen ska vara utanför loopen och barnkommentarerna ska påbörjas innan loopen slutar -->


ARTIKEL;
}
echo "</div>";
$tb->bottom();




  }if($_GET["märke"]=="saab"){
    $controller->showSaab();
  }



}






?>
