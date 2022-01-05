<?php
include ('conexion.php');

$Carrera = utf8_decode($_GET['Carrera']);
$Nombre = utf8_decode($_GET['Nombre']);
$Grupo = $_GET['Grupo'];
//Ingresamos un mensaje a mostrar
//Detectamos si el usuario acepto el mensaje
/*echo '<script type="text/javascript">if (mensaje) {</script>';*/
  unlink("../../archivos/$Nombre");
  $query = "DELETE FROM datos_horario WHERE Grupo= '$Grupo' and Nombre='$Nombre'"; 
  $result = mysqli_query($con,$query);

    if($query)
      {
        mysqli_close($con);
        echo '<script type="text/javascript">alert("Registro Borrado con exito");</script>';
        echo '<script type="text/javascript">window.location.href = "http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/Agg_Horarios.php";</script>';
      }
 /* echo'<script type="text/javascript">}</script>';
//Detectamos si el usuario denegó el mensaje
  echo '<script type="text/javascript"> else {</script>';
  echo '<script type="text/javascript">alert("¡Haz denegado la eliminacion del Registro!");</script>';
  echo '<script type="text/javascript">window.location.href = "http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/Agg_Horarios.php";</script>';
  
  echo '<script type="text/javascript">}</script>'*/
  
?>
