<?php 
	
	require_once './vendor/autoload.php';
	
	$loader = new \Twig\Loader\FilesystemLoader('.');

	$twig = new \Twig\Environment($loader);
	


	$template = $twig -> load('./templates/html/libroleido.html');
	
	echo $template -> render();
	
 ?>