<?php
	include_once '../modelos/departamentosModelos.php';
	
	$dep_id = $_GET['dep_id'];
	
	deleteDepartamento($dep_id);
	
	header('Location: departamentos-list.php');
?>