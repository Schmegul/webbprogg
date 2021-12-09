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

  $artiklar=[
    ["rubrik"=>"lamborghini","pris"=>800000,"bild"=>"catblushing.png","beskrivning"=>"skit traktor"],
    ["rubrik"=>"new hollande","pris"=>1000000,"bild"=>"hmm.png","beskrivning"=>"dyr skit traktor"],
    ["rubrik"=>"john deere","pris"=>2000000,"bild"=>"smor.png","beskrivning"=>"fin traktor"],
    ["rubrik"=>"massey ferguson","pris"=>1000000,"bild"=>"problem.gif","beskrivning"=>"finast traktor"],
    ["rubrik"=>"lamborghini","pris"=>800000,"bild"=>"catblushing.png","beskrivning"=>"skit traktor"],
    ["rubrik"=>"new hollande","pris"=>1000000,"bild"=>"hmm.png","beskrivning"=>"dyr skit traktor"],
    ["rubrik"=>"john deere","pris"=>2000000,"bild"=>"smor.png","beskrivning"=>"fin traktor"],
    ["rubrik"=>"massey ferguson","pris"=>1000000,"bild"=>"problem.gif","beskrivning"=>"finast traktor"],

  ];

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
    <input type="hidden" name="artikel_id" value="{$counter}">
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

</body>

</html>
