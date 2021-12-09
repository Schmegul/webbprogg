

 <?php
function cart(){


  require_once('dbcon.php');
  $db=new dbcon();
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
  // databasanslutning-> hämta
  //prepare    select * from cart,artiklar,cartartikel where user_pk=user_fk and art_pk=art_fk and user_pk = :sessionen som ni har i sessions variabeln
  // skicka med array med sissions id

  // presentera svar i ruta mitt på skärmen

  //


}

?>
