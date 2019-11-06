<?php
	include_once '../modelos/cupon_departamentoModelos.php';

	$dc_id = $_POST['dc_id'];
	$dep_id = $_POST['dep_id'];

	foreach($_POST["cup_id"] as $cup_id) {
		addCuponDepartamento($dc_id, $cup_id, $dep_id);
	}

	header('Location: departamento-agregar.php?dep_id='.$dep_id);
?> 