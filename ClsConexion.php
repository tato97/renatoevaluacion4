<?php
	/**
	 * Clase ClsConexion.
	 * Materia: Desarrollo Web II.
	 * @author Carlos Renato Moreno Lugo <[<carlos.renato.moreno.lugo@gmail.com>]>
	 */
	class ClsConexion
	{
		private $dbserver = "mysql:host=localhost;dbname=credenciales";
		private $dbuser = "root";
		private $dbpass = "";
		protected $conexion;

		/**
		 * Este método abre la conexión a la base de datos, utiliznado los valores de las variables privadas.
		 * @return [String] Devuelve $conexion, teniendo los datos necesarios para abrir la conexión a la base de datos.
		 */
		public function dbopen(){
		try {
				$conexion = new PDO($this->dbserver, $this->dbuser, $this->dbpass);
				return $conexion;
			} catch(PDOException $e) {
				echo "Error: " .$e->getMessage();
			}

		}

		/**
		 * Este método cierra la conexión a la base de datos, haciendo que el valor de $conexion sea NULL.
		 * @return [String] Devuelve $conexion como NULL.
		 */
		public function dbclose(){
			$conexion = NULL;
			return $conexion;
		}	
	}
?>