<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Carlos Renato Moreno Lugo">
    <title>Eliminar Usuario - Evaluación 4 Tipo 3</title>

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
    <h1><span class="fas fa-user-times"></span> Eliminar usuarios</h1>
    <form method="POST" action="usuarioEliminar.php" class="form-horizontal">
    
      <!--Lista de usuarios-->
      <?php

        //Se consume la API y se muestra lista de usuarios.
        $datosUsuarios = json_decode(file_get_contents("http://localhost/DesarrolloWebII/Evaluacion4/API/read.php"), true);

        //Se genera la tabla de los usuarios que consiguieron mediante la API.
        echo "<table class='table table-hover'>
          <thead>
            <tr>
              <th></th>
              <th>Usuario</th>
              <th>Nombre</th>
              <th>Apellidos</th>
              <th>Estado</th>
              <th>País</th>              
              <th>Fecha de nacimiento</th>
              <th>Vigencia</th>
            </tr>
          </thead>
          <tbody>";
            for($i=0; $i<count($datosUsuarios); $i++){
              echo "<tr class='table-danger'>
                <td><input type='radio' name='seleccion' value=\"{$datosUsuarios[$i]['id']}\"></td>
                <td>" .$datosUsuarios[$i]['usuario']. "</td>
                <td>" .$datosUsuarios[$i]['nombre']. "</td>
                <td>" .$datosUsuarios[$i]['apellidos']. "</td>
                <td>" .$datosUsuarios[$i]['estado']. "</td>
                <td>" .$datosUsuarios[$i]['pais']. "</td>
                <td>" .$datosUsuarios[$i]['nacimiento']. "</td>
                <td>" .$datosUsuarios[$i]['vigencia']. "</td>
              </tr>";
            }
          echo "</tbody>
        </table>";

      ?>

      <button type="submit" name="eliminar" value="Submit" class="btn btn-primary btn-lg"><span class="fas fa-user-times"></span> Eliminar</button>

    </form>

  </div>
</main>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>

  <footer align="right">Hecho por: Carlos Renato Moreno Lugo. LISI 4-1. 11/12/21.</footer>

</html>
