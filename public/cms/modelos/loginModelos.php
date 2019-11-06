<?php 
	include_once 'functions/dbconfig.php';

	function getConnect($ml_username, $ml_password) {
		$conn = connect();
		$sql = "SELECT ml_id, ml_username, ml_password, ml_estado, mr_id FROM cup_monos_lista WHERE ml_username = '$ml_username' AND ml_password = '$ml_password' AND ml_estado = '1'";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_NUM);
	}

?>