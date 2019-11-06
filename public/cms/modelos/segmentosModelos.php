<?php 
	include_once '../functions/dbconfig.php';

	// Agregar Segmentos
	function addSegmento($seg_id, $seg_nombre, $seg_estado) {
		$conn = connect();
		$sql = "INSERT INTO cup_segmentos (seg_id, seg_nombre, seg_estado) VALUES (?, ?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(1, $seg_id);
		$stmt->bindValue(2, $seg_nombre);
		$stmt->bindValue(3, $seg_estado);
		$stmt->execute();
	}

	// Obtener todos
	function getAllSegmentos() {
		$conn = connect();
		$sql = "SELECT seg_id, seg_nombre, seg_estado FROM cup_segmentos ORDER BY seg_nombre";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// Obtener UN segmentos
	function getUnSegmento($seg_id) {
		$conn = connect();
		$sql = "SELECT seg_id, seg_nombre, seg_estado FROM cup_segmentos WHERE seg_id = '$seg_id'";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// Editar categoria
	function editSegmento($seg_id, $seg_nombre, $seg_estado) {
		$conn = connect();
		$sql = "UPDATE cup_segmentos SET seg_id = '$seg_id', seg_nombre = '$seg_nombre', seg_estado = '$seg_estado' WHERE seg_id = $seg_id";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
	}

	// Borrar categoría
	function deleteSegmento($seg_id) {
		$conn = connect();
		$sql = "DELETE FROM cup_segmentos WHERE seg_id = $seg_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(1, $seg_id);
		$stmt->execute();
	}

?>