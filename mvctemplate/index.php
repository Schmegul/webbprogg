<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type:text/html; charset=UTF-8');
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

$arrurl=parse_url($url);
//echo "<br><br>";
//var_dump($arrurl);

$url_parts=explode('/', $arrurl['path']);
//echo "<br><br>";
//var_dump($url_parts);


//:0
if($url_parts[2]==null){

  $model = new Model_startpage();
  $controller = new controller_startpage($model);
  $view = new view_startpage($controller,$model);

}

?>