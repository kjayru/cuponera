<?php
	include_once '../modelos/categoriasModelos.php';

	$size = count($_POST["cat_id"]);
	$i = 0;

	while ( $i < $size) {
		$cat_id = $_POST["cat_id"][$i];
		$cat_nombre = $_POST['cat_nombre'][$i];
		$cat_alias = $_POST['cat_alias'][$i];
		$cat_icon = $_POST['cat_icon'][$i];
		$cat_orden = $_POST['cat_orden'][$i];
		$cat_estado = $_POST['cat_estado'][$i];

		editCategoria($cat_id, $cat_nombre, $cat_alias, $cat_icon, $cat_orden, $cat_estado);

		++$i;
	}

	header('Location: categorias-list-order-edit.php?message=true');

?>