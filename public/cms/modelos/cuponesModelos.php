<?php 
	include_once '../functions/dbconfig.php';

	// Obtener todos los cupones
	function getCupones() {
		$conn = connect();
		$sql = "SELECT c.cup_id, e.emp_nombre, c.cup_titulo, c.cup_vigencia_inicio, c.cup_vigencia_fin, c.cup_estado, g.cat_nombre, c.cup_destacado FROM cup_cupones AS c
				INNER JOIN cup_categorias AS g
					ON g.cat_id = c.cat_id
				INNER JOIN cup_empresas AS e
					ON e.emp_id = c.emp_id";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// Obtener todas empresas
	function getAllEmpresas() {
		$conn = connect();
		$sql = "SELECT emp_id, emp_nombre FROM cup_empresas ORDER BY emp_nombre";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


	// Obtener todas categorias
	function getAllCategorias() {
		$conn = connect();
		$sql = "SELECT cat_id, cat_nombre FROM cup_categorias ORDER BY cat_nombre";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


	// Agregar
	function addCupon($cup_id, $cup_titulo, $cup_descripcion_corta, $cup_descripcion_larga, $cup_legal, $cup_vigencia_inicio, $cup_vigencia_fin, $emp_id, $cat_id, $dep_id, $cup_imagen, $cup_destacado, $cup_estado) {
		$conn = connect();
		$sql = "INSERT INTO cup_cupones (cup_id, cup_titulo, cup_descripcion_corta, cup_descripcion_larga, cup_legal, cup_vigencia_inicio, cup_vigencia_fin, emp_id, cat_id, dep_id, cup_imagen, cup_destacado, cup_estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(1, $cup_id);
		$stmt->bindValue(2, $cup_titulo);
		$stmt->bindValue(3, $cup_descripcion_corta);
		$stmt->bindValue(4, $cup_descripcion_larga);
		$stmt->bindValue(5, $cup_legal);
		$stmt->bindValue(6, $cup_vigencia_inicio);
		$stmt->bindValue(7, $cup_vigencia_fin);
		$stmt->bindValue(8, $emp_id);
		$stmt->bindValue(9, $cat_id);
		$stmt->bindValue(10, $dep_id);
		$stmt->bindValue(11, $cup_imagen);
		$stmt->bindValue(12, $cup_destacado);
		$stmt->bindValue(13, $cup_estado);
		$stmt->execute();
	}

	// Obtener UN cupoón
	function getCupon($cup_id) {
		$conn = connect();
		$sql = "SELECT c.cup_id, c.cup_titulo, c.cup_descripcion_corta, c.cup_descripcion_larga, c.cup_legal, c.cup_vigencia_inicio, c.cup_vigencia_fin, c.emp_id, c.cat_id, c.dep_id, c.cup_imagen, c.cup_destacado, c.cup_estado, e.emp_nombre, g.cat_nombre FROM cup_cupones AS c
				INNER JOIN cup_empresas AS e
					ON e.emp_id = c.emp_id
				INNER JOIN cup_categorias AS g
					ON c.cat_id = g.cat_id 
				WHERE c.cup_id = '$cup_id'";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


	// Editar
	function editCupon($cup_id, $cup_titulo, $cup_descripcion_corta, $cup_descripcion_larga, $cup_legal, $cup_vigencia_inicio, $cup_vigencia_fin, $emp_id, $cat_id, $dep_id, $cup_imagen, $cup_destacado, $cup_estado) {
		$conn = connect();
		$sql = "UPDATE cup_cupones SET cup_id = '$cup_id', cup_titulo = '$cup_titulo', cup_descripcion_corta = '$cup_descripcion_corta', cup_descripcion_larga = '$cup_descripcion_larga', cup_legal = '$cup_legal', cup_vigencia_inicio = '$cup_vigencia_inicio', cup_vigencia_fin = '$cup_vigencia_fin', emp_id = '$emp_id', cat_id = '$cat_id', dep_id = '$dep_id', cup_imagen = '$cup_imagen', cup_destacado = '$cup_destacado', cup_estado = '$cup_estado' WHERE cup_id = $cup_id";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
	}

	// Galería de imágenes de cupon
	function getImagenesCupon($cup_id) {
		$conn = connect();
		$sql = "SELECT ic_id, ic_img FROM cup_imagenes_cupon WHERE cup_id = '$cup_id'";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


	// Agregar imagen cupon
	function addImagenCupon($ic_id, $cup_id, $ic_img) {
		$conn = connect();
		$sql = "INSERT INTO cup_imagenes_cupon (ic_id, cup_id, ic_img) VALUES (?, ?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(1, $ic_id);
		$stmt->bindValue(2, $cup_id);
		$stmt->bindValue(3, $ic_img);
		$stmt->execute();
	}


	// Borrar imagen cupon
	function deleteImagenCupon($ic_id) {
		$conn = connect();
		$sql = "DELETE FROM cup_imagenes_cupon WHERE ic_id = $ic_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(1, $ic_id);
		$stmt->execute();
	}


	// Borrar cupon
	function deleteCupon($cup_id) {
		$conn = connect();
		$sql = "DELETE FROM cup_cupones WHERE cup_id = $cup_id";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(1, $cup_id);
		$stmt->execute();
	}


?>