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
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> calificaciones </title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <?php
    include 'Menu.php';
  ?>
  <script src="script.js"></script>
<br>
<br>
<table width="800" align="center">
		<tbody><tr align="center"> 
			<th width="21%"> No. Control s.e.p. </th>
			<th width="40%"> Nombre del Alumno </th>
			<th width="9%"> Semestre </th>
			<th width="25%"> Periodo Escolar </th>
						<th width="10%"> Prom. Acum. </th>
					</tr>
		<tr align="center" id="non">
			<td><?=$_SESSION ["usuario"]['Num_Ctrl']?></td>
			<td><?=$_SESSION ["usuario"]['Nombre']?> <?=$_SESSION ["usuario"]['Ape_paterno']?> <?=$_SESSION ["usuario"]['Ape_Materno']?></td>
			<td><?=$_SESSION ["usuario"]['Semestre']?></td>
			<td><?=$_SESSION ["usuario"]['Periodo']?></td>
						<td> 96.18 </td>
					</tr>
	</tbody></table>
  <table width="800" align="center">
		<tbody><tr align="center">
						<th> Carerra </th>
		
		</tr>
		<tr align="center" id="non">
						<td><?=utf8_encode( $_SESSION ["usuario"]['Especialidad'])?></td>
		
		</tr>
	</tbody></table>
  <?php 
    include "../Consultas/conexion.php";
    $Grupo = $_SESSION ["usuario"]['Grupo'];
    $Semestre = $_SESSION ["usuario"]['Semestre'];
    $especilidad = utf8_encode( $_SESSION ["usuario"]['Especialidad']);    
    $consulta = "SELECT Nombre FROM horario where Carrera = '$especilidad' and Semestre= '$Semestre' AND Grupo = '$Grupo'";
    $query=mysqli_query($con,$consulta);
    $cant_duplicidad = mysqli_num_rows($query);
                        if($cant_duplicidad == 0)
                        {
                          echo '<script type="text/javascript">alert("No tienes Horario");</script>';
                        }
                        else{
        while ($row = mysqli_fetch_assoc($query)) {
                ?>                   
                 <center>  <iframe height="400px" width="900px" src="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/archivos/<?php echo $row['Nombre']; ?>"></iframe> </center>                                 
                <?php
                }
              }
              mysqli_close($con);
                ?>
</body>
</html>
<?php
  
}
  else
  {
    header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');
  }
?>