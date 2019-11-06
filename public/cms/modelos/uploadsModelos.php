<?php 
	include_once '../functions/dbconfig.php';

	// Buscar un usuario
	function addImage($img_tipo, $file_name, $img_upload_date) {
		$conn = connect();
		$sql = "INSERT INTO cup_images_upload (img_tipo, img_filename, img_upload_date) VALUES ( ?, ?, ?)";
		$stmt = $conn->prepare($sql);
		//$stmt->bindValue(1, $img_id);
		$stmt->bindValue(1, $img_tipo);
		$stmt->bindValue(2, $file_name);
		$stmt->bindValue(3, $img_upload_date);
		$stmt->execute();
	}


	// Obtener imágenes
	function getImages($img_tipo) {
		$conn = connect();
		$sql = "SELECT img_tipo, img_filename, img_upload_date FROM cup_images_upload WHERE img_tipo = '$img_tipo' ORDER BY img_upload_date DESC";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// *** PAGINADOR *** //
	// Resultados por página
	function resultadosxPagina($start_from, $num_rec_per_page) {
		$conn = connect();
		$sql = "SELECT img_id, img_tipo, img_filename, img_upload_date FROM cup_images_upload ORDER BY img_upload_date DESC LIMIT $start_from, $num_rec_per_page";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// Cuéntame
	function contarImagenes() {
		$conn = connect();
		$sql = "SELECT COUNT(img_id) as rows FROM cup_images_upload";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// Resultados por página
	function resulxPaginaListado($img_tipo, $start_from, $num_rec_per_page) {
		$conn = connect();
		$sql = "SELECT img_id, img_tipo, img_filename, img_upload_date FROM cup_images_upload WHERE img_tipo = '$img_tipo' ORDER BY img_upload_date DESC LIMIT $start_from, $num_rec_per_page";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// Cuéntame
	function contarImagenesListado($img_tipo) {
		$conn = connect();
		$sql = "SELECT COUNT(img_id) as rows FROM cup_images_upload WHERE img_tipo = '$img_tipo'";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
?>