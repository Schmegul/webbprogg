<?php

function SUPPORT(){


  if(isset($_SESSION["username"])){
    echo "du läser hemlig information ".$_SESSION["username"];

echo <<<SUPPORT

    <div class="start">

    </class>
SUPPORT;
  }else{
    echo "du har inte loggat in, logga in nu";
  }
}

?>
