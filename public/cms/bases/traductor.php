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
					<th>Tipo cliente</th>
					<th>Tipo documento</th>
					<th>Número documento</th>
					<th class="txt-center">Segmento</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>E-mail</th>
				</tr>
			</thead>
		
			<tbody>

			<?php if (!empty($usuarios)) { ?>
			

			<?php foreach ($usuarios as $usuario) { ?>
				<tr>

					<td class="txt-center"><?php echo $usuario['user_tipo_cliente']; ?></td>
					<td class="txt-center"><?php echo $usuario['user_tdoc']; ?></td>
					<td class="txt-center"><?php echo $usuario['user_ndoc']; ?></td>
					<td class="txt-center"><?php echo $usuario['seg_nombre']; ?></td>
					<td class="txt-center"><?php echo $usuario['user_nombres']; ?></td>
					<td class="txt-center"><?php echo $usuario['user_apellidos']; ?></td>
					<td class="txt-center"><?php echo $usuario['user_email']; ?></td>

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