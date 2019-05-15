<?php 
	require_once './php/BaseDeDatosRecomendadorLibros.inc.php';
	
	function controlDeUsuarios()
	{
		session_start();
		$argumentos = [];
		/*
			Iniciamos sesión
		*/
 		if(isset($_POST["action"]) && $_POST["action"]==="login"){

			//var_dump($sql); 

			if(isset($_POST["email"]) && isset($_POST["password"])){

				$email = $_POST["email"];
				$password = $_POST["password"];
				$sql = "SELECT nombre, apellidos  FROM usuario WHERE email='$email' AND pass=$password";
				//echo $sql;
				$resultado = BaseDeDatosRecomendadorLibros::consulta($sql);
				if($resultado){
					$_SESSION["nombreUsuario"] = $resultado[0]->nombre . " " . $resultado[0]->apellidos;
					$_SESSION["email"] = $email;

				}else
					$argumentos["mensajeLogin"] = "Usuario y/o contraseña incorrecto.";

			}else{
					$argumentos["mensajeLogin"] = "No se han recibido correctamente los parámetros.";
			}

		}

		/*
			CerramosSesión
		*/
		if(isset($_POST["action"]) && $_POST["action"] === "logout"){
			if (session_status()==PHP_SESSION_NONE)
			session_start();
			// Borrar variables de sesión
			session_unset(); 
			// Obtener parámetros de cookie de sesión
			$param = session_get_cookie_params();
			// Borrar cookie de sesión
			setcookie(session_name(), $_COOKIE[session_name()], time()-2592000,
			$param['path'], $param['domain'], $param['secure'], $param['httponly']);
			// Destruir sesión
			session_destroy();
		}
		if (isset($_SESSION["nombreUsuario"])) {
			$argumentos["nombreUsuario"] = $_SESSION["nombreUsuario"];
		}
		return $argumentos; 
	}

 ?>