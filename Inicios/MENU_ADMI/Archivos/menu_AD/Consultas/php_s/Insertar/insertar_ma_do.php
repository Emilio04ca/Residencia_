<?php
 include ('conexion.php');
    $Clave_Materia = $_POST['Clave_Materia'];
    $Grupo = $_POST['Grupo'];
    $Semestre = $_POST['Semestre'];
    $Especialidad = utf8_decode($_POST['Especialidad']);
    $Clave_Maestro = $_POST['Clave_Maestro'];
    $Periodo = $_POST['Periodo'];
    
    $consulta = "SELECT Clave_Materia, Clave_Maestro FROM materia_relacion WHERE Clave_Materia='$Clave_Materia' and Clave_Maestro='$Clave_Maestro'";
    $querys=mysqli_query($con,$consulta);
    $cant_duplicidad = mysqli_num_rows($querys);
         if($cant_duplicidad != 0)
               {
                  mysqli_close($con);
                  echo '<script type="text/javascript">alert("¡Esta Materia Ya Se Encuentra Registrada!");</script>';
                  echo '<script type="text/javascript">window.location.href = "http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/MM_index.php";</script>';
               }
               else
               {

                  $insetarData = "INSERT INTO materia_relacion(
                     Clave_Materia,
                     Grupo,
                     Semestre,
                     Especialidad,
                     Clave_Maestro,
                     Periodo
                  ) VALUES(
                     '$Clave_Materia',
                     '$Grupo',
                     '$Semestre',
                     '$Especialidad',
                     '$Clave_Maestro',
                     '$Periodo'
                     
                  )";
                  $query = mysqli_query($con, $insetarData);

                  if($query){
                     mysqli_close($con);
                     header('location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/MM_index.php');
                  }
               }
?>