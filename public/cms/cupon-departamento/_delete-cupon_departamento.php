<?php
	include_once '../modelos/cupon_departamentoModelos.php';
	
	$dc_id = $_GET['dc_id'];
	$dep_id = $_GET['dep_id'];
	
	deleteCuponDepartamento($dc_id);
	
	header('Location: departamento-agregar.php?dep_id='.$dep_id);
?>