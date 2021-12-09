<?php

session_start();

require('dbconnect.php');

$dbcon=new dbconnect();
// filter input
$user = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
//$user=$_REQUEST['username'];
//$password=$_REQUEST['password'];

$data = [

  'user' => $user,
];
$sql= 'select password from users where username=:user';

$stmt=$dbcon->pdo->prepare($sql);
$stmt->execute($data);
$dbarray=$stmt->fetchAll();
//  $hash='$2y$10$xGj13F3FITaviERWXyU04u0qORvC44XxgVzlVkP.M1alkjGNTtXvG';

foreach($dbarray as $password_server){
  echo $passerworder=$password_server['password'];
  echo "<br>";
}

  if (password_verify($password, $passerworder)) {
    $_SESSION["username"]=$user;
    header('Location:http://localhost/pagetemplate/');
  }else{
    //header('Location:http://localhost/pagetemplate/');
    var_dump($dbarray);
    echo $password;
  }

?>
