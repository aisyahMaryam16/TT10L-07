<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/dashboard/');
	exit;
?>
<<<<<<< HEAD
Something is wrong with the XAMPP installation :-(
=======
Something is wrong with the XAMPP installation :-(
>>>>>>> 654a9171881d4933d39ad8031d82cd87990ddb6c
