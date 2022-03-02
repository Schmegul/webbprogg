<?php

class topbottom
{

  function __construct()
  {

  }

  public function top(){

echo<<<HTML
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
HTML;


  }
  public function bottom(){

 require "js/index.js";

echo<<<HTML

</body>
</html>
HTML;


  }




}
 ?>
