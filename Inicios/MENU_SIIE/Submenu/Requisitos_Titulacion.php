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
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
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
          <li class="disñolist">CURP - Original y 2 copias (Formato Actual).</li><br>
          <li class="disñolist">Acta de naciemiento - Original y 2 copias (No se regresa original) (Si son validas las actas de nacimiento por internet).</li><br>
          <li class="disñolist">5 Cartas de competencia laboral (Pedir con Tito, un carta por modulo).</li><br>
          <li class="disñolist">Servicio Social liberado (Soliciatar con georgina).</li><br>
          <li class="disñolist">Practicas Profesionales LIberadas (Soliciatar con georgina).</li><br>
          <li class="disñolist">4 Fotografias para Diploma.</li><br>
          <li class="disñolist">6 fotografias Infantiles.</li><br>
          <li class="disñolist">Certificado de Bachillerato.</li><br>
          <li class="disñolist">el costo aproximado es de $370.</li><br>
          <li class="disñolist">Promedio minimo de 8 en cada modulo.</li><br>
        </ul>
      </div>
        <div class="subtabla_pd">
          <h2 class="titulos">Los formatos seran llenados con los datos acordes a lugar donde se realizara el servicio Social. El Archivo a descargar cntendra 2 hojas, donde una sera el que se llenara con los datos y la segunda sera un ejemplo, esto para dar una idea de su llenado</h2>  
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
