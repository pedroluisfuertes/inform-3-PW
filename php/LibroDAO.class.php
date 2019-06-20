<?php 
	require_once './php/BaseDeDatosRecomendadorLibros.inc.php';
	require_once './php/LibroVO.class.php';

	/**
	 create table if not exists libro (
	id int AUTO_INCREMENT,
	titulo varchar(256) CHARACTER SET utf8,
	autor varchar(256) CHARACTER SET utf8,
	editorial varchar(256) CHARACTER SET utf8,
	edicion int, 
	descripcion text CHARACTER SET utf8,
	idUsuario varchar(128), 
		PRIMARY KEY(id),
		FOREIGN KEY(idUsuario) references usuario(email)
         )

);
	 */
	class LibroDAO 
	{
		
		function __construct($param = FALSE)
		{
			
		}

		public function addLibro($titulo, $autor, $editorial, $fecha_publicacion, $edicion, $descripcion, $idUsuario)
		{

			$sql = "INSERT INTO libro(`titulo`, `autor`, `editorial`, `fecha_publicacion`, `edicion`, `descripcion`, `idUsuario`) VALUES ('$titulo', '$autor', '$editorial', '$fecha_publicacion', '$edicion', '$descripcion','$idUsuario')";
				//echo $sql;
				$resultado =  BaseDeDatosRecomendadorLibros::insertar($sql);
				if($resultado){

					$aux= BaseDeDatosRecomendadorLibros::consulta("SELECT id FROM `libro` ORDER BY id DESC limit 1;")[0] -> id;
					//var_dump($aux);
					return $aux; 
				}
				else
					return FALSE;

		}

		public function getLibrosFromUser($idUsuario){
			$sql = "SELECT * FROM libro WHERE idUsuario='$idUsuario'";
			$resultado = BaseDeDatosRecomendadorLibros::consulta($sql);
			$salida = [];
			for($i = 0; $i<count($resultado); $i++){
				$salida[$i] = new LibroVO($resultado[$i], TRUE);
			}
			return $salida;

		}

		public function getLibros(){
			$sql = "SELECT * FROM libro";
			$resultado = BaseDeDatosRecomendadorLibros::consulta($sql);
			//var_dump($resultado); 
			//echo $sql;
			$salida = [];
			new LibroVO(23, "inj", "sql", "das","",""); 
			for($i = 0; $i<count($resultado); $i++){
				/*echo get_class($resultado[$i]) . " ";
				$libro =  new LibroVO();
				$libro->setFromClass($resultado[$i]);
				$salida[$i] = $libro;*/
				$salida[$i] =  new LibroVO($resultado[$i]);

			}
			//var_dump($salida); 
			return $salida;
		}


	}

	class LibroCometariosDAO 
	{
		
		function __construct($param = FALSE)
		{
			
		}

		public function addComentario($idLibro, $idUsuario, $comentario, $valoracion)
		{

			$sql = "INSERT INTO `libro_Comentarios`(`idLibro`, `idUsuario`, `comentario`, `valoracion`) VALUES ('$idLibro', '$idUsuario', '$comentario', '$valoracion')";
				//echo $sql;
				return BaseDeDatosRecomendadorLibros::insertar($sql);
		}

	}


 ?>