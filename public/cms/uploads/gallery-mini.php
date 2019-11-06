<?php 
	$title = "Galería imágenes | Administrador Cuponera Virtual";
	include_once '../modelos/uploadsModelos.php';

	$num_rec_per_page = 100;

	// Mostrando resultados por página
	if (isset($_GET["page"])) { 
		$page  = $_GET["page"]; 
	} else { 
		$page=1; 
	}; 

	$start_from = ($page-1) * $num_rec_per_page; 
	$rs_result = resultadosxPagina($start_from, $num_rec_per_page);

	// Creando la páginación 
	$contar = contarImagenes();
	$total_records = $contar[0]['rows'];
	$total_pages = ceil($total_records / $num_rec_per_page); 
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Galería de imágenes</title>

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
	<link rel="stylesheet" href="../css/estilos-admin.css">

	<style>
		body {float: left; width: 100%;}
		a {text-decoration: none; }
		.box-info, a {font-family: 'Roboto', sans-serif; }
		.box-thumb {box-sizing: border-box; width: 240px; }
		.box-thumb-url textarea {height: 55px; padding: 0 5%; width: 90%; } 
		.box-thumb-url input {width: 132px;} 
	</style>
</head>
<body>


<div class="box-info">
<dir>Buscar:</dir>
	<div class="box-btn">
	<div class="alt_page_navigation txt-center mtop-30 mbottom-30">

		<a href='gallery-mini.php?page=1'>&laquo;</a> 

		<?php for ($i=1; $i<=$total_pages; $i++) { ?>
			
			<a href="gallery-mini.php?page=<?php echo $i; ?>" <?php if ($i == $page) { echo 'class="active_page"';} ?>><?php echo $i; ?></a>
		
		<?php } ?>

		<a href='gallery-mini.php?page=<?php echo $total_pages; ?>'>&raquo;</a> 

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

		<a href='gallery-mini.php?page=1'>&laquo;</a> 

		<?php for ($i=1; $i<=$total_pages; $i++) { ?>
			
			<a href="gallery-mini.php?page=<?php echo $i; ?>" <?php if ($i == $page) { echo 'class="active_page"';} ?>><?php echo $i; ?></a>
		
		<?php } ?>

		<a href='gallery-mini.php?page=<?php echo $total_pages; ?>'>&raquo;</a> 

	</div>
	</div>
</div>

	<script src="../js/clipboard.min.js"></script>
	<script>
		var clipboard = new Clipboard('.btn');

		clipboard.on('success', function(e) {
			alert('Se copió la URL ahora pégala :)');
			javascript:parent.jQuery.fancybox.close();
		});
    </script>
</body>
</html>