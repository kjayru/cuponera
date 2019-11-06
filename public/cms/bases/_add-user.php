<?php

	include_once '../modelos/baseModelos.php';

	$user_tipo_cliente=$_POST['user_tipo_cliente'];
	$user_tdoc=$_POST['user_tdoc'];
	$user_ndoc=$_POST['user_ndoc'];
	$seg_nombre=$_POST['seg_nombre'];
	$user_nombres=$_POST['user_nombres'];
	$user_apellidos=$_POST['user_apellidos'];
	$user_email=$_POST['user_email'];
	$user_estado=$_POST['user_estado'];

	addUser($user_tipo_cliente, $user_tdoc, $user_ndoc, $seg_nombre, $user_nombres, $user_apellidos, $user_email, $user_estado );
	header('Location: ok.php');
	
?> 
