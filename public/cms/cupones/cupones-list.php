<?php 
	$title = "Cupones | Administrador Cuponera Virtual";
	include_once '../header.php';
	include_once '../modelos/cuponesModelos.php';

	$cupones = getCupones();
?>

<div class="content-wrapper">

	<div class="box-title">
		<h2>Cupones</h2>
	</div>

	<div class="content-in">

		<div class="box-content-top">
			<div class="box-content-top-right">
				<span>¿Qué necesitas?</span>
				<a href="cupones-new.php" class="btn btn-principal btn-medium"><i class="fa fa-plus"></i> Crear nuevo cupón</a>
			</div>
		</div>

		<table id="lista-cup" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th width="5%">ID</th>
					<th width="15%">Empresa</th>
					<th width="35%">Título cupón</th>
					<th width="10%" class="txt-center">Estado</th>
					<th width="10%">Categoría</th>
					<th width="25%" class="txt-center">Opciones</th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($cupones as $cupon) { ?>
				<tr>
					<td><?php echo $cupon['cup_id']; ?></td>
					<td><?php echo $cupon['emp_nombre']; ?></td>
					<td><?php echo $cupon['cup_titulo']; ?></td>
					<td class="txt-center">
						<?php if ($cupon['cup_estado'] == '1') { ?>
							<span class="on">Activo</span>
						<?php } else { ?>
							<span class="off">Inactivo</span>
						<?php } ?>
					</td>
					<td><?php echo $cupon['cat_nombre']; ?></td>
					<td class="txt-center">
						<a href="cupones-edit.php?cup_id=<?php echo $cupon['cup_id']; ?>" class="btn btn-principal btn-small" style="margin-bottom: 10px;"><i class="fa fa-pencil"></i> Editar</a>
						<a href="cupones-galeria.php?cup_id=<?php echo $cupon['cup_id']; ?>" class="btn btn-principal btn-small" style="margin-bottom: 10px;"><i class="fa fa-picture-o"></i> Galería</a>
						<a href="_delete-cupon.php?cup_id=<?php echo $cupon['cup_id']; ?>" onclick="return confirm('¿Estás seguro? No hay marcha atrás')" class="btn btn-principal-linea btn-small"><i class="fa fa-trash"></i> Borrar</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>

		</table>
	</div>



</div>

<?php include_once '../footer.php'; ?>