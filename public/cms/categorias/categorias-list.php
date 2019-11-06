<?php 
	$title = "Categorías | Administrador Cuponera Virtual";
	include_once '../header.php';
	include_once '../modelos/categoriasModelos.php';

	$categorias = getAllCategorias();
?>

<div class="content-wrapper">

	<div class="box-title">
		<h2>Categorias</h2>
	</div>

	<div class="content-in">

		<div class="box-content-top">
			<div class="box-content-top-right">
				<span>¿Qué necesitas?</span>
				<a href="categorias-new.php" class="btn btn-principal btn-medium"><i class="fa fa-plus"></i> Crear nueva categoría</a>
				<a href="categorias-list-order-edit.php" class="btn btn-principal-linea btn-medium"><i class="fa fa-sort" aria-hidden="true"></i> Ordenar las categorías</a>
			</div>
		</div>

		<table id="lista-categorias" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th width="5%">Orden</th>
					<th width="15%">Nombre</th>
					<th width="15%">Alias</th>
					<th width="15%">Ícono</th>
					<th width="25%" class="txt-center">Estado</th>
					<th width="20%">Opciones</th>
				</tr>
			</thead>

			<tbody>
			<?php foreach ($categorias as $categoria) { ?>
				<tr>
					<td><?php echo $categoria['cat_orden']; ?></td>
					<td><?php echo $categoria['cat_nombre']; ?> <span class="tag-id">(id: <?php echo $categoria['cat_id']; ?>)</span></td>
					<td><?php echo $categoria['cat_alias']; ?></td>
					<td><?php echo $categoria['cat_icon']; ?></td>
					<td class="txt-center">
						<?php if ($categoria['cat_estado'] == '1') { ?>
							<span class="on">Activo</span>
						<?php } else { ?>
							<span class="off">Inactivo</span>
						<?php } ?>
					</td>
					<td>
						<a href="categorias-edit.php?cat_id=<?php echo $categoria['cat_id']; ?>" class="btn btn-principal btn-regular"><i class="fa fa-pencil"></i> Editar</a>
						<a href="_delete-categorias.php?cat_id=<?php echo $categoria['cat_id']; ?>" onclick="return confirm('¿Estás seguro? No hay marcha atrás')" class="btn btn-principal-linea btn-regular"><i class="fa fa-trash"></i> Borrar</a>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>



</div>

<?php include_once '../footer.php'; ?>