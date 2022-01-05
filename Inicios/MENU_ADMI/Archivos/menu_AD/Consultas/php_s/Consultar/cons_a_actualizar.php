<?php
 include ('conexion.php');
 
 $Clave_Materia = utf8_decode($_GET['id']);
 $Clave_Maestro = utf8_decode($_GET['id2']);
 
 $Materia_relacion="SELECT * FROM materia_relacion WHERE Clave_Materia ='$Clave_Materia' and Clave_Docente='$Clave_Maestro'";

 $resultados=mysqli_query($con,$Materia_relacion);

 $datos=mysqli_fetch_array($resultados);
 if(isset($datos))
 { 
    $ID =  utf8_encode($datos['id']);
    $Clave_Materia= utf8_encode($datos['Clave_Materia']);
    $Grupo= $datos['Grupo'];
    $Semestre= $datos['Semestre'];
    $Especialidad= $datos['Especialidad'];
    $Clave_Maestro= utf8_encode($datos['Clave_Docente']);
    $Periodo= $datos['Periodo'];
 }
 else{

    $Grupo= 'Nohay';
    $Semestre= 'Nohay';
    $Especialidad= 'Nohay';

    $Periodo= 'Nohay';

 } 
?>



