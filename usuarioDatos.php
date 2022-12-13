<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Carlos Renato Moreno Lugo">
    <title>Lista de Usuarios - Evaluación 4 Tipo 3</title>

    <script src="https://kit.fontawesome.com/a664f1a096.js" crossorigin="anonymous"></script>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/custom.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="navbar-top.css" rel="stylesheet">
  </head>
  <body>
    
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.html"><span class="fas fa-address-card"></span> Credenciales</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link" href="index.html"><span class="fas fa-user-plus"></span> Formulario</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false"><span class="fas fa-users"></span> Usuarios</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown01">
            <li><a class="dropdown-item" href="listaUsuarios.php"><span class="fas fa-list-ul"></span> Lista</a></li>
            <li><a class="dropdown-item" href="listaEditar.php"><span class="fas fa-user-edit"></span> Editar</a></li>
            <li><a class="dropdown-item" href="listaEliminar.php"><span class="fas fa-user-times"></span> Eliminar</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listaCredencial.php"><span class="fas fa-id-card"></span> Crear Credencial</a>
        </li>
      </ul>

    </div>
  </div>
</nav>

<main class="container">
  <div class="shadow p-3 mb-5 bg-body rounded">
    <h1><span class="fas fa-user-tag"></span> Datos del usuario</h1>

    <!--Datos del usuario a consultar-->
      <?php

        if(isset($_POST["consultar"]) && $_SERVER["REQUEST_METHOD"]  == "POST"){

          //Se verifica si se seleccionó un usuario
          if (!isset($_POST['seleccion'])){
            $id = NULL;
          } else{
            $id = $_POST['seleccion'];
          }

          if($id!=NULL){

            //Se consume la API y se muestra lista de usuarios.
            $datosUsuarios = json_decode(file_get_contents("http://localhost/DesarrolloWebII/Evaluacion4/API/read.php"), true);

            //Se muestran los datos del usuario seleccionado.
            for($i=0; $i<count($datosUsuarios); $i++){
              if($datosUsuarios[$i]['id'] == $id){
                echo "<br>
                  <div class='form-group'>
                    <label for='textid'><h5>ID: </h5></label>
                    <label id='textid' name='cid'>{$datosUsuarios[$i]['id']}</label>
                  </div>
                    
                  <div class='form-group'>
                    <label for='textfield1'><h5>Usuario: </h5></label>
                    <label id='textfield1' name='cusuario'>{$datosUsuarios[$i]['usuario']}</label>
                  </div>

                  <div class='form-group'>
                    <label for='textfield2'><h5>Nombre: </h5></label>
                    <label id='textfield2' name='cnombre'>{$datosUsuarios[$i]['nombre']}</label>
                  </div>

                  <div class='form-group'>
                    <label for='textfield3'><h5>Apellidos: </h5></label>
                    <label id='textfield3' name='capellido'>{$datosUsuarios[$i]['apellidos']}</label>
                  </div>

                  <div class='form-group'>
                    <label for='listfield1'><h5>Estado: </h5></label>
                    <label id='listfield1' name='cestado'>{$datosUsuarios[$i]['estado']}</label>
                  </div>

                  <div class='form-group'>
                    <label for='listfield2'><h5>País: </h5></label>
                    <label id='listfield2' name='cpais'>{$datosUsuarios[$i]['pais']}</label>
                  </div>

                  <div class='form-group'>
                    <label for='listfield3'><h5>Tipo de sangre: </h5></label>
                    <label id='listfield3' name='csangre'>{$datosUsuarios[$i]['sangre']}</label>
                  </div>

                  <div class='form-group'>
                    <label for='textfield4'><h5>Contacto de emergencia: </h5></label>
                    <label id='textfield4' name='cemergencia'>{$datosUsuarios[$i]['contacto']}</label>
                  </div>
                      
                  <div class='form-group'>
                    <label for='numfield1'><h5>Teléfono del contacto de emergencia: </h5></label>
                    <label id='numfield1' name='ctelemerfencia'>{$datosUsuarios[$i]['telcontacto']}</label>
                  </div>

                  <div class='form-group'>
                    <label for='textarea1'><h5>Enfermedades a mencionar: </h5></label>
                    <label id='textarea1' name='cenfermedad'>{$datosUsuarios[$i]['enfermedad']}</label>
                  </div>

                  <div class='form-group'>
                    <label for='textarea2'><h5>Alergias a mencionar: </h5></label>
                    <label id='textarea2' name='calergia'>{$datosUsuarios[$i]['alergia']}</label>
                  </div>

                  <div class='form-group'>
                    <label for='datefield1'><h5>Fecha de nacimiento: </h5></label>
                    <label id='datefield1' name='cnacimiento'>{$datosUsuarios[$i]['nacimiento']}</label>
                  </div>

                  <div class='form-group'>
                    <label for='datefield2'><h5>Vigencia: </h5></label>
                    <label id='datefield2' name='cvigencia'>{$datosUsuarios[$i]['vigencia']}</label>
                  </div><br>";
              }
            }
          } else{
            echo "<p class='lead'>No se seleccionó ningún usuario.</p>";
          }
        }
          
      ?>

  </div>
</main>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>

  <footer align="right">Hecho por: Carlos Renato Moreno Lugo. LISI 4-1. 11/12/21.</footer>

</html>
