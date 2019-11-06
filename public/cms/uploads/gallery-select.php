<?php 
	$title = "Subir imágenes | Administrador Cuponera Virtual";
	include_once '../header.php';
	include_once '../modelos/categoriasModelos.php';

	$categorias = getAllCategorias();
?>

<div class="content-wrapper">

	<div class="box-title">
		<h2>Galería</h2>
	</div>

	<div class="content-in">

		<div class="box-content-top">
			<p>Qué imágenes quieres ver?</p>
		</div>

		<div class="box-categoria-select">
			<a href="gallery-list.php?img_tipo=logo&page=1">Logos</a>
		</div>

		<div class="box-categoria-select">
			<a href="gallery-list.php?img_tipo=imagen&page=1">Fotos cupones</a>
		</div>

	</div>

</div>

<?php include_once '../footer.php'; ?>