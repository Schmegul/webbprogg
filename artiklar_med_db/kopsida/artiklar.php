<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <style media="screen">
  body{
    display: flex;
    justify-content: space-evenly;
  }
  img{
    height: 128px;
    width: 128px;
  }
  .divs{
    padding: 10px;
    border-style: solid;
    border-radius: 10px;
    border-color: black;
  }
  </style>
</head>
<body>


  <?php
session_start();


  ini_set('display_errors',1);
  ini_set('display_startup_errors',1);
  error_reporting();
  require_once ('dbcon.php');
  require_once ('cart.php');
echo '<div id="presser" style="position: absolute; right: 20px;height:50px; width:50px; background-color:red;">varukorg</div>';
echo  '<div id="carter" style="position: absolute; z-index: 10; height:auto; width:500px; background-color: green; display:none;">';
  cart();
echo  '</div>';
  $db=new dbcon(E_ALL);

  $stmt=$db->pdo->query('select * from artiklar');

$stmt -> execute();

$artiklar=$stmt->fetchAll();
// var_dump ($artiklar);

  // for ($i=0; $i <sizeof($artiklar) ; $i++) {
  //
  //   echo <<<ARTIKEL
  //   <div id="pen$i" class="divs">
  // <img src="bilder/{$artiklar[$i]['bild']}"><br>
  // {$artiklar[$i]['rubrik']}.<br>
  // {$artiklar[$i]['beskrivning']}.<br>
  // {$artiklar[$i]['pris']}.<br>
  // </div>
  // ARTIKEL;
  //
  // }
  echo"<div class=\"container \">\n";

  $counter =0;
  foreach ($artiklar as $artikel) {

    if ($counter%3==0){
      echo "<div class=\"row\">";

    }

    echo <<<ARTIKEL
    <div class="card" style="width: 18rem;">
    <img src="bilder/{$artikel['bild']}" class="card-img-top" alt="...">
    <div class="card-body">
    <h5 class="card-title">{$artikel['rubrik']}</h5>
    <p class="card-text">{$artikel['beskrivning']}</p>
    <p class="card-text">{$artikel['pris']} kr</p>
    <form action="addtocart.php" method="get">
    <input type="hidden" name="artikel_id" value="{$artikel['art_pk']}">
    <input class="btn btn-primary" type="submit" value="Buy now">
    <select name="antal" id="selector">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    </select>
    </form>
    </div>
    </div>

    ARTIKEL;


    $counter++;
    if ($counter%3==0){
      echo "</div>";

    }
  }


  echo"</div>";


  ?>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>

    $("#presser").click(function(){
      if($('#carter').css('display') == 'none'){
          $('#carter').css({'display': 'block'});
      }



    else if($('#carter').css('display') == 'block'){
      $('#carter').css({'display': 'none'})

    }
    });


    $(".delete").click(function(){
      console.log("da");
    $.get("deletecartartiklar.php", {cartartikel_pk: this.id})
    .done(function(data){

      document.getElementById("carter").innerHTML = data;

    //  alert("Data loaded: "+data); //top popup
    });
});
  </script>
</body>

</html>
