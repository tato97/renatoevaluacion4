<!DOCTYPE html>
<html lang="ES">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Carlos Renato Moreno Lugo">
	<title>Eliminar Usuario</title>
	
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	
</head>

<body class="text-center"> 
	<main role="main" class="container">
		
		<?php
	 		
	 		//Se verifica que el formulario haya sido enviado.
			if(isset($_POST["eliminar"]) && $_SERVER["REQUEST_METHOD"]  == "POST")
			{
				//Se incluye la clase ClsConexion.
				require('ClsConexion.php');

				//Se guardan los datos enviados por el formulario.
				$cId = $_POST['cid'];

				//Se instancía la clase ClsConexion.
				$objConexion = new ClsConexion();

				//Se abre la conexión a la base de datos.
				$con = $objConexion->dbopen();

				//Se guardan los datos en la base de datos.
				try{
					$eliminar = $con->prepare("DELETE FROM usuarios WHERE id = :cId");
					$eliminar->bindParam("cId", $cId, PDO::PARAM_INT);
					$eliminar->execute();

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