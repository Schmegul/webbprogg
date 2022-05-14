<?php
	include("dbconnect.php");


	if($_REQUEST['test']!=""){

		$dbpdo=anslutdb();
		$testclean = filter_input(INPUT_GET, 'test', FILTER_SANITIZE_STRING);

		$testclean=$testclean."%";

		$sql="SELECT * FROM geo_counties WHERE nameco LIKE :usernamer";


		$stmt=$dbpdo->prepare($sql);
		$stmt->bindParam(":usernamer",$testclean,PDO::PARAM_STR);
		$stmt->execute();

		$dbarray=$stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode( $dbarray,JSON_PRETTY_PRINT );


	}else{
	echo json_encode( array( "name"=>"John","time"=>"2pm" ) );

	}

?>
