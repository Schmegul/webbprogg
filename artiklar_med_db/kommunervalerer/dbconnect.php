<?php
/*
Funktionen anslutdb() försöker skapa en anslutning till databasen genom att lagra inloggningsuppgifter,
var den ska logga in, vad databasen heter, allt detta i ett PDO-objekt. Om en anslutning till databasen
inte lyckades skapas så skrivs istället ett felmedelande ut på hemsidan, detta tackvare PDO::ERRMODE_EXCEPTION.
*/
function anslutdb(){
	try {
		$conn = new PDO('mysql:host=sql303.epizy.com;dbname=epiz_30328841_cringer;port=3306; charset=utf8', 'epiz_30328841', 'Fc9EbfospHGqNvp');		// inloggningen
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	}
	catch(PDOException $e) {																																				// en sorts else{}
		echo 'ERROR: ' . $e->getMessage();																														// echo:ar felmeddelandet
	}
	return $conn;
}

?>
