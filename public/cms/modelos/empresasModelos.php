<?php 
	include_once '../functions/dbconfig.php';

	// Agregar
	function addEmpresa($emp_id, $emp_nombre, $emp_descripcion, $emp_logo, $emp_direccion, $emp_telefono, $emp_email, $emp_url, $emp_url_2, $emp_mapa, $emp_estado) {
		$conn = connect();
		$sql = "INSERT INTO cup_empresas (emp_id, emp_nombre, emp_descripcion, emp_logo, emp_direccion, emp_telefono, emp_email, emp_url, emp_url_2, emp_mapa, emp_estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(1, $emp_id);
		$stmt->bindValue(2, $emp_nombre);
		$stmt->bindValue(3, $emp_descripcion);
		$stmt->bindValue(4, $emp_logo);
		$stmt->bindValue(5, $emp_direccion);
		$stmt->bindValue(6, $emp_telefono);
		$stmt->bindValue(7, $emp_email);
		$stmt->bindValue(8, $emp_url);
		$stmt->bindValue(9, $emp_url_2);
		$stmt->bindValue(10, $emp_mapa);
		$stmt->bindValue(11, $emp_estado);
		$stmt->execute();
	}

	// Obtener todos los usuarios
	function getAllEmpresas() {
		$conn = connect();
		$sql = "SELECT emp_id, emp_nombre, emp_logo, emp_direccion, emp_telefono, emp_email, emp_url, emp_estado FROM cup_empresas ORDER BY emp_id DESC";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// Obtener UNA Empresa
	function getUnaEmpresa($emp_id) {
		$conn = connect();
		$sql = "SELECT emp_id, emp_nombre, emp_descripcion, emp_logo, emp_direccion, emp_telefono, emp_email, emp_url, emp_url_2, emp_mapa, emp_estado FROM cup_empresas WHERE emp_id = '$emp_id'";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// Editar Empresa
	function editEmpresa($emp_id, $emp_nombre, $emp_descripcion, $emp_logo, $emp_direccion, $emp_telefono, $emp_email, $emp_url, $emp_url_2, $emp_mapa, $emp_estado) {
		$conn = connect();
		$sql = "UPDATE cup_empresas SET emp_id = '$emp_id', emp_nombre = '$emp_nombre', emp_descripcion = '$emp_descripcion', emp_logo = '$emp_logo', emp_direccion = '$emp_direccion', emp_telefono = '$emp_telefono', emp_email = '$emp_email', emp_url = '$emp_url', emp_url_2 = '$emp_url_2', emp_mapa = '$emp_mapa', emp_estado = '$emp_estado' WHERE emp_id = $emp_id";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
	}

	// Borrar categoría
	function deleteEmpresa($emp_id) {
		$conn = connect();
		$sql = "DELETE FROM cup_empresas WHERE emp_id = $emp_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(1, $emp_id);
		$stmt->execute();
	}

?>