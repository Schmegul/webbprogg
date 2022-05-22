<!--
Skapar de olika objekten i de olika klasserna och ger de två controllerfilerna tillgång till
De objekt som de behöver.Tar ut och delar upp URL:en i en array. Beroende på vad den
fjärde ([3]) positionen i array:en är kallas olika funktioner på.
-->

<?php

require "controller/hittaRecept.php";
require "controller/skapaRecept.php";
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

$mgor=new model_getOneRecipe();
$mgrp=new model_getRecipePages();

$chr=new controller_hittaRecept($vss,$vstr,$vsp,$mgor,$mgrp);
$csr=new controller_skapaRecept($vsc,$vsp);

$url="http://localhost". $_SERVER['REQUEST_URI'];  // frågar vilken sorts URI det är
$arrurl=parse_url($url);                           // tolkar URL:en
$url_parts=explode('/', $arrurl['path']);          // delar upp URL:en i olika delar och stoppar in dem i en array

if($url_parts[3]==""){  // standardsidan
  $chr->default();  // specifik funktion i hittaRecept.php
}

if($url_parts[3]=="create"){  // receptskaparsidan
  $csr->createRecipe();  // specifik funktion i skapaRecept.php
}

if($url_parts[3]=="recipes"){ // visar valda receptet
  $chr->showChosenRecipe();  // specifik funktion i hittaRecept.php
}

if($url_parts[3]=="getrecipes"){  // hämtar recept från databasen
  $chr->fetchResults();  // specifik funktion i hittaRecept.php
}
?>
