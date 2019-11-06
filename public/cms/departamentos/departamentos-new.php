<?php 
	$title = "Agregar departamento | Administrador Cuponera Virtual";
	include_once '../header.php';
?>

<div class="content-wrapper">

	<div class="box-title">
		<h2><a href="departamentos-list.php">Departamentos</a> &raquo; Añadir Departamento</h2>
	</div>

	<div class="content-in">

		<div class="box-full">
		<form action="_add-departamento.php" method="POST">
			<input type="text" name="dep_id" hidden="">

			<dl>
				<dd>Nombre</dd>
				<dt><input type="text" name="dep_nombre" required=""></dt>
			</dl>

			<dl>
				<dd>Alias</dd>
				<dt><input type="text" name="dep_alias" required=""></dt>
			</dl>

			<dl>
				<dd>Estado</dd>
				<dt>
					<select name="dep_estado" id="" required="">
						<option value="">-- Selecciona --</option>
						<option value="1">Activo</option>
						<option value="0">Inactivo</option>
					</select>
				</dt>
			</dl>

			<div class="box-btn txt-center mtop-30">
				<input type="submit" value="Añadir" class="btn-principal btn btn-medium">
				<a href="departamentos-list.php" class="btn btn-principal-linea btn-medium">Cancelar</a>
			</div>

		</form>
		</div>

	</div>



</div>

<?php include_once '../footer.php'; ?>