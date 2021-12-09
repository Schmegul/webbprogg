<?php
session_start();
require_once('dbcon.php');


$delete_pk=filter_input(INPUT_GET,'cartartikel_pk',FILTER_SANITIZE_NUMBER_INT);

//DELETE FROM employees WHERE officeCode = 4;

$data=[ 'del_pk' =>$delete_pk];


$db=new dbcon();
$stmt=$db->pdo->prepare('DELETE FROM cartartikel where cartartikel_pk= :del_pk');
$stmt->execute($data);

$data = [
  'user' => $_SESSION['user'],
];

$sql = "SELECT * FROM cart WHERE user_pk= :user";
$stmt= $db->pdo->prepare($sql);
$stmt->execute($data);
$user=$stmt->fetchColumn();
if (empty($user)){

  echo "din varukorg är tom";

}else{
  $data = [

    'user' => $_SESSION['user'],
  ];

  $stmt=$db->pdo->prepare('select * from artiklar, cart,cartartikel where user_pk = user_fk and art_fk = art_pk and user_pk=:user');
  $stmt->execute($data);
  $artiklar=$stmt->fetchAll();


  foreach ($artiklar as $artikel) {

    /*<img class="card-img-top" src="bilder/{$artikel['bild']}" alt="Card image cap">*/
    //href="deletecartartiklar.php?cartartikel_pk={$artikel['cartartikel_pk']}"
echo <<<ARTIKEL




    <h5 class="card-title">{$artikel['rubrik']}</h5>
    <p class="card-text">{$artikel['beskrivning']}</p>
    <p class="card-text">pris: {$artikel['pris']} kr</p>
    <p class="card-text">antal: {$artikel['antal']} st</p>
    {$artikel['user_pk']}
    {$artikel['cartartikel_pk']}
    <span class="delete" id="{$artikel['cartartikel_pk']}" style="font-size:32px;float:right;">PRESS</span>



ARTIKEL;
  }
}






 ?>
