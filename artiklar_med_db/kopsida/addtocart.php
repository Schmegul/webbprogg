



<?php
session_start();
$_SESSION['user']=session_id();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  $artikel_id  =filter_input(INPUT_GET, 'artikel_id',FILTER_SANITIZE_SPECIAL_CHARS);
  $antal  =filter_input(INPUT_GET, 'antal',FILTER_SANITIZE_NUMBER_INT);


require_once('dbcon.php');
$db=new dbcon();


$data = [
    'artid' => $artikel_id,
    'antal' => $antal,
    'user' => $_SESSION['user'],
];
$sql = "INSERT INTO cartartikel (user_fk,art_fk,antal) VALUES (:user, :artid, :antal)";
$stmt= $db->pdo->prepare($sql);
$stmt->execute($data);

unset($data);
$data = [
      'user' => $_SESSION['user'],

];
$sql = "INSERT INTO cart (user_pk) VALUES (:user)";
$stmt= $db->pdo->prepare($sql);
$stmt->execute($data);

header('Location: artiklar.php');


?>
