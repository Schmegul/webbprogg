<!--
Filtrerar och puttar upp användarangivna datan som showCreator.php har vidarebefogat.
-->

<?php

require_once('../dbconnect.php');

$db=new dbcon;

// filtrerar alla data som användaren har angivit, både text och bockar
$rubrik=filter_input(INPUT_POST, 'rubrik',FILTER_SANITIZE_SPECIAL_CHARS);
$beskrivning=filter_input(INPUT_POST, 'beskrivning',FILTER_SANITIZE_SPECIAL_CHARS);
$utförande=filter_input(INPUT_POST, 'utförande',FILTER_SANITIZE_SPECIAL_CHARS);
$ingridienser=filter_input(INPUT_POST, 'ingridienser',FILTER_SANITIZE_SPECIAL_CHARS);
$potatis=filter_input(INPUT_POST, 'potatis', FILTER_SANITIZE_NUMBER_INT);
$pasta=filter_input(INPUT_POST, 'pasta', FILTER_SANITIZE_NUMBER_INT);
$nötkött=filter_input(INPUT_POST, 'nötkött', FILTER_SANITIZE_NUMBER_INT);
$fläsk=filter_input(INPUT_POST, 'fläsk', FILTER_SANITIZE_NUMBER_INT);
$kyckling=filter_input(INPUT_POST, 'kyckling', FILTER_SANITIZE_NUMBER_INT);
$ris=filter_input(INPUT_POST, 'ris', FILTER_SANITIZE_NUMBER_INT);
$bröd=filter_input(INPUT_POST, 'bröd', FILTER_SANITIZE_NUMBER_INT);
$fisk=filter_input(INPUT_POST, 'fisk', FILTER_SANITIZE_NUMBER_INT);
$halloumi=filter_input(INPUT_POST, 'halloumi', FILTER_SANITIZE_NUMBER_INT);
$vilt=filter_input(INPUT_POST, 'vilt', FILTER_SANITIZE_NUMBER_INT);


$data = [ // sparar variablerna som precis filtrerats i array:en data
  'rubrik' => $rubrik,
  'beskrivning' => $beskrivning,
  'utforande' => $utförande,
  'ingridienser'  => $ingridienser,
  'potatis'  => $potatis,
  'pasta'  => $pasta,
  'notkott'  => $nötkött,
  'flask'  => $fläsk,
  'kyckling'  => $kyckling,
  'ris'  => $ris,
  'brod'  => $bröd,
  'fisk'  => $fisk,
  'halloumi'  => $halloumi,
  'vilt'  => $vilt
];

// värdena på variablerna puttas sedan upp till databasen i form av ett nytt recept
$sql = "INSERT INTO individrecept (rubrik,beskrivning,utförande,mängdingrid,potatis,pasta,nötkött,fläsk,kyckling,ris,bröd,fisk,halloumi,vilt) VALUES (:rubrik, :beskrivning, :utforande, :ingridienser, :potatis, :pasta, :notkott, :flask, :kyckling, :ris, :brod, :fisk, :halloumi, :vilt)"; // skapar nya databasinlägg utifrån informationen som den fått av view_startpage.php
$stmt= $db->pdo->prepare($sql);
$stmt->execute($data);

// för att kunna föra vidare det nya receptets primary key till nästa sidaskickas direkt
// efter receptets skapelse en fråga för att hitta receptet i databasen. Den gör det
// genom att jämföra beskrivningar.
$checker=[
  'beskrivning'=>$beskrivning
];
$sql="SELECT in_pk FROM individrecept WHERE beskrivning LIKE :beskrivning";

$stmt=$db->pdo->prepare($sql);
$stmt->execute($checker);
$pknummer=$stmt->fetchAll();

// när den hittat rätt recept och lagrat primary key:n i arrayen $pknummer förs värdet
// vidare till nästa sida genom att lagra det i url:n
header("Location:/webbprogg/recipeFND/recipes?recp=".$pknummer[0]['in_pk']);


?>
