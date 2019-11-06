<?php 
	$title = "Agregar departamento | Administrador Cuponera Virtual";
	include_once '../header.php';
	include_once '../modelos/departamentosModelos.php';

	
	$dep_id = $_GET['dep_id'];
	$message = $_GET['message'];

	$departamento = getUnDepartamento($dep_id);
?>

<div class="content-wrapper">

	<div class="box-title">
		<h2><a href="departamentos-list.php">Departamentos</a> &raquo; Editar Departamento: <?php echo $departamento[0]['dep_nombre']; ?></h2>
	</div>

	<div class="content-in">

		<?php if ($message == 'true') { ?>
		<div class="message success" id="message" style="width:100%;">
			<p>El campo ha sido actualizado con éxito. <a href="departamentos-list.php"><i class="fa fa-times" aria-hidden="true"></i> Volver</a></p>
		</div>
		<?php } ?>

		<div class="box-full">
		<form action="_edit-departamento.php" method="POST">
			<input type="text" name="dep_id" value="<?php echo $departamento[0]['dep_id']; ?>" hidden="">

			<dl>
				<dd>Nombre</dd>
				<dt><input type="text" name="dep_nombre" value="<?php echo $departamento[0]['dep_nombre']; ?>" required=""></dt>
			</dl>

			<dl>
				<dd>Nombre</dd>
				<dt><input type="text" name="dep_alias" value="<?php echo $departamento[0]['dep_alias']; ?>" required=""></dt>
			</dl>

			<dl>
				<dd>Estado</dd>
				<dt>
					<select name="dep_estado" id="" required="">
						<option value="<?php echo $departamento[0]['dep_estado']; ?>"><?php if ($departamento[0]['dep_estado'] == '1') { ?> Activo <?php } else { ?> Inactivo <?php } ?></option>
						<option disabled="">----------</option>
						<option value="1">Activo</option>
						<option value="0">Inactivo</option>
					</select>
				</dt>
			</dl>

			<div class="box-btn txt-center mtop-30">
				<input type="submit" value="Guarda cambio" class="btn-principal btn btn-medium">
				<a href="departamentos-list.php" class="btn btn-principal-linea btn-medium">&laquo; Volver</a>
			</div>

		</form>
		</div>

	</div>



</div>

<?php include_once '../footer.php'; ?>