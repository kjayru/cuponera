<?php
	include_once '../modelos/categoriasModelos.php';
	
	$cat_id = $_GET['cat_id'];
	
	deleteCategoria($cat_id);
	
	header('Location: categorias-list.php');
?>