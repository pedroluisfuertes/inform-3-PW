<?php

class BaseDeDatos
{
	
	private $conexion;
	private $server;
	private	$user;
	private	$password;
	private	$baseDeDatos;

	function __construct($serverp, $userp, $passwordp, $baseDeDatosp)
	{
		$this->server = $serverp;
		$this->user = $userp;
		$this->password = $passwordp;
		$this->baseDeDatos = $baseDeDatosp;
	}

	function __destrct()
	{
		unset($conexion);
		unset($server);
		unset($user);
		unset($password);
		unset($baseDeDatos);
	}

	public function getConexion() {
		if(! $this->conexion){
			$this->conexion = new mysqli($this->server, $this->user, $this->password, $this->baseDeDatos);
		
			if(! $this->conexion)
				die("Conexión fallida: ");
			$this->conexion->set_charset("utf8");
		}
		
		return $this->conexion; 

	}

	
}
	
?>
