<?php 
	$title = "Departamentos | Administrador Tienda Postpago";
	include_once '../header.php';
	include_once '../modelos/departamentosModelos.php';

	$departamentos = getAllDepartamentos();
?>

<div class="content-wrapper">

	<div class="box-title">
		<h2>Departamentos</h2>
	</div>

	<div class="content-in">

		<div class="box-content-top">
			<div class="box-content-top-right">
				<span>¿Qué necesitas?</span>
				<a href="departamentos-new.php" class="btn btn-principal btn-medium"><i class="fa fa-plus"></i> Añadir departamento</a>
			</div>
		</div>

		<table id="lista-departamentos" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th width="5%">ID</th>
					<th width="25%">Nombre</th>
					<th width="10%">Alias</th>
					<th width="30%" class="txt-center">Estado</th>
					<th width="30%">Opciones</th>
				</tr>
			</thead>

			<tbody>
			<?php foreach ($departamentos as $departamento) { ?>
				<tr>
					<td><?php echo $departamento['dep_id']; ?></td>
					<td><?php echo $departamento['dep_nombre']; ?></td>
					<td><?php echo $departamento['dep_alias']; ?></td>
					<td class="txt-center">
						<?php if ($departamento['dep_estado'] == '1') { ?>
							<span class="on">Activo</span>
						<?php } else { ?>
							<span class="off">Inactivo</span>
						<?php } ?>
					</td>
					<td>
						<a href="departamentos-edit.php?dep_id=<?php echo $departamento['dep_id']; ?>" class="btn btn-principal btn-regular"><i class="fa fa-pencil"></i> Editar</a>
						<a href="_delete-departamento.php?dep_id=<?php echo $departamento['dep_id']; ?>" onclick="return confirm('¿Estás seguro? No hay marcha atrás')" class="btn btn-principal-linea btn-regular"><i class="fa fa-trash"></i> Borrar</a>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>



</div>

<?php include_once '../footer.php'; ?>