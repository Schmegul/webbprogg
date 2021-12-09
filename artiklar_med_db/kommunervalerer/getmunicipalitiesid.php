<?php
/*
Filen inkluderar dbconnect.php så den har tillgång till anslutdb() funktionen och då även databasen.
När get-requesten skickar municipalityid från #kommun_selector så kollar en if-sats om variabeln
innehåller något. Om den innehåller något så exekveras resten av koden; innehållet i municipalityid
rengörs och sparas i $cidc (en åtgärd mot sql-injections), en fråga förbereds som kommer välja ut all
informationen i databasen vars variabler stämmer överens med frågans kommande specifika krav.
Frågan förbereds med hjälp av anslutningen till databasen. Frågan förbereds ytterligare med de nya
kraven på vad som ska hämtas ur databasen, och exekveras sedan. Frågan används för att hämta
information ur databasen som sedan lagras i en array (ännu en åtgärd mot sql-injections; på detta vis
kommer aldrig informationen i arrayen komma i närheten av att exekveras). Arrayen enkrypteras om till
json och returneras sedan till ajaxdbcall.php, där informationen lagras i en ny array som kallas för"data".
*/
include("dbconnect.php");

if($_REQUEST['municipalityid']!=""){

	$dbpdo=anslutdb();																														// anslutningen till databasen
	$cidc = filter_input(INPUT_GET, 'municipalityid', FILTER_SANITIZE_STRING);		// rengöring av inkommande variabel

	$sql="SELECT * FROM geo_municipalities, geo_städer WHERE geo_municipalities.municipalityid_pk=:cid and geo_municipalities.municipalityid_pk=geo_städer.municipalityid_fk";
	$stmt=$dbpdo->prepare($sql);																									// sql-frågan förbereds
	$stmt->bindParam(":cid",$cidc,PDO::PARAM_STR);																// sql-frågan får sina specifika krav för databasen
	$stmt->execute();																															// sql-frågan sätts tillgång
	$dbarray=$stmt->fetchAll(PDO::FETCH_ASSOC);																		// frågan hämtar information som sedan lagras i $dbarray

	echo json_encode( $dbarray,JSON_PRETTY_PRINT );																// arrayen enkrypteras om till json
}

?>
