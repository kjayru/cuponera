<?php
	include_once '../modelos/homeModelos.php';

	$ch_id = $_POST['ch_id'];
	$ch_orden = $_POST['ch_orden'];

	foreach($_POST["cup_id"] as $cup_id) {
		addCuponHome($ch_id, $cup_id, $ch_orden);
	}

	header('Location: home-list.php');
?> 