<?php
	function connect() {

		// DB connection info
		//$host = "localhost";
		//$user = "root";
		//$pwd = "";
		//$db = "cuponera";


		// DB Desarrollo
		//$host = "clarobd.cloudapp.net";
		//$user = "b8d2501753d234";
		//$pwd = "abd0dff5";
		//$db = "clarolaAKM9rb2T8";


		// DB Producción
		/*$host = "azuredbclaro.cloudapp.net";
		$user = "b8d2501753d567";
		$pwd = "abd0dff5";
		$db = "clarolaAKM9rb2T7";*/
		$host = "127.0.0.1";
		$user = "root";
		$pwd = "C0n3x10n";
		$db = "clarolaAKM9rb2T7";
		
		
		try {
			$conn = new PDO("mysql:host=$host;dbname=$db", $user, $pwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		}

		catch(Exception $e) {
			echo $e;
		}

		return $conn;
	}

?>