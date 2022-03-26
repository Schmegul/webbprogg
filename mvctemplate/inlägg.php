<!--
Tar emot nya superinlägg från view_startpage.php och filtrerar dem. Mellanlagrar informationen i
en array som sedan används för att placera den nyfådda informationen i respektive position i databasen.
Omdirigerar sedan klienten tillbaka till index.php (innebär även att index.php uppdateras automatiskt
och det nya superinlägget är direkt synligt).
-->

<?php
require_once('dbconnect.php');

$db=new dbcon;
$rubrik  =filter_input(INPUT_POST, 'Rubriker',FILTER_SANITIZE_SPECIAL_CHARS);     // filtrerar nya superinlägg för sql-injections. Input:en kommer ifrån function inlägg()
$innehall  =filter_input(INPUT_POST, 'brödtexter',FILTER_SANITIZE_SPECIAL_CHARS); // filtrerar nya superinlägg för sql-injections. Input:en kommer ifrån function inlägg()
$in_fk=filter_input(INPUT_POST, 'fker', FILTER_SANITIZE_NUMBER_INT);              // filtrerar nya superinlägg för sql-injections. Input:en kommer ifrån function inlägg()

$super=1; // 1 betyder att inlägget räknas som ett superinlägg

$data = [ // sparar variablerna från view_startpage.php i array:en data
  'Rubrik' => $rubrik,
  'innehall' => $innehall,
  'int_fk' => $in_fk,
  'super'  => $super
];                         // ↓  samt  ↓ samt ↓ och ↓ är namnen på kolumnerna i databasen
$sql = "INSERT INTO inlägg (Rubrik,innehall,in_fk,super) VALUES (:Rubrik, :innehall, :int_fk, :super)"; // skapar nya databasinlägg utifrån informationen som den fått av view_startpage.php
$stmt= $db->pdo->prepare($sql);
$stmt->execute($data);

header("Location:http://localhost/webbprogg/mvctemplate/index") // skickar direkt tillbaka användaren till index för att se sitt nya inlägg. Istället för ajax
?>
