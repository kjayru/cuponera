<?php 
	include_once '../functions/dbconfig.php';

	// Obtener todos los cupones
	function getDepartamentos() {
		$conn = connect();
		$sql = "SELECT dep_id, dep_nombre FROM cup_departamentos ORDER BY dep_nombre";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


	// Obtener los cupones que no han sido agregados aún
	function getCupones($dep_id) {
		$conn = connect();
		$sql = "SELECT c.cup_id, e.emp_nombre, c.cup_titulo FROM cup_cupones AS c
				INNER JOIN cup_empresas AS e
					ON e.emp_id = c.emp_id 
				WHERE cup_id NOT IN (SELECT cup_id FROM cup_departamento_cupon WHERE dep_id = '$dep_id') 
				ORDER BY cup_id ASC";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// Obtener los cupones agregados
	function getCuponesAgregados($dep_id) {
		$conn = connect();
		$sql = "SELECT d.dc_id, d.cup_id, d.dep_id, e.emp_nombre, c.cup_titulo 
					FROM cup_departamento_cupon AS d
				INNER JOIN cup_cupones AS c
					ON c.cup_id = d.cup_id
				INNER JOIN cup_empresas AS e
					ON e.emp_id = c.emp_id
				WHERE d.dep_id = '$dep_id'
				ORDER BY d.dc_id DESC";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	function onToyDepartamento($dep_id) {
		$conn = connect();
		$sql = "SELECT dep_id, dep_nombre FROM cup_departamentos WHERE dep_id = '$dep_id'";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// Agregar cupones a segmento
	function addCuponDepartamento($dc_id, $cup_id, $dep_id) {
		$conn = connect();
		$sql = "INSERT INTO cup_departamento_cupon (dc_id, cup_id, dep_id) VALUES (?, ?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(1, $dc_id);
		$stmt->bindValue(2, $cup_id);
		$stmt->bindValue(3, $dep_id);
		$stmt->execute();
	}

	// Borrar cupon de departamento
	function deleteCuponDepartamento($dc_id) {
		$conn = connect();
		$sql = "DELETE FROM cup_departamento_cupon WHERE dc_id = $dc_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(1, $dc_id);
		$stmt->execute();
	}

?>