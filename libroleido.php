<?php 
	
	require_once './vendor/autoload.php';
	require_once './php/controlUsuarios.funcs.php';
	$loader = new \Twig\Loader\FilesystemLoader('.');
	$twig = new \Twig\Environment($loader);
	
	$argumentos = controlDeUsuarios();

	$template = $twig -> load('./templates/html/libroleido.html');
	
	echo $template -> render($argumentos);
	
 ?>