<?php 
	$title = "Agregar Usuario | Administrador Cuponera Virtual";
	include_once '../header.php';
?>

<div class="content-wrapper">

	<div class="box-title">
		<h2>Añadir Usuario</h2>
	</div>

	<div class="content-in">

		<div class="box-full">
		<form action="_add-user.php" method="POST">
			<input type="text" name="cat_id" hidden="">

			<dl>
				<dd>Tipo de usuario</dd>
				<dt><select name="user_tipo_cliente" id="" required="">
						<option value="POSTPAGO">POSTPAGO</option>
						<option value="PREPAGO">PREPAGO</option>
						<option value="COLABORADOR">COLABORADOR</option>
					</select></dt>
			</dl>
			<dl>
				<dd>Tipo de Documento</dd>
				<dt><select name="user_tdoc" id="" required="">
						<option value="DNI">DNI</option>
						<option value="CE">CE</option>
						<option value="PASAPORTE">PASAPORTE</option>
						<option value="RUC">RUC</option>
					</select></dt>
			</dl>

			<dl>
				<dd>Número de Documento</dd>
				<dt><input type="text" name="user_ndoc" required=""></dt>
			</dl>


			<dl>
				<dd>Segmento</dd>
				<dt><select name="seg_nombre" id="" required="">
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="C">C</option>
					</select></dt>
			</dl>

			<dl>
				<dd>Nombres</dd>
				<dt><input type="text" name="user_nombres" value="" required=""></dt>
			</dl>
			<dl>
				<dd>Apellidos</dd>
				<dt><input type="text" name="user_apellidos" value="" required=""></dt>
			</dl>

			<dl>
				<dd>Email</dd>
				<dt><input type="text" name="user_email" value="" ></dt>
			</dl>
			<dl>
				<dd>Estado</dd>
				<dt>
					<select name="user_estado" id="" required="">
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