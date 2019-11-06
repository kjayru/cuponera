<?php 
	$title = "Editar cupón | Administrador Cuponera Virtual";
	include_once '../header.php';
	include_once '../modelos/cuponesModelos.php';

	$cup_id = $_GET['cup_id'];
	$message = $_GET['message'];

	$imagenes = getImagenesCupon($cup_id);
	$cupon = getCupon($cup_id);
?>


<div class="content-wrapper">

	<div class="box-title">
		<h2><a href="cupones-list.php">Cupones</a> &raquo; Galería imágenes</h2>
	</div>

	<div class="content-in">
		<div class="box-info">
			<p><strong>Empresa: </strong><?php echo $cupon[0]['emp_nombre']; ?></p>
			<p><strong>Cupón: </strong><?php echo $cupon[0]['cup_titulo']; ?></p>
		</div>

		<div class="box-addme">
			<p>Agregar imagen a cupón</p>

			<div class="box-full">
			<form action="_add-imagen_cupon.php" method="POST">
				<input type="text" name="ic_img">
				<input type="text" name="cup_id" hidden="" value="<?php echo $cup_id; ?>">
				<input type="submit" value="Agregar" class="btn-principal btn btn-medium">
				<a class="fancybox-norefresh fancybox.iframe" href="../uploads/gallery-mini.php?page=1" style="margin-left:10px;">Ver galería</a>
			</form>
			</div>
		</div>

		<?php if ($message == 'true') { ?>
		<div class="message success" id="message" style="width:100%;">
			<p>La imagen ha sido borrada. <a href="cupones-list.php"><i class="fa fa-times" aria-hidden="true"></i> Volver</a></p>
		</div>
		<?php } ?>

		<table class="table" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th width="5%">ID IMG</th>
					<th width="25%">Imagen</th>
					<th width="65%">URL</th>
					<th width="5%" class="txt-center">Borrar</th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($imagenes as $imagen) { ?>
				<tr>
					<td><?php echo $imagen['ic_id']; ?></td>
					<td class="txt-center">
						<a class="single_img" href="<?php echo $imagen['ic_img']; ?>" title="Tamaño: 700x394px">
							<img src="<?php echo $imagen['ic_img']; ?>" width="160" />
						</a>
					</td>
					<td><?php echo $imagen['ic_img']; ?></td>
					<td class="txt-center"><a href="_delete-imagen_cupon.php?ic_id=<?php echo $imagen['ic_id']; ?>&cup_id=<?php echo $cup_id; ?>" onclick="return confirm('¿Estás seguro? No hay marcha atrás')"><i class="fa fa-times" aria-hidden="true"></i> Quitar</a></td>
				</tr>
				<?php } ?>
			</tbody>

		</table>
	</div>

	<div class="box-btn txt-center mbottom-50">
		<a href="cupones-list.php" class="btn btn-principal-linea btn-medium">&laquo; Volver</a>
	</div>



</div>

<?php include_once '../footer.php'; ?>






<?php include_once '../footer.php'; ?>