<?php 
	
	require_once './vendor/autoload.php';
	require_once './php/controlUsuarios.funcs.php';
	require_once './php/LibroDAO.class.php';

	$loader = new \Twig\Loader\FilesystemLoader('.');
	$twig = new \Twig\Environment($loader);
	$argumentos = controlDeUsuarios();
	if(isset($_SESSION["nombreUsuario"])){
		$argumentos["libros"] = LibroDAO::getUltimosLibros(20);
		$template = $twig -> load('./templates/html/mislibros.html');
		$argumentos["librosLeidos"] = LibroDAO::getLibrosFromUser($_SESSION["email"], 20);
	}else{
		$template = $twig -> load('./templates/html/noPermisos.html');
	}
	echo $template -> render($argumentos);
	
 ?>