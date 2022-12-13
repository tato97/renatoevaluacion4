<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Carlos Renato Moreno Lugo">
    <title>Editar Usuario - Evaluación 4 Tipo 3</title>

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
    <h1><span class="fas fa-user-edit"></span> Editar usuarios</h1>
    
      <!--Datos del usuario a editar-->
      <?php

        if(isset($_POST["editar"]) && $_SERVER["REQUEST_METHOD"]  == "POST"){

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
              echo "<form method='POST' action='actualizar.php' class='form-horizontal needs-validation' novalidate>
                <input type='text' class='form-control' id='textid' name='cid' hidden='true' readonly required value=\"{$datosUsuarios[$i]['id']}\">
                
                <div class='form-group'>
                  <label for='textfield1'>Usuario</label>
                  <input type='text' class='form-control' id='textfield1' name='cusuario' required value=\"{$datosUsuarios[$i]['usuario']}\">
                  <div class='valid-feedback'>Campo llenado correctamente</div>
                  <div class='invalid-feedback'>Campo obligatorio</div>
                </div><br>

                <div class='form-group'>
                  <label for='textfield2'>Nombre</label>
                  <input type='text' class='form-control' id='textfield2' name='cnombre' required value=\"{$datosUsuarios[$i]['nombre']}\">
                  <div class='valid-feedback'>Campo llenado correctamente</div>
                  <div class='invalid-feedback'>Campo obligatorio</div>
                </div><br>

                <div class='form-group'>
                  <label for='textfield3'>Apellidos</label>
                  <input type='text' class='form-control' id='textfield3' name='capellido' required value=\"{$datosUsuarios[$i]['apellidos']}\">
                  <div class='valid-feedback'>Campo llenado correctamente</div>
                  <div class='invalid-feedback'>Campo obligatorio</div>
                </div><br>

                <div class='form-group'>
                  <label for='listfield1'>Estado</label>
                  <input list='estados' class='form-control' id='listfield1' name='cestado' required value=\"{$datosUsuarios[$i]['estado']}\">
                  <datalist id='estados'>
                    <option value='Aguascalientes'></option>
                    <option value='Baja California'></option>
                    <option value='Baja California Sur'></option>
                    <option value='Campeche'></option>
                    <option value='Chiapas'></option>
                    <option value='Chihuahua'></option>
                    <option value='Ciudad de México'></option>
                    <option value='Coahuila'></option>
                    <option value='Colima'></option>
                    <option value='Durango'></option>
                    <option value='Estado de México'></option>
                    <option value='Guanajuato'></option>
                    <option value='Guerrero'></option>
                    <option value='Hidalgo'></option>
                    <option value='Jalisco'></option>
                    <option value='Michoacán'></option>
                    <option value='Morelos'></option>
                    <option value='Nayarit'></option>
                    <option value='Nuevo León'></option>
                    <option value='Oaxaca'></option>
                    <option value='Puebla'></option>
                    <option value='Querétaro'></option>
                    <option value='Quintana Roo'></option>
                    <option value='San Luis Potosí'></option>
                    <option value='Sinaloa'></option>
                    <option value='Sonora'></option>
                    <option value='Tabasco'></option>
                    <option value='Tamaulipas'></option>
                    <option value='Tlaxcala'></option>
                    <option value='Veracruz'></option>
                    <option value='Yucatán'></option>
                    <option value='Zacatecas'></option>
                  </datalist>
                  <div class='valid-feedback'>Campo llenado correctamente</div>
                  <div class='invalid-feedback'>Campo obligatorio</div>
                </div><br>

                <div class='form-group'>
                  <label for='listfield2'>País</label>
                  <input list='paises' class='form-control' id='listfield2' name='cpais' required value=\"{$datosUsuarios[$i]['pais']}\">
                  <datalist id='paises'>
                    <option value='Afganistán'></option>
                    <option value='Albania'></option>
                    <option value='Alemania'></option>
                    <option value='Andorra'></option>
                    <option value='Angola'></option>
                    <option value='Anguilla'></option>
                    <option value='Antártida'></option>
                    <option value='Antigua y Barbuda'></option>
                    <option value='Antillas Holandesas'></option>
                    <option value='Arabia Saudí'></option>
                    <option value='Argelia'></option>
                    <option value='Argentina'></option>
                    <option value='Armenia'></option>
                    <option value='Aruba'></option>
                    <option value='Australia'></option>
                    <option value='Austria'></option>
                    <option value='Azerbaiyán'></option>
                    <option value='Bahamas'></option>
                    <option value='Bahrein'></option>
                    <option value='Bangladesh'></option>
                    <option value='Barbados'></option>
                    <option value='Bélgica'></option>
                    <option value='Belice'></option>
                    <option value='Benin'></option>
                    <option value='Bermudas'></option>
                    <option value='Bielorrusia'></option>
                    <option value='Birmania'></option>
                    <option value='Bolivia'></option>
                    <option value='Bosnia y Herzegovina'></option>
                    <option value='Botswana'></option>
                    <option value='Brasil'></option>
                    <option value='Brunei'></option>
                    <option value='Bulgaria'></option>
                    <option value='Burkina Faso'></option>
                    <option value='Burundi'></option>
                    <option value='Bután'></option>
                    <option value='Cabo Verde'></option>
                    <option value='Camboya'></option>
                    <option value='Camerún'></option>
                    <option value='Canadá'></option>
                    <option value='Chad'></option>
                    <option value='Chile'></option>
                    <option value='China'></option>
                    <option value='Chipre'></option>
                    <option value='Ciudad del Vaticano (Santa Sede)'></option>
                    <option value='Colombia'></option>
                    <option value='Comores'></option>
                    <option value='Congo'></option>
                    <option value='Congo, República Democrática del'></option>
                    <option value='Corea'></option>
                    <option value='Corea del Norte'></option>
                    <option value='Costa de Marfíl'></option>
                    <option value='Costa Rica'></option>
                    <option value='Croacia (Hrvatska)'></option>
                    <option value='Cuba'></option>
                    <option value='Dinamarca'></option>
                    <option value='Djibouti'></option>
                    <option value='Dominica'></option>
                    <option value='Ecuador'></option>
                    <option value='Egipto'></option>
                    <option value='El Salvador'></option>
                    <option value='Emiratos Árabes Unidos'></option>
                    <option value='Eritrea'></option>
                    <option value='Eslovenia'></option>
                    <option value='España'></option>
                    <option value='Estados Unidos'></option>
                    <option value='Estonia'></option>
                    <option value='Etiopía'></option>
                    <option value='Fiji'></option>
                    <option value='Filipinas'></option>
                    <option value='Finlandia'></option>
                    <option value='Francia'></option>
                    <option value='Gabón'></option>
                    <option value='Gambia'></option>
                    <option value='Georgia'></option>
                    <option value='Ghana'></option>
                    <option value='Gibraltar'></option>
                    <option value='Granada'></option>
                    <option value='Grecia'></option>
                    <option value='Groenlandia'></option>
                    <option value='Guadalupe'></option>
                    <option value='Guam'></option>
                    <option value='Guatemala'></option>
                    <option value='Guayana'></option>
                    <option value='Guayana Francesa'></option>
                    <option value='Guinea'></option>
                    <option value='Guinea Ecuatorial'></option>
                    <option value='Guinea-Bissau'></option>
                    <option value='Haití'></option>
                    <option value='Honduras'></option>
                    <option value='Hungría'></option>
                    <option value='India'></option>
                    <option value='Indonesia'></option>
                    <option value='Irak'></option>
                    <option value='Irán'></option>
                    <option value='Irlanda'></option>
                    <option value='Isla Bouvet'></option>
                    <option value='Isla de Christmas'></option>
                    <option value='Islandia'></option>
                    <option value='Islas Caimán'></option>
                    <option value='Islas Cook'></option>
                    <option value='Islas de Cocos o Keeling'></option>
                    <option value='Islas Faroe'></option>
                    <option value='Islas Heard y McDonald'></option>
                    <option value='Islas Malvinas'></option>
                    <option value='Islas Marianas del Norte'></option>
                    <option value='Islas Marshall'></option>
                    <option value='Islas menores de Estados Unidos'></option>
                    <option value='Islas Palau'></option>
                    <option value='Islas Salomón'></option>
                    <option value='Islas Svalbard y Jan Mayen'></option>
                    <option value='Islas Tokelau'></option>
                    <option value='Islas Turks y Caicos'></option>
                    <option value='Islas Vírgenes (EEUU)'></option>
                    <option value='Islas Vírgenes (Reino Unido)'></option>
                    <option value='Islas Wallis y Futuna'></option>
                    <option value='Israel'></option>
                    <option value='Italia'></option>
                    <option value='Jamaica'></option>
                    <option value='Japón'></option>
                    <option value='Jordania'></option>
                    <option value='Kazajistán'></option>
                    <option value='Kenia'></option>
                    <option value='Kirguizistán'></option>
                    <option value='Kiribati'></option>
                    <option value='Kuwait'></option>
                    <option value='Laos'></option>
                    <option value='Lesotho'></option>
                    <option value='Letonia'></option>
                    <option value='Líbano'></option>
                    <option value='Liberia'></option>
                    <option value='Libia'></option>
                    <option value='Liechtenstein'></option>
                    <option value='Lituania'></option>
                    <option value='Luxemburgo'></option>
                    <option value='Macedonia, Ex-República Yugoslava de'></option>
                    <option value='Madagascar'></option>
                    <option value='Malasia'></option>
                    <option value='Malawi'></option>
                    <option value='Maldivas'></option>
                    <option value='Malí'></option>
                    <option value='Malta'></option>
                    <option value='Marruecos'></option>
                    <option value='Martinica'></option>
                    <option value='Mauricio'></option>
                    <option value='Mauritania'></option>
                    <option value='Mayotte'></option>
                    <option value='México'></option>
                    <option value='Micronesia'></option>
                    <option value='Moldavia'></option>
                    <option value='Mónaco'></option>
                    <option value='Mongolia'></option>
                    <option value='Montserrat'></option>
                    <option value='Mozambique'></option>
                    <option value='Namibia'></option>
                    <option value='Nauru'></option>
                    <option value='Nepal'></option>
                    <option value='Nicaragua'></option>
                    <option value='Níger'></option>
                    <option value='Nigeria'></option>
                    <option value='Niue'></option>
                    <option value='Norfolk'></option>
                    <option value='Noruega'></option>
                    <option value='Nueva Caledonia'></option>
                    <option value='Nueva Zelanda'></option>
                    <option value='Omán'></option>
                    <option value='Países Bajos'></option>
                    <option value='Panamá'></option>
                    <option value='Papúa Nueva Guinea'></option>
                    <option value='Paquistán'></option>
                    <option value='Paraguay'></option>
                    <option value='Perú'></option>
                    <option value='Pitcairn'></option>
                    <option value='Polinesia Francesa'></option>
                    <option value='Polonia'></option>
                    <option value='Portugal'></option>
                    <option value='Puerto Rico'></option>
                    <option value='Qatar'></option>
                    <option value='Reino Unido'></option>
                    <option value='República Centroafricana'></option>
                    <option value='República Checa'></option>
                    <option value='República de Sudáfrica'></option>
                    <option value='República Dominicana'></option>
                    <option value='República Eslovaca'></option>
                    <option value='Reunión'></option>
                    <option value='Ruanda'></option>
                    <option value='Rumania'></option>
                    <option value='Rusia'></option>
                    <option value='Sahara Occidental'></option>
                    <option value='Saint Kitts y Nevis'></option>
                    <option value='Samoa'></option>
                    <option value='Samoa Americana'></option>
                    <option value='San Marino'></option>
                    <option value='San Vicente y Granadinas'></option>
                    <option value='Santa Helena'></option>
                    <option value='Santa Lucía'></option>
                    <option value='Santo Tomé y Príncipe'></option>
                    <option value='Senegal'></option>
                    <option value='Seychelles'></option>
                    <option value='Sierra Leona'></option>
                    <option value='Singapur'></option>
                    <option value='Siria'></option>
                    <option value='Somalia'></option>
                    <option value='Sri Lanka'></option>
                    <option value='St Pierre y Miquelon'></option>
                    <option value='Suazilandia'></option>
                    <option value='Sudán'></option>
                    <option value='Suecia'></option>
                    <option value='Suiza'></option>
                    <option value='Surinam'></option>
                    <option value='Tailandia'></option>
                    <option value='Taiwán'></option>
                    <option value='Tanzania'></option>
                    <option value='Tayikistán'></option>
                    <option value='Territorios franceses del Sur'></option>
                    <option value='Timor Oriental'></option>
                    <option value='Togo'></option>
                    <option value='Tonga'></option>
                    <option value='Trinidad y Tobago'></option>
                    <option value='Túnez'></option>
                    <option value='Turkmenistán'></option>
                    <option value='Turquía'></option>
                    <option value='Tuvalu'></option>
                    <option value='Ucrania'></option>
                    <option value='Uganda'></option>
                    <option value='Uruguay'></option>
                    <option value='Uzbekistán'></option>
                    <option value='Vanuatu'></option>
                    <option value='Venezuela'></option>
                    <option value='Vietnam'></option>
                    <option value='Yemen'></option>
                    <option value='Yugoslavia'></option>
                    <option value='Zambia'></option>
                    <option value='Zimbabue'></option>
                  </datalist>
                  <div class='valid-feedback'>Campo llenado correctamente</div>
                  <div class='invalid-feedback'>Campo obligatorio</div>
                </div><br>

                <div class='form-group'>
                  <label for='listfield3'>Tipo de sangre</label>
                  <input list='tipo' class='form-control' id='listfield3' name='csangre' required value=\"{$datosUsuarios[$i]['sangre']}\">
                  <datalist id='tipo'>
                    <option value='A+'></option>
                    <option value='A-'></option>
                    <option value='B+'></option>
                    <option value='B-'></option>
                    <option value='O+'></option>
                    <option value='O-'></option>
                    <option value='AB+'></option>
                    <option value='AB-'></option>
                  </datalist>
                  <div class='valid-feedback'>Campo llenado correctamente</div>
                  <div class='invalid-feedback'>Campo obligatorio</div>
                </div><br>

                <div class='form-group'>
                  <label for='textfield4'>Contacto de emergencia</label>
                  <input type='text' class='form-control' id='textfield4' name='cemergencia' required value=\"{$datosUsuarios[$i]['contacto']}\">
                  <div class='valid-feedback'>Campo llenado correctamente</div>
                  <div class='invalid-feedback'>Campo obligatorio</div>
                </div><br>
                  
                <div class='form-group'>
                  <label for='numfield1'>Teléfono del contacto de emergencia</label>
                  <input type='number' min='1000000000' max='9999999999' class='form-control' id='numfield1' name='ctelemerfencia' required value=\"{$datosUsuarios[$i]['telcontacto']}\">
                  <div class='valid-feedback'>Campo llenado correctamente</div>
                  <div class='invalid-feedback'>Campo obligatorio. Teléfono de 10 dígitos</div>
                </div><br>

                <div class='form-group'>
                  <label for='textarea1'>Enfermedades a mencionar</label>
                  <textarea class='form-control' id='textarea1' name='cenfermedad' required>{$datosUsuarios[$i]['enfermedad']}</textarea>
                  <div class='valid-feedback'>Campo llenado correctamente</div>
                  <div class='invalid-feedback'>Campo obligatorio</div>
                </div><br>

                <div class='form-group'>
                  <label for='textarea2'>Alergias a mencionar</label>
                  <textarea class='form-control' id='textarea2' name='calergia' required>{$datosUsuarios[$i]['alergia']}</textarea>
                  <div class='valid-feedback'>Campo llenado correctamente</div>
                  <div class='invalid-feedback'>Campo obligatorio</div>
                </div><br>

                <div class='form-group'>
                  <label for='datefield1'>Fecha de nacimiento</label>
                  <input type='date' id='datefield1' class='form-control' name='cnacimiento' min='1900-01-01' max='2003-12-31' required value=\"{$datosUsuarios[$i]['nacimiento']}\">
                  <div class='valid-feedback'>Campo llenado correctamente</div>
                  <div class='invalid-feedback'>Campo obligatorio</div>
                </div><br>

                <div class='form-group'>
                  <label for='datefield2'>Vigencia</label>
                  <input type='date' id='datefield2' class='form-control' name='cvigencia' min='2021-01-01' max='2030-12-31' required value=\"{$datosUsuarios[$i]['vigencia']}\">
                  <div class='valid-feedback'>Campo llenado correctamente</div>
                  <div class='invalid-feedback'>Campo obligatorio</div>
                </div><br> 

                <button name='actualizar' type='submit' value='Submit' class='btn btn-success btn-lg'><span class='fas fa-user-check'></span> Actualizar</button>

                <script type='text/javascript'>
                  (function () {
                    'use strict'
                    var forms = document.querySelectorAll('.needs-validation')
                    Array.prototype.slice.call(forms)
                    .forEach(function (form) {
                      form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                          event.preventDefault()
                          event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                      }, false)
                    })
                  })()
                </script>

              </form>";
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
