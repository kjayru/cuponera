<?php 
	include_once '../functions/dbconfig.php';

	// Agregar departamento
	function addDepartamento($dep_id, $dep_nombre, $dep_alias, $dep_estado) {
		$conn = connect();
		$sql = "INSERT INTO cup_departamentos (dep_id, dep_nombre, dep_alias, dep_estado) VALUES (?, ?, ?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(1, $dep_id);
		$stmt->bindValue(2, $dep_nombre);
		$stmt->bindValue(3, $dep_alias);
		$stmt->bindValue(4, $dep_estado);
		$stmt->execute();
	}

	// Obtener todos
	function getAllDepartamentos() {
		$conn = connect();
		$sql = "SELECT dep_id, dep_nombre, dep_alias, dep_estado FROM cup_departamentos ORDER BY dep_nombre";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// Obtener UN departamento
	function getUnDepartamento($dep_id) {
		$conn = connect();
		$sql = "SELECT dep_id, dep_nombre, dep_alias, dep_estado FROM cup_departamentos WHERE dep_id = '$dep_id'";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// Editar categoria
	function editDepartamento($dep_id, $dep_nombre, $dep_alias, $dep_estado) {
		$conn = connect();
		$sql = "UPDATE cup_departamentos SET dep_id = '$dep_id', dep_nombre = '$dep_nombre', dep_alias = '$dep_alias', dep_estado = '$dep_estado' WHERE dep_id = $dep_id";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
	}

	// Borrar categoría
	function deleteDepartamento($dep_id) {
		$conn = connect();
		$sql = "DELETE FROM cup_departamentos WHERE dep_id = $dep_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(1, $dep_id);
		$stmt->execute();
	}

?>