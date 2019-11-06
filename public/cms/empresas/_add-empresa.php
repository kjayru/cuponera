<?php
	include_once '../modelos/empresasModelos.php';

	$emp_id = $_POST['emp_id'];
	$emp_nombre = $_POST['emp_nombre'];
	$emp_descripcion = $_POST['emp_descripcion'];
	$emp_logo = $_POST['emp_logo'];
	$emp_direccion = $_POST['emp_direccion'];
	$emp_telefono = $_POST['emp_telefono'];
	$emp_email = $_POST['emp_email'];
	$emp_url = $_POST['emp_url'];
	$emp_url_2 = $_POST['emp_url_2'];
	$emp_mapa = $_POST['emp_mapa'];
	$emp_estado = $_POST['emp_estado'];

	addEmpresa($emp_id, $emp_nombre, $emp_descripcion, $emp_logo, $emp_direccion, $emp_telefono, $emp_email, $emp_url, $emp_url_2, $emp_mapa, $emp_estado);
	header('Location: empresas-list.php');

?>
