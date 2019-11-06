<?php 
	$title = "Empresas | Administrador Tienda Postpago";
	include_once '../header.php';
	include_once '../modelos/empresasModelos.php';

	$empresas = getAllEmpresas();
?>

<div class="content-wrapper">

	<div class="box-title">
		<h2>Empresas</h2>
	</div>

	<div class="content-in">

		<div class="box-content-top">
			<div class="box-content-top-right">
				<span>¿Qué necesitas?</span>
				<a href="empresas-new.php" class="btn btn-principal btn-medium"><i class="fa fa-plus"></i> Crear nueva empresa</a>
			</div>
		</div>

		<table id="lista-empresas" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th width="5%">ID</th>
					<th width="25%">Nombre empresa</th>
					<th width="15%" class="txt-center">Logo</th>
					<th width="20%" class="txt-center">Estado</th>
					<th width="25%" class="txt-center">Opciones</th>
				</tr>
			</thead>

			<tbody>
			<?php foreach ($empresas as $empresa) { ?>
				<tr>
					<td><?php echo $empresa['emp_id']; ?></td>
					<td><?php echo $empresa['emp_nombre']; ?></td>
					<td class="txt-center"><img src="<?php echo $empresa['emp_logo']; ?>" alt="<?php echo $empresa['emp_logo']; ?>" width="50px" height="50px"></td>
					<td class="txt-center">
						<?php if ($empresa['emp_estado'] == '1') { ?>
							<span class="on">Activo</span>
						<?php } else { ?>
							<span class="off">Inactivo</span>
						<?php } ?>
					</td>
					<td class="txt-center">
						<a href="empresas-edit.php?emp_id=<?php echo $empresa['emp_id']; ?>" class="btn btn-principal btn-regular"><i class="fa fa-pencil"></i> Editar</a>
						<a href="_delete-empresa.php?emp_id=<?php echo $empresa['emp_id']; ?>" onclick="return confirm('¿Estás seguro? No hay marcha atrás')" class="btn btn-principal-linea btn-regular"><i class="fa fa-trash"></i> Borrar</a>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>



</div>

<?php include_once '../footer.php'; ?>