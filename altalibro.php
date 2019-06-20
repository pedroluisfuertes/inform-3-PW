<?php 
	
	require_once './vendor/autoload.php';
	require_once './php/controlUsuarios.funcs.php';
	require_once './php/LibroDAO.class.php';
	$loader = new \Twig\Loader\FilesystemLoader('.');
	$twig = new \Twig\Environment($loader);
	
	$argumentos = controlDeUsuarios();

	//Si me envían un formulario, lo añado
	if(isset($_POST["action"]) && $_POST["action"]==="insertarLibro" && isset($_SESSION["email"])){
		
		if(isset($_POST["titulo"]))
			$titulo = $_POST["titulo"];

		if(isset($_POST["autor"]))
			$autor = $_POST["autor"];

		if(isset($_POST["editorial"]))
			$editorial = $_POST["editorial"];

		if(isset($_POST["ano"]))
			$fecha_publicacion = $_POST["ano"];

		if(isset($_POST["edicion"]))
			$edicion = $_POST["edicion"];

		if(isset($_POST["descripcion"]))
			$descripcion = $_POST["descripcion"];

		if(isset($_POST["opinion"]))
			$opinion = $_POST["opinion"];

		if(isset($_POST["valoracion"]))
			$valoracion = $_POST["valoracion"];


		$email = $_SESSION["email"];
		//var_dump($_POST);

		$idLibro = LibroDAO::addLibro($titulo, $autor, $editorial, $fecha_publicacion, $edicion, $descripcion, $email);
		if(LibroCometariosDAO::addComentario($idLibro, $email, $opinion, $valoracion)){
			$argumentos["mensaje"] = "<p>Se ha añadido el libro correctamente</p>";
 		}else{
			$argumentos["mensaje"] = "<p>No se ha podido añadir el libro</p>";
 		}
		
	}

	$template = $twig -> load('./templates/html/altalibro.html');
	
	echo $template -> render($argumentos);
	
 ?>