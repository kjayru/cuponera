<?php 
	$title = "Segmentos | Administrador Tienda Postpago";
	include_once '../header.php';
	include_once '../modelos/segmentosModelos.php';

	$segmentos = getAllsegmentos();
?>

<div class="content-wrapper">

	<div class="box-title">
		<h2>Segmentos</h2>
	</div>

	<div class="content-in">

		<div class="box-content-top">
			<div class="box-content-top-right">
				<span>¿Qué necesitas?</span>
				<a href="segmentos-new.php" class="btn btn-principal btn-medium"><i class="fa fa-plus"></i> Añadir segmento</a>
			</div>
		</div>

		<table class="table table-striped table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th width="5%">ID</th>
					<th width="30%">Nombre</th>
					<th width="35%" class="txt-center">Estado</th>
					<th width="30%">Opciones</th>
				</tr>
			</thead>

			<tbody>
			<?php foreach ($segmentos as $segmento) { ?>
				<tr>
					<td><?php echo $segmento['seg_id']; ?></td>
					<td><?php echo $segmento['seg_nombre']; ?></td>
					<td class="txt-center">
						<?php if ($segmento['seg_estado'] == '1') { ?>
							<span class="on">Activo</span>
						<?php } else { ?>
							<span class="off">Inactivo</span>
						<?php } ?>
					</td>
					<td>
						<a href="segmentos-edit.php?seg_id=<?php echo $segmento['seg_id']; ?>" class="btn btn-principal btn-regular"><i class="fa fa-pencil"></i> Editar</a>
						<a href="_delete-segmento.php?seg_id=<?php echo $segmento['seg_id']; ?>" onclick="return confirm('¿Estás seguro? No hay marcha atrás')" class="btn btn-principal-linea btn-regular"><i class="fa fa-trash"></i> Borrar</a>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>



</div>

<?php include_once '../footer.php'; ?>