<?php 
	include_once '../functions/dbconfig.php';

	// Obtener todos los cupones
	function getSegmentos() {
		$conn = connect();
		$sql = "SELECT seg_id, seg_nombre FROM cup_segmentos";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// Obtener todos los cupones
	/*function getCupones() {
		$conn = connect();
		$sql = "SELECT c.cup_id, e.emp_nombre, c.cup_titulo FROM cup_cupones AS c
				INNER JOIN cup_empresas AS e
					ON e.emp_id = c.emp_id
				ORDER BY cup_id DESC";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}*/


	// Obtener todos los cupones
	function getCupones($seg_id) {
		$conn = connect();
		$sql = "SELECT c.cup_id, e.emp_nombre, c.cup_titulo FROM cup_cupones AS c
				INNER JOIN cup_empresas AS e
					ON e.emp_id = c.emp_id 
				WHERE cup_id NOT IN (SELECT cup_id FROM cup_segmento_cupon WHERE seg_id = '$seg_id') 
				ORDER BY cup_id ASC";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


	// Obtener cupones por segmento
	function getCuponesSegmento2($seg_id) {
		$conn = connect();
		$sql = "SELECT s.sc_id, s.cup_id, s.seg_id, e.emp_nombre, c.cup_titulo, s.sc_orden FROM cup_segmento_cupon AS s
				INNER JOIN cup_cupones AS c
					ON c.cup_id = s.cup_id
				INNER JOIN cup_empresas AS e
					ON e.emp_id = c.emp_id
				WHERE seg_id = '$seg_id' 
				ORDER BY s.sc_orden ASC, s.sc_id DESC";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


	// Obtener cupones por segmento
	function getCuponesSegmento($seg_id, $cat_id) {
		$conn = connect();
		$sql = "SELECT s.sc_id, s.cup_id, s.seg_id, e.emp_nombre, c.cup_titulo, s.sc_orden, g.cat_id, g.cat_nombre FROM cup_segmento_cupon AS s
				INNER JOIN cup_cupones AS c
					ON c.cup_id = s.cup_id
				INNER JOIN cup_empresas AS e
					ON e.emp_id = c.emp_id
				INNER JOIN cup_categorias AS g
					ON g.cat_id = c.cat_id
				WHERE s.seg_id = '$seg_id' 
				AND g.cat_id = '$cat_id'
				ORDER BY s.sc_orden ASC, s.sc_id DESC";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


	// Agregar cupones a segmento
	function addCuponSegmento($sc_id, $cup_id, $seg_id, $sc_orden) {
		$conn = connect();
		$sql = "INSERT INTO cup_segmento_cupon (sc_id, cup_id, seg_id, sc_orden) VALUES (?, ?, ?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(1, $sc_id);
		$stmt->bindValue(2, $cup_id);
		$stmt->bindValue(3, $seg_id);
		$stmt->bindValue(4, $sc_orden);
		$stmt->execute();
	}

	// Obtener nombre segmento
	function getOnToySegmento($seg_id) {
		$conn = connect();
		$sql = "SELECT seg_id, seg_nombre FROM cup_segmentos WHERE seg_id = '$seg_id'";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// Obtener nombre categoria
	function getOnToyCategoria($cat_id) {
		$conn = connect();
		$sql = "SELECT cat_id, cat_nombre FROM cup_categorias WHERE cat_id = '$cat_id'";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// Borrar imagen cupon
	function deleteCuponSegmento($sc_id) {
		$conn = connect();
		$sql = "DELETE FROM cup_segmento_cupon WHERE sc_id = $sc_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(1, $sc_id);
		$stmt->execute();
	}

	// Obtener cupones de una categoría
	function getCategoriaSegmento($seg_id) {
		$conn = connect();
		$sql = "SELECT g.cat_id, g.cat_nombre FROM cup_segmento_cupon AS s
				INNER JOIN cup_cupones AS c
					ON c.cup_id = s.cup_id
				INNER JOIN cup_categorias AS g
					ON g.cat_id = c.cat_id
				WHERE s.seg_id = '$seg_id'
				GROUP BY g.cat_id";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// Obtener cupones de una categoría
	function getSegmentoCategoriaCupon($seg_id, $cat_id) {
		$conn = connect();
		$sql = "SELECT s.sc_id, s.cup_id, s.seg_id, e.emp_nombre, c.cup_titulo, g.cat_id, g.cat_nombre, s.sc_orden FROM cup_segmento_cupon AS s
				INNER JOIN cup_cupones AS c
					ON c.cup_id = s.cup_id
				INNER JOIN cup_empresas AS e
					ON e.emp_id = c.emp_id
				INNER JOIN cup_categorias AS g
					ON g.cat_id = c.cat_id
				WHERE s.seg_id = '$seg_id' AND g.cat_id = '$cat_id'";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


	// Editar orden cupon - segmento
	function editCuponSegmento($sc_id, $cup_id, $seg_id, $sc_orden) {
		$conn = connect();
		$sql = "UPDATE cup_segmento_cupon SET sc_id = '$sc_id', cup_id = '$cup_id', seg_id = '$seg_id', sc_orden = '$sc_orden' WHERE sc_id = $sc_id";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
	}

?>