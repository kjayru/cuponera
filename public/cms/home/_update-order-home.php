<?php
	include_once '../modelos/homeModelos.php';

	$size = count($_POST["ch_id"]);
	$i = 0;

	while ( $i < $size) {
		$ch_id = $_POST["ch_id"][$i];
		$cup_id = $_POST['cup_id'][$i];
		$ch_orden = $_POST['ch_orden'][$i];

		editOrderHome($ch_id, $cup_id, $ch_orden);
		++$i;
	}

	header('Location: home-order.php?message=true');

?>