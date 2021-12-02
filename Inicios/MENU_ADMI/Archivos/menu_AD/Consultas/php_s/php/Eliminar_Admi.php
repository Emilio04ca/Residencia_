<?php
include ('conexion.php');

$numero_control = $_GET['id'];
//Ingresamos un mensaje a mostrar
echo '<script type="text/javascript">var mensaje = confirm("Seguro que deseas Borrar este registro?");</script>';
//Detectamos si el usuario acepto el mensaje
/*echo '<script type="text/javascript">if (mensaje == confirm) {</script>';*/
$query = "DELETE FROM login_admi WHERE Clave_RFC = '$numero_control'"; 
$result = mysqli_query($con,$query);
if($query){
  mysqli_close($con);
    echo '<script type="text/javascript">alert("Registro Borrado con exito");</script>';
    echo '<script type="text/javascript">window.location.href = "http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/agg_admi_index.php";</script>';
  }
/*echo'<script type="text/javascript">}</script>';
//Detectamos si el usuario denegó el mensaje
  echo '<script type="text/javascript"> else {</script>';
  echo '<script type="text/javascript">alert("¡Haz denegado la eliminacion del Registro!");</script>';
  echo '<script type="text/javascript">window.location.href = "http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/agg_admi_index.php";</script>';
  
  echo '<script type="text/javascript">}</script>'*/
  
?>