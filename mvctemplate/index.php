<!--
Tar ut och delar upp URL:en i en array. Om den fjärde ([3]) positionen i array:en är "index"
skapas varsitt objekt från startbottom.php, model_startpage.php, view_startpage.php och
controller_startpage.php. controller_startpage.php objektet tar med sig objekten från model-
och view_startpage.php. Med objekten startas html koden i index.php, controller_startpage.php
sätter ihop bloggdelen och sedan stängs html koden igen.
-->

<?php

require "controller/controller_startpage.php";    // tillgång till de andra filerna
require "model/model_startpage.php";
require "view/page/startbottom.php";
require "view/view_startpage.php";
require_once('dbconnect.php');

$url="http://localhost". $_SERVER['REQUEST_URI'];  // frågar vilken sorts URI det är
$arrurl=parse_url($url);                           // tolkar URL:en
$url_parts=explode('/', $arrurl['path']);          // delar upp URL:en i olika delar och stoppar in dem i en array


if($url_parts[3]=="index"){

  $tb=new topbottom();                             // skapar ett nytt objekt från klassen topbottom() i startbottom.php
  $model = new model_startpage();                  // skapar ett nytt objekt från klassen model_startpage() i model_startpage.php
  $view  = new view_startpage();                   // skapar ett nytt objekt från klassen view_startpage() i view_startpage.php
  $controller = new controller_startpage($model,$view);  // skapar ett nytt objekt från klassen controller_startpage() i controller_startpage.php och tar med sig $model och $view


  $tb->top();                                      // öppnar html delen av dokumentet med funktionen top() från startbottom.php
  $controller->initiera();                         // går in i controller-filen och kallar på initiera() funktionen
  $tb->bottom();                                   // stänger html delen av dokumentet med funktionen bottom() från startbottom.php
}

?>
