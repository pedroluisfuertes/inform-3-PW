<?php 
	
	require_once './vendor/autoload.php';
	require_once './php/controlUsuarios.funcs.php';
	require_once './php/LibroDAO.class.php';
	$loader = new \Twig\Loader\FilesystemLoader('.');
	$twig = new \Twig\Environment($loader);
	$argumentos = controlDeUsuarios();

	$template = $twig -> load('./templates/html/index.html');
	//$argumentos["nombreUsuario"] = "Pedro";
	$argumentos["libros"] = LibroDAO::getLibros();
	//$argumentos["libros"][1]->get_Autor(5, 6); 
	//var_dump($argumentos["libros"]); 
	echo $template -> render($argumentos);
	//echo $template -> render();
	
 ?>