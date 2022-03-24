<?php
require_once('dbconnect.php');

$db=new dbcon;
  $artikel_id  =filter_input(INPUT_POST, 'Rubrik',FILTER_SANITIZE_SPECIAL_CHARS);
  $antal  =filter_input(INPUT_POST, 'brödtext',FILTER_SANITIZE_SPECIAL_CHARS);
  //fk=pk
  $in_fk=filter_input(INPUT_POST, 'fk', FILTER_SANITIZE_NUMBER_INT);

$super=0;

$data = [
    'Rubrik' => $artikel_id,
    'texter' => $antal,
    'int_fk' => $in_fk,
    'super'  => $super
];
$sql = "INSERT INTO inlägg (Rubrik,Text,in_fk,super) VALUES (:Rubrik, :texter, :int_fk, :super)";
$stmt= $db->pdo->prepare($sql);
$stmt->execute($data);

header("Location:http://localhost/webbprogg/mvctemplate/index?m%C3%A4rke=volvo")
 ?>
