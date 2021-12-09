
<?php

	function anslutdb(){

		try {
			$conn = new PDO('mysql:host=localhost;dbname=postal;port=3307; charset=utf8', 'root', '');
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

			/*
				PDO::ERRMODE_SILENT – database-related errors will be ignored.
				PDO::ERRMODE_WARNING – database-related errors will cause a warning to be emitted, but execution will continue.
				PDO::ERRMODE_EXCEPTION – database-related errors will cause a PDOException to be thrown.

			*/
			} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}


		return $conn;
	}

?>
