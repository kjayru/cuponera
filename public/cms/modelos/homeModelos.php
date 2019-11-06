<?php 
	include_once '../functions/dbconfig.php';

	function getCupones() {
		$conn = connect();
		$sql = "SELECT c.cup_id, e.emp_nombre, c.cup_titulo FROM cup_cupones AS c
				INNER JOIN cup_empresas AS e
					ON e.emp_id = c.emp_id 
				WHERE cup_id NOT IN (SELECT cup_id FROM cup_cupones_home) 
				ORDER BY cup_id ASC";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


	function getCuponesAgregados() {
		$conn = connect();
		$sql = "SELECT h.ch_id, h.cup_id, h.ch_orden, e.emp_nombre, c.cup_titulo FROM cup_cupones_home AS h
				INNER JOIN cup_cupones AS c
					ON c.cup_id = h.cup_id
				INNER JOIN cup_empresas AS e
					ON e.emp_id = c.emp_id
				ORDER BY h.ch_orden ASC";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


	// Agregar cupones a home
	function addCuponHome($ch_id, $cup_id, $ch_orden) {
		$conn = connect();
		$sql = "INSERT INTO cup_cupones_home (ch_id, cup_id, ch_orden) VALUES (?, ?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(1, $ch_id);
		$stmt->bindValue(2, $cup_id);
		$stmt->bindValue(3, $ch_orden);
		$stmt->execute();
	}


	// Editar orden de los cupones
	function editOrderHome($ch_id, $cup_id, $ch_orden) {
		$conn = connect();
		$sql = "UPDATE cup_cupones_home SET ch_id = '$ch_id', cup_id = '$cup_id', ch_orden = '$ch_orden' WHERE ch_id = $ch_id";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
	}


	// Borrar cupon del home
	function deleteCuponHome($ch_id) {
		$conn = connect();
		$sql = "DELETE FROM cup_cupones_home WHERE ch_id = $ch_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(1, $ch_id);
		$stmt->execute();
	}


 ?>