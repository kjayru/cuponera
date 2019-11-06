<?php 
	$title = "Cupones a Segmento | Administrador Cuponera Virtual";
	include_once '../header.php';
	include_once '../modelos/cupon_segmentoModelos.php';

	$seg_id = $_GET['seg_id'];
	
	$misegmento = getOnToySegmento($seg_id);
	$categorias = getCategoriaSegmento($seg_id);
?>

<div class="content-wrapper">

	<div class="box-title">
		<h2><a href="segmento-select.php">Segmento</a> &raquo; Elige una categoría</h2>
	</div>

	<div class="content-in">

		<div class="box-content-top">
			<h2>Estas en el <strong>segmento <?php echo $misegmento[0]['seg_nombre']; ?></strong> elige la categoría para ordenar</h2>
		</div>

		<?php foreach ($categorias as $categoria) { ?>
			<div class="box-categoria-select">
				<a href="segmento-orden.php?seg_id=<?php echo $seg_id; ?>&cat_id=<?php echo $categoria['cat_id']; ?>"><?php echo $categoria['cat_nombre']; ?></a>
			</div>			
		<?php } ?>


	</div>



</div>

<?php include_once '../footer.php'; ?>