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
	<title>Servi. Social</title>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <?php
    include 'Menu.php';
  ?>
  <br>

  <div class="contenedor">
    <h3>Servicio Social</h3>
  </div>
  <div class="contenedor2">
    <h4 class="parrafo">El servicio social es un programa administrado por la institución de educación media superior ofrece al alumno un espacio para poner en práctica los conocimientos que ha adquirido a lo largo de su formación  para solucionar problemas sociales y ayudar a instituciones, organizaciones de la sociedad civil y en algunos casos empresas (siempre y cuando se trate de programas sin fines de lucro). <br>
    </h4>
  </div>

  <div class="principal modificdor">
    <div class="subtabla">
      <h2 class="titulo">carta de aceptacion</h2>
      <i class='bx bxs-file-pdf'></i>
      <a href="" class="enlace">Descargar</a>
    </div>
    <div class="subtabla">
      <h2 class="titulo">Informes Bimesrales</h2>
      <i class='bx bxs-file-pdf'></i>
      <a href="" class="enlace">Descargar</a>
    </div>
    <div class="subtabla">
      <h2 class="titulo">informe Final</h2>
      <i class='bx bxs-file-pdf'></i>
      <a href="" class="enlace">Descargar</a>
    </div>
    <div class="subtabla">
      <h2 class="titulo">Carta de liberacion</h2>
      <i class='bx bxs-file-pdf'></i>
      <a href="" class="enlace">Descargar</a>
    </div>
  </div>
  <div class="subtabla_pd">
      <h2 class="titulos">Los formatos seran llenados con los datos acordes a lugar donde se realizara el servicio Social. El Archivo a descargar cntendra 2 hojas, donde una sera el que se llenara con los datos y la segunda sera un ejemplo, esto para dar una idea de su llenado</h2>  
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