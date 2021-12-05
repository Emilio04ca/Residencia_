<?php
    // Solo se permite el ingreso con el inicio de sesion.
    session_id();
    session_start();
    $nombre = $_SESSION ["usuario"]['Num_Ctrl'];
    // Si el usuario no se ha logueado se le regresa al inicio.
    if (($_SESSION ["usuario"]['Num_Ctrl'] != null)) 
    {
  ?>
   
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Prac._Profesionales</title>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script type="text/javascript">
      $(window).load(function() {
        $(".loader").fadeOut("slow");
      });
    </script>
</head>
<body>
  <div class="loader"></div>
  <?php
    include 'Menu.php';
  ?>
  <script src="script.js"></script>
  <div class="congeneral">
  <div class="contenedor">
    <div class="cont">Requisitos para titulacion</div>
  </div>
  <div class="contenedor2">
    <ul id="diseño">
      <li class="disñolist">NOMBRE DEL LUGAR.</li><br>
      <li class="disñolist">LOGOS Y SELLOS DEL LUGAR. (Obligatorios.)</li><br>
      <li class="disñolist">NOMBRE DEL ENCARGADO.</li><br>
      <li class="disñolist">PUESTO QUE OCUPA.</li><br>
      <li class="disñolist">NOMBRE DEL ASESOR.</li><br>
      <li class="disñolist">DIRECCIÓN.</li><br>
      <li class="disñolist">C.P.</li><br>
      <li class="disñolist">LOCALIDAD.</li><br>
      <li class="disñolist">NOMBRE DEL ALUMNO.</li><br>
      <li class="disñolist">GRUPO</li><br>
      <li class="disñolist">480 hrs DEL SERVICIO</li><br>

    </ul>
  </div>
  <div class="subtabla_pd">
      <h2 class="titulos">TANTO EL SERVICIO SOCIAL COMO LAS PRACTICAS PROFESIONALES SON OBLIGATORIAS TOMANDO EN CUENTAS LOS TIEMPOS Y FORMAS  DE ENTREGA DE PAPELERIA.  CUAL QUIER DUDA O ACLARACION PASAR EL DEPT. DE VINCULACION.</h2>  
    </div>
  </div>
</body>
</html>
<?php
  }
  else
  {
    header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
  }
?>