<?php
session_start();

if(isset($_SESSION["username"])){

  echo "du läser hemlig information ".$_SESSION["username"];

echo <<<EGG
  <a href="logout.php">eyooo<a>
  EGG;

}else{
  header('Location:index.php');
}



 ?>
