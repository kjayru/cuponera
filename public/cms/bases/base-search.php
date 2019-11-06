<?php 
	$title = "Busqueda de usuarios | Administrador Cuponera Virtual";
	include_once '../header.php';
	include_once '../modelos/baseModelos.php';
if($_POST){
$user_ndoc = $_POST['user_ndoc'];
	$user_ndoc_tra=$_POST['user_ndoc_tra'];

}
	
	
	if (!empty($_POST['user_ndoc_tra'])){
		$usuarios = getUserTra($user_ndoc_tra);

	}else{
		$usuarios = getUser($user_ndoc);
	}
?>

<div class="content-wrapper">

	<div class="box-title">
		<h2>Buscar usuario</h2>
	</div>

	<div class="content-in">
	<div style="width: 90%; margin: 0 5%"> 

		<div class="box-filter-top">
		<form action="base-search.php" method="POST">
			
			<input type="text" name="user_ndoc" placeholder="Número de documento" style="width: 300px;float: left;margin-right: 15px;" required="">
			<input type="submit" name="submit" value="Buscar" class="btn btn-principal btn-medium">

		</form>
		</div>

		<div class="box-filter-top">
		<form action="base-search.php" method="POST">
			
			<input type="text" name="user_ndoc_tra" placeholder="Cliente" style="width: 300px;float: left;margin-right: 15px;" required="">
			<input type="submit" name="submit" value="Traductor" class="btn btn-principal btn-medium">

		</form>
		</div>
		<?php if(isset($_POST['submit'])) { ?>
		
		<table class="table table-striped table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>Tipo</th>
					<th>Documento</th>
					<th># Doc</th>
					<th class="txt-center">Segmento</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>E-mail</th>
					<th>Operaciones</th>

				</tr>
			</thead>
		
			<tbody>

			<?php if (!empty($usuarios)) { ?>
			

			<?php foreach ($usuarios as $usuario) { ?>
				<tr>
					<td class="txt-center"><?php echo $usuario['user_auto']; ?></td>
					<td class="txt-center"><?php echo $usuario['user_tipo_cliente']; ?></td>
					<td class="txt-center"><?php echo $usuario['user_tdoc']; ?></td>
					<td class="txt-center"><?php echo $usuario['user_ndoc']; ?></td>
					<td class="txt-center"><?php echo $usuario['seg_nombre']; ?></td>
					<td class="txt-center"><?php echo $usuario['user_nombres']; ?></td>
					<td class="txt-center"><?php echo $usuario['user_apellidos']; ?></td>
					<td class="txt-center"><?php echo $usuario['user_email']; ?></td>
					<td>

						<!--<a href="_edit-user.php?id=<?php echo $usuario['user_auto']; ?>" class="btn btn-principal btn-small" style="margin-bottom: 10px;"><i class="fa fa-pencil"></i> Editar</a>-->


						<a href="_delete-user.php?id=<?php echo $usuario['user_auto']; ?>" onclick="return confirm('¿Estás seguro? No hay marcha atrás')" class="btn btn-principal-linea btn-small"><i class="fa fa-trash"></i> Borrar</a></td>

				</tr>
			<?php } ?>


			<?php } else { ?>


				<th>
					<td colspan="4">No se ha encontrado el número de documento</td>
				</th>


			<?php } ?>
			</tbody>
		</table>

		<?php } ?>

	</div>
	</div>
</div>

<?php include_once '../footer.php'; ?>