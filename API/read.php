<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	//Se incluyen las clases necesarias.
	include_once '../ClsConexion.php';
	include_once '../Listas/Listas.php';

	//Se instancía la clase de la base de datos y se abre la conexión.
	$objBaseDatos = new ClsConexion();
	$db = $objBaseDatos->dbopen();

	//Se instancía la clase de la lista de usuarios.
	$objListas = new Listas($db);

	//Se ejecuta la sentencia para consultar los usuarios.
	$stmt = $objListas->getUsuarios();
	$totalUsuarios = $stmt->rowCount();

	//Se genera el json.
	if($totalUsuarios > 0){
		$arregloUsuarios = array();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			extract($row);
			$e = array(
				"id" => $id,
		 		"usuario" => $usuario, "nombre" => $nombre,
				"apellidos" => $apellidos, "estado" => $estado,
				"pais" => $pais, "sangre" => $sangre,
				"contacto" => $contacto, "telcontacto" => $telcontacto,
				"enfermedad" => $enfermedad, "alergia" => $alergia,
				"nacimiento" => $nacimiento, "vigencia" => $vigencia
			);

			array_push($arregloUsuarios, $e);
		}
		echo json_encode($arregloUsuarios);
	} else{
		http_response_code(404);
		echo json_encode(
			array("message" => "No se encontraron usuarios.")
		);
	}

	//Se cierra la conexión a la base de datos.
	$db = $objBaseDatos->dbclose();

	//Hecho por: Carlos Renato Moreno Lugo. LISI 4-1. 11/12/21.
?>