<?php
include ('conexion.php');
$Carrera = $_POST['Carrera'];
$Semestre = $_POST['Semestre'];
$Grupo = $_POST['Grupo'];
$tipoArchivo = $_FILES['imagen']['type'];
$nombreArchivo = $_FILES['imagen']['name'];
$tipoArchivo = $_FILES['imagen']['type'];
$tamanoArchivo = $_FILES['imagen']['size'];
$imagenSubida = fopen($_FILES['imagen']['tmp_name'], 'r');
$binariosImagen = fread($imagenSubida, $tamanoArchivo);
$binariosImagen = mysqli_escape_string($con, $binariosImagen);
$insetarData = "INSERT INTO horario(
    Carrera,
    Semestre,
    Grupo,
    Imagen,
    Tipo,
    Nombre
) VALUES(
   '$Carrera',
   '$Semestre',
   '$Grupo',
   '$binariosImagen',
   '$tipoArchivo',
   '$nombreArchivo'
)";
$query = mysqli_query($con, $insetarData);
if($query){
  mysqli_close($con);
    header('location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/Agg_Horarios.php');
  }
  
?>