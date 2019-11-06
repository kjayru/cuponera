<?php 
	$title = "Categorías | Administrador Cuponera Virtual";
	include_once '../header.php';
	include_once '../modelos/categoriasModelos.php';

	$categorias = getAllCategorias();
	$message = $_GET['message'];
?>

<script>
	$( document ).ready(function() {
		var fixHelperModified = function(e, tr) {
			var $originals = tr.children();
			var $helper = tr.clone();
			$helper.children().each(function(index) {
				$(this).width($originals.eq(index).width())
			});

			return $helper;
		},

		updateIndex = function(e, ui) {
			$('td.index input', ui.item.parent()).each(function (i) {
				//$(this).html(i + 1);
				$(this).val(i + 1);
			});
		};

		$("tbody").sortable({
			helper: fixHelperModified,
			stop: updateIndex
		}).disableSelection();
	});
</script>

<div class="content-wrapper">

	<div class="box-title">
		<h2><a href="categorias-list.php">Categorias </a>&raquo; Ordenar categorias</h2>
	</div>

	<div class="content-in">

	<?php if ($message == 'true') { ?>
	<div class="message success" id="message" style="width:100%;">
		<p>Se realizó la modificación con éxito. <a href="categorias-list.php"><i class="fa fa-times" aria-hidden="true"></i> Volver</a></p>
	</div>
	<?php } ?>

	<div style="width: 70%; margin: 0 15%"> 

		<form action="_update-order-categorias.php" method="POST">
		<table class="table table-striped table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th></th>
					<th width="35%">Nombre</th>
					<th width="35%">Alias</th>
					<th width="30%" class="txt-center">Orden</th>
				</tr>
			</thead>

			<tbody>
			<?php foreach ($categorias as $categoria) { ?>
				<tr>
					<td><span class="ui-icon ui-icon-arrowthick-2-n-s"></td>
					<td style="display: none;"><input type="text" name="cat_id[]" value="<?php echo $categoria['cat_id']; ?>" hidden></td>
					<td><?php echo $categoria['cat_nombre']; ?><input type="text" name="cat_nombre[]" value="<?php echo $categoria['cat_nombre']; ?>" hidden></td>
					<td><?php echo $categoria['cat_alias']; ?><input type="text" name="cat_alias[]" value="<?php echo $categoria['cat_alias']; ?>" hidden></td>
					<td style="display: none;"><input type="text" name="cat_icon[]" value="<?php echo $categoria['cat_icon']; ?>" hidden></td>
					<td class="index"><input type="text" name="cat_orden[]" value="<?php echo $categoria['cat_orden']; ?>"></td>
					<td style="display: none;"><input type="text" name="cat_estado[]" value="<?php echo $categoria['cat_estado']; ?>" hidden></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>

		<div class="box-btn txt-center mtop-30">
			<input type="submit" class="btn-principal btn btn-medium" value="Guardar cambios">
			<a href="categorias-list.php" class="btn btn-principal-linea btn-medium">&laquo; Volver</a>
		</div>
		</form>

	</div>
	</div>
</div>

<?php include_once '../footer.php'; ?>