<?php 
	$title = "Subir imágenes | Administrador Cuponera Virtual";
	include_once '../header.php';
	include_once '../modelos/uploadsModelos.php';

	$num_rec_per_page = 50;

	$img_tipo = $_GET['img_tipo'];

	// Mostrando resultados por página
	if (isset($_GET["page"])) { 
		$page  = $_GET["page"]; 
	} else { 
		$page=1; 
	}; 

	$start_from = ($page-1) * $num_rec_per_page; 
	$rs_result = resulxPaginaListado($img_tipo, $start_from, $num_rec_per_page);

	// Creando la páginación 
	$contar = contarImagenesListado($img_tipo);
	$total_records = $contar[0]['rows'];
	$total_pages = ceil($total_records / $num_rec_per_page); 

?>


<div class="content-wrapper">

	<div class="box-title">
		<h2><a href="gallery-select.php">Galería</a> &raquo; <?php if ($img_tipo == 'logo') {echo 'Logos';} else {echo 'Fotos cupones';}?></h2>
	</div>


	<div class="content-in">

		<div class="box-btn">
		<div class="alt_page_navigation txt-center mtop-30 mbottom-30">

			<a href='gallery-list.php?img_tipo=<?php echo $img_tipo; ?>&page=1'>&laquo;</a> 

			<?php for ($i=1; $i<=$total_pages; $i++) { ?>
				
				<a href="gallery-list.php?img_tipo=<?php echo $img_tipo; ?>&page=<?php echo $i; ?>" <?php if ($i == $page) { echo 'class="active_page"';} ?>><?php echo $i; ?></a>
			
			<?php } ?>

			<a href='gallery-list.php?img_tipo=<?php echo $img_tipo; ?>&page=<?php echo $total_pages; ?>'>&raquo;</a> 

		</div>
		</div>

		<?php foreach ($rs_result as $resultado) { ?>

		<div class="box-thumb">
			<div class="box-thumb-img">
				<?php if ($resultado['img_tipo']  == 'logo') { ?>
				<img src="http://cuponera.claro.com.pe/img/logos/<?php echo $resultado['img_filename']; ?>" style="width:120px;">
				<?php } ?>

				<?php if ($resultado['img_tipo']  == 'imagen') { ?>
				<img src="http://cuponera.claro.com.pe/img/cupon/<?php echo $resultado['img_filename']; ?>">
				<?php } ?>
			</div>

			<div class="box-thumb-url">
				<?php if ($resultado['img_tipo']  == 'logo') { ?>
				<input id="copyme-<?php echo $resultado['img_id']; ?>" type="text" value="http://cuponera.claro.com.pe/img/logos/<?php echo $resultado['img_filename']; ?>">
				<?php } ?>

				<?php if ($resultado['img_tipo']  == 'imagen') { ?>
				<input id="copyme-<?php echo $resultado['img_id']; ?>" type="text" value="http://cuponera.claro.com.pe/img/cupon/<?php echo $resultado['img_filename']; ?>">
				<?php } ?>

				<span class="btn btn-principal btn-regular" data-clipboard-action="copy" data-clipboard-target="#copyme-<?php echo $resultado['img_id']; ?>">Copiar</span>

			</div>

			<div class="box-thumg-date">
				<span>Tipo: <?php echo $resultado['img_tipo']; ?> | </span>
				<span>Añadido el: <?php echo $resultado['img_upload_date']; ?></span>
			</div>
		</div>

		<?php } ?>


		<div class="box-btn">
		<div class="alt_page_navigation txt-center mtop-30 mbottom-30">

			<a href='gallery-list.php?img_tipo=<?php echo $img_tipo; ?>&page=1'>&laquo;</a> 

			<?php for ($i=1; $i<=$total_pages; $i++) { ?>
				
				<a href="gallery-list.php?img_tipo=<?php echo $img_tipo; ?>&page=<?php echo $i; ?>" <?php if ($i == $page) { echo 'class="active_page"';} ?>><?php echo $i; ?></a>
			
			<?php } ?>

			<a href='gallery-list.php?img_tipo=<?php echo $img_tipo; ?>&page=<?php echo $total_pages; ?>'>&raquo;</a> 

		</div>
		</div>


	</div>

</div>
	<script src="../js/clipboard.min.js"></script>
	<script>
		var clipboard = new Clipboard('.btn');

		clipboard.on('success', function(e) {
			alert('Se copió la URL ahora pégala :)');
			//javascript:parent.jQuery.fancybox.close();
		});
    </script>
<?php include_once '../footer.php'; ?>