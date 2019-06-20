<?php 
	
	require_once './vendor/autoload.php';
	require_once './php/controlUsuarios.funcs.php';
	require_once './php/LibroDAO.class.php';
	
	$loader = new \Twig\Loader\FilesystemLoader('.');

	$twig = new \Twig\Environment($loader);
	
	$argumentos = controlDeUsuarios();
	if(isset($_SESSION["nombreUsuario"])){
		if(isset($_GET["idLibro"])){
			$argumentos["libro"] = LibroDAO::getLibro($_GET["idLibro"]);
			$argumentos["cometarios"] = LibroCometariosDAO::getComentariosFromLibro($_GET["idLibro"]);
			$valoracionMedia = 0;

			for($i = 0; $i<count($argumentos["cometarios"]); $i++){
				$valoracionMedia += $argumentos["cometarios"][$i]->getValoracion();
			}
			$argumentos["numValoraciones"] = count($argumentos["cometarios"]);
			$valoracionMedia = $valoracionMedia / $argumentos["numValoraciones"];
			$argumentos["valoracionMedia"] = $valoracionMedia; 

			//var_dump($argumentos["cometarios"] );
		}
		$template = $twig -> load('./templates/html/libro.html');
	}else{
		$template = $twig -> load('./templates/html/noPermisos.html');
	}

	
	echo $template -> render($argumentos);
	
 ?>