<?php
	include_once '../modelos/empresasModelos.php';
	
	$emp_id = $_GET['emp_id'];
	
	deleteEmpresa($emp_id);
	
	header('Location: empresas-list.php');
?>