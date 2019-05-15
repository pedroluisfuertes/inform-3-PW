<?php 
	
	require_once './vendor/autoload.php';
	require_once './php/controlUsuarios.funcs.php';
	$loader = new \Twig\Loader\FilesystemLoader('.');
	$twig = new \Twig\Environment($loader);
	$argumentos = controlDeUsuarios();

	$template = $twig -> load('./templates/html/index.html');
	//$argumentos["nombreUsuario"] = "Pedro";
	echo $template -> render($argumentos);
	//echo $template -> render();
	
 ?>