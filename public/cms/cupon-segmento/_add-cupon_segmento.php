<?php
	include_once '../modelos/cupon_segmentoModelos.php';

	$sc_id = $_POST['sc_id'];
	$seg_id = $_POST['seg_id'];
	$sc_orden = $_POST['sc_orden'];

	foreach($_POST["cup_id"] as $cup_id) {
		addCuponSegmento($sc_id, $cup_id, $seg_id, $sc_orden);
	}

	header('Location: segmento-agregar.php?seg_id='.$seg_id);
	
?> 