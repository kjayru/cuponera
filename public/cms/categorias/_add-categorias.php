<?php
	include_once '../modelos/categoriasModelos.php';

	$cat_id = $_POST['cat_id'];
	$cat_nombre = $_POST['cat_nombre'];
	$cat_alias = $_POST['cat_alias'];
	$cat_icon = $_POST['cat_icon'];
	$cat_orden = $_POST['cat_orden'];
	$cat_estado = $_POST['cat_estado'];

	addCategoria($cat_id, $cat_nombre, $cat_alias, $cat_icon, $cat_orden, $cat_estado);
	header('Location: categorias-list.php');
	
?> 