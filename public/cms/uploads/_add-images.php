<?php 	
	$title = "Subir imágenes | Administrador Cuponera Virtual";
	include_once '../header.php';
	include_once '../modelos/uploadsModelos.php';
	date_default_timezone_set('America/Lima');

	//set_time_limit(0);
	
	
	//$connection = ftp_connect('waws-prod-blu-059.ftp.azurewebsites.windows.net');
	//$login = ftp_login($connection, 'cuponeraclaro\$cuponeraclaro', 'ofKCsmAlg6q1u9iZiXnhHn3k7jsDARFSDwTxTTwdNF0nK42sKdEuiselP89d');

	/*if (!$connection) {
		die('Connection attempt failed!');

	} else {
		echo "connection passed";

	} if (!$login) {
		die('Login attempt failed!');

	} else {
		echo "login passed";

	}*/
	
	//ftp_pasv($connection, true);

	//echo "<pre>";
	
	//echo "</pre>";

	$upload=false;
	foreach($_FILES['image']['tmp_name'] as $key => $tmp_name ){
		$file = $_FILES['image']['tmp_name'][$key];
		$file_size = $_FILES['image']['size'][$key];
		$file_type = $_FILES['image']['type'][$key];
		$file_name = $_FILES['image']['name'][$key];
		$img_tipo = $_POST['img_tipo'];

		$source = $_FILES["image"]["tmp_name"][$key];
		
		
		if ($img_tipo == 'logo') {
			$dir_subida =  '../imagenes/logo/';
			$fichero_subido = $dir_subida.basename($file_name);

			if (move_uploaded_file($source, $fichero_subido)) {
				echo "El fichero es válido y se subió con éxito.\n";
				$upload = true;
			} 
		}
		
		if ($img_tipo == 'imagen') {
			$dir_subida = '../imagenes/cupon/';
			$fichero_subido = $dir_subida.basename($file_name);

			if (move_uploaded_file($source, $fichero_subido)) {
				echo "El fichero es válido y se subió con éxito.\n";
				$upload = true;
			}
		}

		$img_upload_date = date('Y-m-d H:i:s');

		/*$upload = ftp_put($connection, $dest, $source, FTP_BINARY);*/

		addImage( $img_tipo, $file_name, $img_upload_date);

    }


	//////$source = "img/image.jpg";
	//////$dest = "/site/wwwroot/img/prueba/image.jpg";
	
	//$x = substr($dest,-4);
	// echo $x;</p>
	//////if((substr($dest,-4) == ".jpg") || (substr($dest,-4) == ".png") ) {
	//no problems;
	//////} else {
		//////die('only jpg or png.');
	//////}

	//$upload = ftp_put($connection, $dest, $source, FTP_BINARY);
	//if (!$upload) { echo 'FTP upload failed!'; } else {echo "ftp upload passed";}
?>

<div class="content-wrapper">

	<div class="box-title">
		<h2>Subir imágenes</h2>
	</div>

	<div class="content-in">
		
		<?php if (!$upload) { ?>
		<div class="box-success txt-center">
			<h2 class="mbottom-20">Lo sentimos!</h2>

			<i class="fa fa-smile-o fa-5x" aria-hidden="true"></i>

			<p class="mtop-20">Revisa el tamaño y formato y vuelve a intentarlo</p>

			<div class="box-btn mtop-30">
				<a href="upload-img.php" class="btn btn-principal btn-medium"><i class="fa fa-plus" aria-hidden="true"></i> Subir imágenes</a>
			</div>
		</div>
		<?php } else { ?>
		<div class="box-success txt-center">
			<h2 class="mbottom-20">Wow!</h2>

			<i class="fa fa-smile-o fa-5x" aria-hidden="true"></i>

			<p class="mtop-20">Has subido tus imágenes con éxito</p>

			<div class="box-btn mtop-30">
				<a href="upload-img.php" class="btn btn-principal btn-medium"><i class="fa fa-plus" aria-hidden="true"></i> Subir más imágenes</a>
				<a href="gallery-select.php" class="btn btn-principal btn-medium"><i class="fa fa-picture-o" aria-hidden="true"></i> Ver imágenes</a>
			</div>
		</div>
		<?php } ?>

	</div>



</div>

<?php include_once '../footer.php'; ?>

<?php// ftp_close($connection); ?>