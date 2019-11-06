<?php
	include_once '../modelos/departamentosModelos.php';

	$dep_id = $_POST['dep_id'];
	$dep_nombre = $_POST['dep_nombre'];
	$dep_alias = $_POST['dep_alias'];
	$dep_estado = $_POST['dep_estado'];

	addDepartamento($dep_id, $dep_nombre, $dep_alias, $dep_estado);
	header('Location: departamentos-list.php');
	
?>
