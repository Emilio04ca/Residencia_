<html>
<head>
<script type="text/javascript">
function ConfirmDemo() {
//Ingresamos un mensaje a mostrar
//Detectamos si el usuario acepto el mensaje
if (mensaje) {
<?php 
  include ('conexion.php');
  $Carrera = utf8_decode($_GET['Carrera']);
  $Nombre = utf8_decode($_GET['Nombre']);
  $Grupo = $_GET['Grupo'];
  
  unlink("../../archivos/$Nombre");
  $query = "DELETE FROM horario WHERE Grupo= '$Grupo' and Nombre='$Nombre'"; 
  $result = mysqli_query($con,$query);  
      if($query)
        {
          echo '<script type="text/javascript">alert("¡Registro Borrado con exito!");</script>';
          echo '<script type="text/javascript">window.location.href = "http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/Agg_Horarios.php";</script>';
        }
 
 ?>
}
//Detectamos si el usuario denegó el mensaje
else {
alert("¡Haz denegado el mensaje!");
}
}
</script>
</head>
<body>

</body>
</html>