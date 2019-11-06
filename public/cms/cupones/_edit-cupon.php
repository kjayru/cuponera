<?php
	include_once '../modelos/cuponesModelos.php';

	$cup_id = $_POST['cup_id'];
	$cup_titulo = $_POST['cup_titulo'];
	$cup_descripcion_corta = $_POST['cup_descripcion_corta'];
	$cup_descripcion_larga = $_POST['cup_descripcion_larga'];
	$cup_legal = $_POST['cup_legal'];
	$cup_vigencia_inicio = $_POST['cup_vigencia_inicio'];
	$cup_vigencia_fin = $_POST['cup_vigencia_fin'];
	$emp_id = $_POST['emp_id'];
	$cat_id = $_POST['cat_id'];
	$dep_id = $_POST['dep_id'];
	$cup_imagen = $_POST['cup_imagen'];
	$cup_destacado = $_POST['cup_destacado'];
	$cup_estado = $_POST['cup_estado'];

	editCupon($cup_id, $cup_titulo, $cup_descripcion_corta, $cup_descripcion_larga, $cup_legal, $cup_vigencia_inicio, $cup_vigencia_fin, $emp_id, $cat_id, $dep_id, $cup_imagen, $cup_destacado, $cup_estado);
	header('Location: cupones-edit.php?cup_id='.$cup_id.'&message=true');
	
?>
