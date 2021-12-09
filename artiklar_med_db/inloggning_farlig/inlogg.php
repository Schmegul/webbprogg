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

//$stmt=$dbcon->pdo->query($sql);
$stmt=$dbcon->pdo->prepare($sql);															// sql-frågan förbereds
$stmt->execute($data);																					// frågan sätts igång
$dbarray=$stmt->fetchAll();			  				// fårgan används för att hämta information som sedan lagras i $dbarray
// ^fix^
//  $hash='$2y$10$TeVqDKffvVfkoaclDTa4mOjq2m.o8FH87ALWgf/uz3QeC4JdX/9Uq';

foreach($dbarray as $password_server){
  echo $passerworder=$password_server['passowrd'];
  echo "<br>";
}

  if (password_verify($password, $passerworder)) {
    $_SESSION["username"]=$user;
    header('Location:inloggad.php');
  }else{
    header('Location:index.php');
  }
}
?>
