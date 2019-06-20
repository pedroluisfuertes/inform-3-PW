<?php 
	
	require_once './vendor/autoload.php';
	require_once './php/controlUsuarios.funcs.php';
	require_once './php/LibroDAO.class.php';
	$loader = new \Twig\Loader\FilesystemLoader('.');
	$twig = new \Twig\Environment($loader);
	
	$argumentos = controlDeUsuarios();
	if(isset($_SESSION["nombreUsuario"])){
		$argumentos["libros"] = LibroDAO::getLibrosFromUser($_SESSION["email"]);
		if(isset($_POST["action"]) && $_POST["action"]==="modificarUsuario"){
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
			$sql = "UPDATE `usuario` SET `email`='$email',`nombre`='$nombre',`apellidos`='$apellidos',`pass`='$password',`edad`=$edad WHERE email like '$email'";
			//echo $sql;
			$resultado =  BaseDeDatosRecomendadorLibros::insertar($sql);
			if($resultado){
				$argumentos["modificacionMensaje"] 		= "Tus datos se han modificado correctamente.";
				$_SESSION["email"] = $email;
				$_SESSION["nombreUsuario"] = $nombre . " " . $apellidos;
				$argumentos["nombreUsuario"] = $_SESSION["nombreUsuario"];
			}else{
				$argumentos["modificacionMensaje"] 		= "Ha habido un problema a la hora de modificar los datos. ";

			}
		}

		if (isset($_SESSION["email"])) {
			$email = $_SESSION["email"]; 
			$sql = "SELECT email, nombre, apellidos, pass, edad FROM usuario WHERE email='$email'";
			//echo $sql;
			$resultado = BaseDeDatosRecomendadorLibros::consulta($sql);
			if($resultado){
				$argumentos["email"] 		= $resultado[0] -> email;
				$argumentos["nombre"] 		= $resultado[0] -> nombre;  
				$argumentos["apellidos"] 	= $resultado[0] -> apellidos;  
				//$argumentos["pass"] 		= $resultado[0] -> pass;  
				$argumentos["edad"] 		= $resultado[0] -> edad;  
			}
		}else{
				$argumentos["modificacionMensaje"] 		= "Error al obtener tus datos.";
		}
		$template = $twig -> load('./templates/html/datospersonales.html');
	}else{
		$template = $twig -> load('./templates/html/noPermisos.html');
	}
	
	
	echo $template -> render($argumentos);
 ?>