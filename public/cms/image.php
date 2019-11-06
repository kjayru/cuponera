<?php 

	//set_time_limit(0);
	$connection = ftp_connect('waws-prod-blu-059.ftp.azurewebsites.windows.net');
	$login = ftp_login($connection, 'cuponeraclaro\$cuponeraclaro', '7JsiLFsicrjXyLcJvcw1gfKMyvBHr7gpSRxs8fRjFeqQ8gH0HXHS8hkWvjY2');

	if (!$connection) {
		die('Connection attempt failed!');

	} else {
		echo "connection passed";

	} if (!$login) {
		die('Login attempt failed!');

	} else {
		echo "login passed";

	}
	
	ftp_pasv($connection, true);

	$source = "img/image.jpg";
	$dest = "/site/wwwroot/img/prueba/image.jpg";
	
	//$x = substr($dest,-4);
	// echo $x;</p>
	if((substr($dest,-4) == ".jpg") || (substr($dest,-4) == ".png") ) {
	//no problems;
	} else {
		die('only jpg or png.');
	}

	$upload = ftp_put($connection, $dest, $source, FTP_BINARY);
	if (!$upload) { echo 'FTP upload failed!'; } else {echo "ftp upload passed";}
	ftp_close($connection);

?>