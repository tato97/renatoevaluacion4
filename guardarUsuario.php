<!DOCTYPE html>
<html lang="ES">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Carlos Renato Moreno Lugo">
	<title>Registrar Usuario</title>
	
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body class="text-center"> 
	<main role="main" class="container">
		
		<?php
	 		
	 		//Se verifica que el formulario haya sido enviado.
			if(isset($_POST["agregar"]) && $_SERVER["REQUEST_METHOD"]  == "POST")
			{
				//Se incluye la clase ClsConexion.
				require('ClsConexion.php');

				//Se guardan los datos enviados por el formulario.
				$cUsuario = $_POST['cusuario'];
				$cNombre = $_POST['cnombre'];
				$cApellido = $_POST['capellido'];
				$cEstado = $_POST['cestado'];
				$cPais = $_POST['cpais'];
				$cSangre = $_POST['csangre'];
				$cEmergencia = $_POST['cemergencia'];
				$cTelemer = $_POST['ctelemerfencia'];
				$cEnfermedad = $_POST['cenfermedad'];
				$cAlergia = $_POST['calergia'];
				$cNacimiento = $_POST['cnacimiento'];
				$cVigencia = $_POST['cvigencia'];

				//Se instancía la clase ClsConexion.
				$objConexion = new ClsConexion();

				//Se abre la conexión a la base de datos.
				$con = $objConexion->dbopen();

				//Se guardan los datos en la base de datos.
				try{
					$insertar = $con->prepare("INSERT INTO usuarios VALUES (null, :cUsuario, :cNombre, :cApellido, :cEstado, :cPais, :cSangre, :cEmergencia, :cTelemer, :cEnfermedad, :cAlergia, :cNacimiento, :cVigencia)");
					$insertar->bindParam("cUsuario", $cUsuario, PDO::PARAM_STR);
					$insertar->bindParam("cNombre", $cNombre, PDO::PARAM_STR);
					$insertar->bindParam("cApellido", $cApellido, PDO::PARAM_STR);
					$insertar->bindParam("cEstado", $cEstado, PDO::PARAM_STR);
					$insertar->bindParam("cPais", $cPais, PDO::PARAM_STR);
					$insertar->bindParam("cSangre", $cSangre, PDO::PARAM_STR);
					$insertar->bindParam("cEmergencia", $cEmergencia, PDO::PARAM_STR);
					$insertar->bindParam("cTelemer", $cTelemer, PDO::PARAM_INT);
					$insertar->bindParam("cEnfermedad", $cEnfermedad, PDO::PARAM_STR);
					$insertar->bindParam("cAlergia", $cAlergia, PDO::PARAM_STR);
					$insertar->bindParam("cNacimiento", $cNacimiento, PDO::PARAM_STR);
					$insertar->bindParam("cVigencia", $cVigencia, PDO::PARAM_STR);
					$insertar->execute();

					//Se cierra la conexión a la base de datos.
					$con = $objConexion->dbclose();

					//Se redirige a la lista de usuarios.
					header('Location: listaUsuarios.php');

				} catch(PDOException $e){
					echo "Error: " .$e->getMessage();
				}
				
			} 
		?>

	</main>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>