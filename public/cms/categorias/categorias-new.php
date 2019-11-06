<?php 
	$title = "Agregar categoría | Administrador Cuponera Virtual";
	include_once '../header.php';
?>

<div class="content-wrapper">

	<div class="box-title">
		<h2>Añadir Categoría</h2>
	</div>

	<div class="content-in">

		<div class="box-full">
		<form action="_add-categorias.php" method="POST">
			<input type="text" name="cat_id" hidden="">

			<dl>
				<dd>Nombre de la categoría</dd>
				<dt><input type="text" name="cat_nombre" required=""></dt>
			</dl>

			<dl>
				<dd>Alias de la categoría</dd>
				<dt><input type="text" name="cat_alias" required=""></dt>
			</dl>


			<dl>
				<dd>URL imagen del ícono</dd>
				<dt><input type="text" name="cat_icon" required=""></dt>
			</dl>

			<dl>
				<dd>Orden</dd>
				<dt><input type="text" name="cat_orden" value="99"></dt>
			</dl>

			<dl>
				<dd>Estado</dd>
				<dt>
					<select name="cat_estado" id="" required="">
						<option value="">-- Selecciona --</option>
						<option value="1">Activo</option>
						<option value="0">Inactivo</option>
					</select>
				</dt>
			</dl>

			<div class="box-btn txt-center mtop-30">
				<input type="submit" value="Añadir" class="btn-principal btn btn-medium">
				<a href="" class="btn btn-principal-linea btn-medium">Cancelar</a>
			</div>

		</form>
		</div>

	</div>



</div>

<?php include_once '../footer.php'; ?>