<?php
	include("dbconnect.php");


	if($_REQUEST['test']!=""){

		$dbpdo=anslutdb();
		$testclean = filter_input(INPUT_GET, 'test', FILTER_SANITIZE_STRING);

		$testclean="%".$testclean."%";

		$sql="SELECT * FROM geo_municipalities WHERE namemu LIKE :username";


		$stmt=$dbpdo->prepare($sql);
		$stmt->bindParam(":username",$testclean,PDO::PARAM_STR);
		$stmt->execute();

		$dbarray=$stmt->fetchAll(PDO::FETCH_ASSOC);

																// V ta bort V
		echo json_encode( $dbarray,JSON_PRETTY_PRINT );


	}

?>
