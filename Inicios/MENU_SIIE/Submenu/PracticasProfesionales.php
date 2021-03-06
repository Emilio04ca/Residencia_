<?php
  // Solo se permite el ingreso con el inicio de sesion.
  session_id();
  session_start();
  $nombre = $_SESSION ["usuario"]['Num_Ctrl'];
  // Si el usuario no se ha logueado se le regresa al inicio.
  if (($_SESSION ["usuario"]['Num_Ctrl'] != null)) {

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
  <br>
    <div class="contenedor">
      <h3>Practicas profesionales</h3>
    </div>
    <div class="contenedor2">
      <h4 class="parrafo">
        Son programas de vinculación que se conforman de una serie de actividades en donde los alumnos acuden a una institución del sector publico, privado o social, y ponen en práctica los conocimientos teórico/prácticos contribuyendo con un proyecto a la mejora de la organizaciones o bien apoyando en la labor diaria de un área específica. <br>
      </h4>
  
      <h3>¿Cuál es su objetivo? </h3>
  
      <h4 class="parrafo">
        El fin primordial que persiguen estos programas son el  fortalecer el desarrollo del estudiante de manera integral, logrando que lleve a la práctica los conocimientos y habilidades adquiridos en el aula y darle la oportunidad de vivir la realidad de las empresas nacionales e internacionales, propiciando así la formación de profesionistas de calidad y con una visión sobre lo que demanda de él, el actual mundo laboral.
      </h4>
    </div>

    <div class="principal modificdor">
      <div class="subtabla">
        <h2 class="titulo">carta de aceptacion</h2>
        <i class='bx bxs-file-pdf'></i>
        <a href="" class="enlace">Descargar</a>
      </div>
      <div class="subtabla">
        <h2 class="titulo">Informes Bimestrales</h2>
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