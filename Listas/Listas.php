<?php
	/**
	 * Clase ClsConexion.
	 * Materia: Desarrollo Web II.
	 * @author Carlos Renato Moreno Lugo <[<carlos.renato.moreno.lugo@gmail.com>]>
	 */
	class Listas{

		//Conexión
		private $conn;

		//Tabla de la bd a utilizar
		private $tabla = "usuarios";

		//Columnas de la tabla de la base de datos
		public $id;
		public $usuario;
		public $nombre;
		public $apellidos;
		public $estado;
		public $pais;
		public $sangre;
		public $contacto;
		public $telcontacto;
		public $enfermedad;
		public $alergia;
		public $nacimiento;
		public $vigencia;

		//Establecer conexion con la db
		public function __construct($db){
			$this->conn = $db;
		}

		/**
		 * Método para generar la consulta para la API.
		 * @return [String] Devuelve $stm, teniendo la sentencia preparada y ejecutada para la consulta.
		 */
		public function getUsuarios(){
			$consultaSQL = "SELECT id, usuario, nombre, apellidos, estado, pais, sangre, contacto, telcontacto, enfermedad, alergia, nacimiento, vigencia FROM " .$this->tabla. "";
			$stmt = $this->conn->prepare($consultaSQL);
			$stmt->execute();
			return $stmt;
		}

	}
?>