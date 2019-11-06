<?php 
	$title = "Agregar segmento | Administrador Cuponera Virtual";
	include_once '../header.php';
	include_once '../modelos/segmentosModelos.php';

	$seg_id = $_GET['seg_id'];
	$message = $_GET['message'];

	$segmento = getUnSegmento($seg_id);
?>

<div class="content-wrapper">

	<div class="box-title">
		<h2><a href="segmentos-list.php">Segmentos</a> &raquo; Añadir segmento</h2>
	</div>

	<div class="content-in">

		<div class="box-full">
		<form action="_edit-segmento.php" method="POST">
			<input type="text" name="seg_id" value="<?php echo $segmento[0]['seg_id']; ?>" hidden="">

			<dl>
				<dd>Nombre</dd>
				<dt><input type="text" name="seg_nombre" value="<?php echo $segmento[0]['seg_nombre']; ?>" required=""></dt>
			</dl>

			<dl>
				<dd>Estado</dd>
				<dt>
					<select name="seg_estado" value="<?php echo $segmento[0]['seg_estado']; ?>" required="">
						<option value="<?php echo $segmento[0]['seg_estado']; ?>"><?php if ($segmento[0]['seg_estado'] == '1') { ?> Activo <?php } else { ?> Inactivo <?php } ?></option>
						<option disabled="">----------</option>
						<option value="1">Activo</option>
						<option value="0">Inactivo</option>
					</select>
				</dt>
			</dl>

			<div class="box-btn txt-center mtop-30">
				<input type="submit" value="Guardar cambios" class="btn-principal btn btn-medium">
				<a href="segmentos-list.php" class="btn btn-principal-linea btn-medium">&laquo; Volver</a>
			</div>

		</form>
		</div>

	</div>



</div>

<?php include_once '../footer.php'; ?>