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

$url="http://localhost". $_SERVER['REQUEST_URI'];
$arrurl=parse_url($url);
$url_parts=explode('/', $arrurl['path']);


if($url_parts[3]=="index"){

 $tb=new topbottom();
  $model = new Model_startpage();
  $view  = new view_startpage();
  $controller = new controller_startpage($model,$view);


$tb->top();
  if($_GET["märke"]=="volvo"){
    $controller->showVolvo();
    $tb->bottom();
  }
}

?>
