<?php
session_start();

require "top.php";
require "nav.php";
require "bottom.php";
require "start_.php";
require "omoss_.php";
require "support_.php";
require('dbconnect.php');

$url="http://localhost". $_SERVER['REQUEST_URI'];

//echo $url;

$arrurl=parse_url($url);
//echo "<br><br>";
//var_dump($arrurl);

$url_parts=explode('/', $arrurl['path']);
//echo "<br><br>";
//var_dump($url_parts);



if($url_parts[2]==null || $url_parts[2]=="start"){
  top();
  nav();
  start();
  bottom();
}
if($url_parts[2]=="omoss"){
  top();
  nav();
  omoss();
  bottom();
}

  if($url_parts[2]=="support"){
    top();
    nav();
    support();
    bottom();
  }

?>
