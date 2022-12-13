<!DOCTYPE html>
<html lang="ES">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Carlos Renato Moreno Lugo">
	<title>Credencial Usuario</title>

	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	
</head>

<body class="text-center"> 
	<main role="main" class="container">
		
		<?php
	 		ob_start();
	 		
	 		//Se verifica que el formulario haya sido enviado.
			if(isset($_POST["credencial"]) && $_SERVER["REQUEST_METHOD"]  == "POST")
			{

				//Se verifica si se seleccionó un usuario
          		if (!isset($_POST['seleccion'])){
		           	$id = NULL;
		        } else{
		        	$id = $_POST['seleccion'];
		        }

				//Se incluye la librería para crear el PDF.
				require('pdf/tfpdf.php');
   				
   				$pdf = new tFPDF();
   				$pdf->AddPage();
   				$pdf->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf',true);
   				$pdf->SetFont('DejaVu', '', 6);

   				if($id!=NULL){
   					//Se consume la API y se muestra lista de usuarios.
   					$datosUsuarios = json_decode(file_get_contents("http://localhost/DesarrolloWebII/Evaluacion4/API/read.php"), true);

   					//Se genera la credencial del usuario seleccionado.
       				for($i=0; $i<count($datosUsuarios); $i++){
       					if($datosUsuarios[$i]['id'] == $id){

       						//Marco de la credencial.
			 				$pdf->Rect(13, 13, 85, 48);

					        //Imagen del usuario.
					        $pdf->Image('user.png', 19, 19, 20, 30);
					 
					        //Nombre del usuario.
					        $pdf->setXY(40, 18);
					        $pdf->Cell(40, 7, 'Nombre: ' .$datosUsuarios[$i]['nombre'], 0);

					        //Apellidos del usuario.
					        $pdf->setXY(68, 18);
					        $pdf->Cell(40, 7, 'Apellidos: ' .$datosUsuarios[$i]['apellidos'], 0);
					 
					        //Estado del usuario.
					        $pdf->setXY(40, 24);
					        $pdf->Cell(40, 7, 'Estado: ' .$datosUsuarios[$i]['estado'], 0);

					        //Tipo de sangre del usuario.
					        $pdf->setXY(68, 24);
					        $pdf->Cell(40, 7, 'Tipo de sangre: ' .$datosUsuarios[$i]['sangre'], 0);

					        //País del usuario.
					        $pdf->setXY(40, 30);
					        $pdf->Cell(40, 7, 'País: ' .$datosUsuarios[$i]['pais'], 0);

					        //Contacto de emergencia del usuario.
					        $pdf->setXY(40, 36);
					        $pdf->Cell(40, 7, 'Contacto de emergencia: ' .$datosUsuarios[$i]['contacto'], 0);

					        //Teléfono del contacto de emergencia del usuario.
					        $pdf->setXY(40, 42);
					        $pdf->Cell(40, 7, 'Teléfono de emergencia: ' .$datosUsuarios[$i]['telcontacto'], 0);

					        //Nombre de usuario del usuario.
					        $pdf->setXY(18, 50);
					        $pdf->Cell(40, 7, 'Usuario: ' .$datosUsuarios[$i]['usuario'], 0);

					        //Vigencia del usuario.
					        $pdf->setXY(60, 50);
					        $pdf->Cell(40, 7, 'Vigencia: ' .$datosUsuarios[$i]['vigencia'], 0);
       					}
       				}
      				
      				//Salida del PDF.
   					$pdf->Output();

		        } else{
		        	echo "<p class='lead'>No se seleccionó ningún usuario.</p>";
		        } 
		    }
				
			ob_end_flush();
		?>

	</main>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>