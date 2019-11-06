<?php
	include_once '../modelos/cupon_segmentoModelos.php';

	$size = count($_POST["sc_id"]);
	$cat_id = $_POST["cat_id"];

	$i = 0;

	while ( $i < $size) {
		$sc_id = $_POST["sc_id"][$i];
		$cup_id = $_POST['cup_id'][$i];
		$seg_id = $_POST['seg_id'][$i];
		$sc_orden = $_POST['sc_orden'][$i];

		editCuponSegmento($sc_id, $cup_id, $seg_id, $sc_orden);
		++$i;
	}

	header('Location: segmento-orden.php?seg_id='.$seg_id.'&cat_id='.$cat_id.'&message=true');
?>