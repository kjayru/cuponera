<?php 
	$title = "Cupones a Departamento | Administrador Cuponera Virtual";
	include_once '../header.php';
	include_once '../modelos/cupon_departamentoModelos.php';

	$departamentos = getDepartamentos();
?>

<div class="content-wrapper">

	<div class="box-title">
		<h2>Asignar cupones a un departamento</h2>
	</div>

	<div class="content-in">

		<div class="box-content-top">
			<h2>Elige un departamento para agregarle cupones</h2>
		</div>

		<table class="table" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th width="15%" class="txt-center">ID</th>
					<th width="35" class="txt-center">Departamento</th>
					<th width="50%" class="txt-center">Opciones</th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($departamentos as $departamento) { ?>
				<tr>
					<td class="txt-center"><?php echo $departamento['dep_id']; ?></td>
					<td class="txt-center"><?php echo $departamento['dep_nombre']; ?></td>
					<td class="txt-center">
						<a href="departamento-agregar.php?dep_id=<?php echo $departamento['dep_id']; ?>" class="btn btn-principal btn-small" style="margin-bottom: 10px;"><i class="fa fa-plus"></i> Agregar cupones</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>

		</table>
	</div>



</div>

<?php include_once '../footer.php'; ?>