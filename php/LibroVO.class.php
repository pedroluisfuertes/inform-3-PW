<?php 
	require_once './php/ValueObject.class.php';
		/**
		 * 
		 */
		class LibroVo extends ValueObject
		{

			private $id; 
			private $titulo; 
			private $autor; 
			private $editorial; 
			private $edicion; 
			private $idUsuario; 
			
			function __construct($param = FALSE)
			{	
				if($param){
					if(func_num_args() > 1)
						parent::__construct(func_get_args());
					else
						parent::__construct($param); 
				}
			}

			/*public function getTitulo(){
				return $this->titulo; 
			}*/
		}


 ?>