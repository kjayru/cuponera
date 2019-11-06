<?php 
	include_once '../functions/dbconfig.php';

	// Obtener info del cupon
	function getCuponInfo($cup_id) {
		$conn = connect();
		$sql = "SELECT c.cup_id, c.cup_titulo, c.cup_descripcion_corta, c.cup_descripcion_larga, c.cup_legal, c.cup_vigencia_inicio, c.cup_vigencia_fin, c.cup_imagen, c.cat_id, e.emp_nombre, e.emp_descripcion, e.emp_logo, e.emp_direccion, e.emp_telefono, e.emp_email, e.emp_url, e.emp_url_2, e.emp_mapa  
				FROM cup_cupones AS c
				INNER JOIN cup_empresas AS e
					ON e.emp_id = c.emp_id
				WHERE c.cup_id = '$cup_id'";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


	// Obtener galería de imágenes
	function getGalleryCupon($cup_id) {
		$conn = connect();
		$sql = "SELECT cup_id, ic_img FROM cup_imagenes_cupon WHERE cup_id = '$cup_id'";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


	function getDepartamentoSelect($dep) {
		$conn = connect();
		$sql = "SELECT dep_id, dep_nombre, dep_alias FROM cup_departamentos WHERE dep_alias LIKE '%$dep%' AND dep_estado = '1'";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// Obtener categoria seleccionado
	function getCategoriaSelect($cat) {
		$conn = connect();
		$sql = "SELECT cat_id, cat_nombre, cat_alias FROM cup_categorias WHERE cat_id = '$cat' AND cat_estado = '1'";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


	function getSegmentoSelect($seg_nombre) {
		$conn = connect();
		$sql = "SELECT seg_id, seg_nombre FROM cup_segmentos WHERE seg_nombre = '$seg_nombre' AND seg_estado = '1'";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


	// Obtener categoria seleccionado
	function getCuponRandom($seg_id, $cat_id, $dep_id, $cup_id) {
		$conn = connect();
		$sql = "SELECT c.cup_id, c.cup_titulo, c.cup_descripcion_corta, c.cup_imagen, e.emp_logo, e.emp_nombre FROM cup_segmento_cupon AS s
				INNER JOIN cup_departamento_cupon AS d
					ON s.cup_id = d.cup_id
				INNER JOIN cup_cupones AS c
					ON c.cup_id = s.cup_id
				INNER JOIN cup_empresas AS e
					ON e.emp_id = c.emp_id
				WHERE s.seg_id = '$seg_id' AND c.cat_id = '$cat_id' AND d.dep_id = '$dep_id' AND c.cup_estado = '1' AND c.cup_id != '$cup_id' ORDER BY RAND() LIMIT 3";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


?>