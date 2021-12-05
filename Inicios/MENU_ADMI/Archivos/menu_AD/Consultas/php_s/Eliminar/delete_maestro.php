<?php
include ('conexion.php');

$Clave_Docente = $_GET['id'];
//Ingresamos un mensaje a mostrar
//echo '<script type="text/javascript">var mensaje = confirm("Seguro que deseas Borrar este registro?");</script>';
//Detectamos si el usuario acepto el mensaje
//echo '<script type="text/javascript">if (mensaje) {</script>';//Ingresamos un mensaje a mostrar
//echo '<script type="text/javascript">var mensaje = confirm("Seguro que deseas Borrar este registro?");</script>';
//Detectamos si el usuario acepto el mensaje
//echo '<script type="text/javascript">if (mensaje) {</script>';
$query = "DELETE FROM datos_docentes WHERE Clave_Docente = '$Clave_Docente'"; 
$result = mysqli_query($con,$query);


if($query){
    mysqli_close($con);
    echo '<script type="text/javascript">alert("Registro Borrado con exito");</script>';
    echo '<script type="text/javascript">window.location.href ="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/Docente_index.php";</script>';
    
  }
  //echo'<script type="text/javascript">}</script>';
  //Detectamos si el usuario denegó el mensaje
    //echo '<script type="text/javascript"> else {</script>';
    //echo '<script type="text/javascript">alert("¡Haz denegado la eliminacion del Registro!");</script>';
    //echo '<script type="text/javascript">window.location.href = "http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/Docente_index.php';
    
    //echo '<script type="text/javascript">}</script>';
    //mysqli_close($con);
?>