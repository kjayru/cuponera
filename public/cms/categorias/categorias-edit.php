<?php 
	$title = "Editar categoría | Administrador Cuponera Virtual";
	include_once '../header.php';

	include_once '../modelos/categoriasModelos.php';

	$cat_id = $_GET['cat_id'];
	$message = $_GET['message'];

	$categoria = getUnaCategorias($cat_id);
?>

<div class="content-wrapper">

	<div class="box-title">
		<h2><a href="categorias-list.php">Categorias </a>&raquo; Editar categoria: <?php echo $categoria[0]['cat_nombre']; ?></h2>
	</div>

	<div class="content-in">

		<?php if ($message == 'true') { ?>
		<div class="message success" id="message" style="width:100%;">
			<p>El campo ha sido actualizado con éxito. <a href="categorias-list.php"><i class="fa fa-times" aria-hidden="true"></i> Volver</a></p>
		</div>
		<?php } ?>


		<div class="box-full">
		<form action="_edit-categorias.php" method="POST">
			<input type="text" name="cat_id" hidden="" value="<?php echo $categoria[0]['cat_id']; ?>">

			<dl>
				<dd>Nombre de la categoría</dd>
				<dt><input type="text" name="cat_nombre" value="<?php echo $categoria[0]['cat_nombre']; ?>"></dt>
			</dl>

			<dl>
				<dd>Alias de la categoría</dd>
				<dt><input type="text" name="cat_alias" value="<?php echo $categoria[0]['cat_alias']; ?>"></dt>
			</dl>


			<dl>
				<dd>URL imagen del ícono</dd>
				<dt><input type="text" name="cat_icon" value="<?php echo $categoria[0]['cat_icon']; ?>"></dt>
			</dl>

			<dl>
				<dd>Orden</dd>
				<dt><input type="text" name="cat_orden" value="<?php echo $categoria[0]['cat_orden']; ?>"></dt>
			</dl>

			<dl>
				<dd>Estado</dd>
				<dt>
					<select name="cat_estado" id="" required="">
						<option value="<?php echo $categoria[0]['cat_estado']; ?>"><?php if ($categoria[0]['cat_estado'] == '1') { ?> Activo <?php } else { ?> Inactivo <?php } ?></option>
						<option disabled="">----------</option>
						<option value="1">Activo</option>
						<option value="0">Inactivo</option>
					</select>
				</dt>
			</dl>

			<div class="box-btn txt-center mtop-30">
				<input type="submit" value="Guardar cambios" class="btn-principal btn btn-medium">
				<a href="categorias-list.php" class="btn btn-principal-linea btn-medium">&laquo; Volver</a>
			</div>

		</form>
		</div>

	</div>



</div>

<?php include_once '../footer.php'; ?>