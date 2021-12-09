<?php
session_start();

session_destroy();
session_regenerate_id($_SESSION['username']);

header('Location:index.php');

 ?>
