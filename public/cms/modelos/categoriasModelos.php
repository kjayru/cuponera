<?php 
	include_once '../functions/dbconfig.php';

	// Agregar
	function addCategoria($cat_id, $cat_nombre, $cat_alias, $cat_icon, $cat_orden, $cat_estado) {
		$conn = connect();
		$sql = "INSERT INTO cup_categorias (cat_id, cat_nombre, cat_alias, cat_icon, cat_orden, cat_estado) VALUES (?, ?, ?, ?, ?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(1, $cat_id);
		$stmt->bindValue(2, $cat_nombre);
		$stmt->bindValue(3, $cat_alias);
		$stmt->bindValue(4, $cat_icon);
		$stmt->bindValue(5, $cat_orden);
		$stmt->bindValue(6, $cat_estado);
		$stmt->execute();
	}

	// Obtener todos los usuarios
	function getAllCategorias() {
		$conn = connect();
		$sql = "SELECT cat_id, cat_nombre, cat_alias, cat_icon, cat_orden, cat_estado FROM cup_categorias ORDER BY cat_orden ASC";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// Obtener UNA categoria
	function getUnaCategorias($cat_id) {
		$conn = connect();
		$sql = "SELECT cat_id, cat_nombre, cat_alias, cat_icon, cat_orden, cat_estado FROM cup_categorias WHERE cat_id = '$cat_id'";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// Editar categoria
	function editCategoria($cat_id, $cat_nombre, $cat_alias, $cat_icon, $cat_orden, $cat_estado) {
		$conn = connect();
		$sql = "UPDATE cup_categorias SET cat_id = '$cat_id', cat_nombre = '$cat_nombre', cat_alias = '$cat_alias', cat_icon = '$cat_icon', cat_orden = '$cat_orden', cat_estado = '$cat_estado' WHERE cat_id = $cat_id";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
	}

	// Borrar categoría
	function deleteCategoria($cat_id) {
		$conn = connect();
		$sql = "DELETE FROM cup_categorias WHERE cat_id = $cat_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(1, $cat_id);
		$stmt->execute();
	}

?>