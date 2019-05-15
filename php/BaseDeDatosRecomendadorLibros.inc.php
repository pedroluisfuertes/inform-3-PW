<?php

require_once 'php/BaseDeDatos.inc.php';


class BaseDeDatosRecomendadorLibros
{
	
	private static $baseDeDatos;
	private static $conexion;

	function __destrct()
	{
		unset(self::$conexion);
		unset(self::$baseDeDatos);
	}

	public static function getConexion() {

		if(! self::$baseDeDatos){
			self::$baseDeDatos = new BaseDeDatos("localhost", "PW", "6M5f9hZ2CFSAkYRk", "recomendacionlibros");
			self::$conexion = self::$baseDeDatos -> getConexion();

			if(! self::$conexion)
				die("Conexión fallida: ");
		}
		
		return self::$conexion; 

	}

	public static function consulta($sql) {
		$resultado = [];
		//$sql = mysqli_real_escape_string($sql);
		if($consulta = self::getConexion() -> query($sql)) {
			while($obj = $consulta -> fetch_object()) {
				array_push($resultado, $obj);
			}
			//mysql_free_result($consulta);
		}
		
		return $resultado;
	}

	public static function insertar($sql) {
		return self::getConexion() -> query($sql);
	}

	
}
	
?>
