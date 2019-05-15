<?php 
	
	require_once './vendor/autoload.php';
	require_once './php/controlUsuarios.funcs.php';
	require_once './php/BaseDeDatosRecomendadorLibros.inc.php';
	$loader = new \Twig\Loader\FilesystemLoader('.');
	$twig = new \Twig\Environment($loader);
	

	$argumentos = controlDeUsuarios();

	if(isset($_POST["action"]) && $_POST["action"]==="insertarUsuario"){
		if(isset($_POST["nombre"]))
			$nombre = $_POST["nombre"];
		if(isset($_POST["apellidos"]))
			$apellidos = $_POST["apellidos"];
		if(isset($_POST["edad"]))
			$edad = $_POST["edad"];
		if(isset($_POST["email"]))
			$email = $_POST["email"];
		if(isset($_POST["password"]))
			$password = $_POST["password"];

		$sql = "INSERT INTO `usuario`(`email`, `nombre`, `apellidos`, `pass`, `edad`) VALUES ('$email', '$nombre', '$apellidos', '$password', $edad)";
		echo $sql;
		$resultado =  BaseDeDatosRecomendadorLibros::insertar($sql);
		
	}


	$template = $twig -> load('./templates/html/altausuario.html');
	
	echo $template -> render($argumentos);
	
 ?>