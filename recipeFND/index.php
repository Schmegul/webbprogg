<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors',1);
error_reporting( E_ALL);
header('Content-Type:text/html; charset=UTF-8');
mb_internal_encoding('UTF-8');
mb_http_output( 'UTF-8');

require "controller/hittaRecept.php";
require "controller/skapaRecept.php";
require "model/filterSendoff.php";
require "model/getOneRecipe.php";
require "model/getRecipePages.php";
require "view/showCreator.php";
require "view/showSnippets.php";
require "view/showTrueRecipe.php";
require "view/startpage.php";
require_once("dbconnect.php");

$vsc=new view_showCreator();
$vss=new view_showSnippets();
$vstr=new view_showTrueRecipe();
$vsp=new view_startpage();

$mfs=new model_filterSendoff();
$mgor=new model_getOneRecipe();
$mgrp=new model_getRecipePages();

$chr=new controller_hittaRecept($vss,$vstr,$vsp,$mgor,$mgrp);
$csr=new controller_skapaRecept($vsc,$vstr,$mfs,$mgor);

//$csr->namner();


$url="http://localhost". $_SERVER['REQUEST_URI'];  // frågar vilken sorts URI det är
$arrurl=parse_url($url);                           // tolkar URL:en
$url_parts=explode('/', $arrurl['path']);          // delar upp URL:en i olika delar och stoppar in dem i en array
//print_r($url_parts);

//$chr->namn();  // ny specifik funktion i controller
if($url_parts[3]==""){
$chr->namn();  // ny specifik funktion i controller

}



if($url_parts[3]=="getr"){
$chr->mode();  // ny specifik funktion i controller
}
?>
