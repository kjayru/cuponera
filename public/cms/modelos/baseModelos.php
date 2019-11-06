<?php 
	include_once '../functions/dbconfig.php';

		// Agregar
	function addUser($user_tipo_cliente, $user_tdoc, $user_ndoc, $seg_nombre, $user_nombres, $user_apellidos,$user_email, $user_estado ) {
		$conn = connect();
		$sql = "INSERT INTO cup_usuarios (user_tipo_cliente, user_tdoc, user_ndoc, seg_nombre, user_nombres, user_apellidos, user_email, user_estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
			$stmt = $conn->prepare($sql);
			$stmt->bindValue(1, $user_tipo_cliente);
			$stmt->bindValue(2, $user_tdoc);
			$stmt->bindValue(3, $user_ndoc);
			$stmt->bindValue(4, $seg_nombre);
			$stmt->bindValue(5, $user_nombres);
			$stmt->bindValue(6, $user_apellidos);
			$stmt->bindValue(7, $user_email);
			$stmt->bindValue(8, $user_estado);
			$stmt->execute();
	}

//Eliminar usuario
		// Borrar categoría
	function deleteUser($user_auto) {
		$conn = connect();
		$sql = "DELETE FROM cup_usuarios WHERE user_auto = $user_auto";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(1, $user_auto);
		$stmt->execute();
	}

	// Buscar un usuario
	function getUser($user_ndoc) {
		$conn = connect();
		$sql = "SELECT user_tipo_cliente, user_tdoc, user_ndoc, seg_nombre, user_nombres, user_apellidos, user_email, user_auto FROM cup_usuarios WHERE user_ndoc = '$user_ndoc' ORDER BY seg_nombre = 'E' DESC";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


		// Buscar un usuario encriptado
	function getUserTra($user_ndoc_tra) {
		$conn = connect();
		$sql = "SELECT user_tipo_cliente, user_tdoc, user_ndoc, seg_nombre, user_nombres, user_apellidos, user_email FROM cup_usuarios WHERE sha2(user_ndoc,256) = '$user_ndoc_tra' ORDER BY seg_nombre = 'E' DESC";
		$stmt = $conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}



?>