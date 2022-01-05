<?php
include ('conexion.php');

$ID = $_GET['id'];

$query = "DELETE FROM datos_carrera WHERE id = '$ID'"; 
$result = mysqli_query($con,$query);


if($query){
    mysqli_close($con);
    echo '<script type="text/javascript">alert("Registro Borrado con exito");</script>';
    echo '<script type="text/javascript">window.location.href ="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/Docente_index.php";</script>';
    
  }
?>