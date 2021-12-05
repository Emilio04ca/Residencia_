<?php
 include ('conexion.php');

   $Clave_Docente = $_POST['Clave_Docente'];
   $Nombre = $_POST['Nombre'];
   $Apellido_p = $_POST['Ape_Paterno'];
   $Apellido_M = $_POST['Ape_Materno'];
   $Area = $_POST['Area'];
   
   $consulta = "SELECT Clave_Docente FROM datos_docentes WHERE Clave_Docente='$Clave_Docente'";
    $querys=mysqli_query($con,$consulta);
    $cant_duplicidad = mysqli_num_rows($querys);
         if($cant_duplicidad != 0)
               {
                  mysqli_close($con);
                  echo '<script type="text/javascript">alert("¡Este Maestro Ya se encuentra registrado!");</script>';
                  echo '<script type="text/javascript">window.location.href = "http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/Docente_index.php";</script>';
               }
               else{
                        $insetarData = "INSERT INTO datos_docentes(
                           Clave_Docente,
                           Nombre,
                           Ape_paterno,
                           Ape_Materno,
                           Area
                        ) VALUES(
                           '$Clave_Docente',
                           '$Nombre',
                           '$Apellido_p',
                           '$Apellido_M', 
                           '$Area'
                        )";
                        $query = mysqli_query($con, $insetarData);

                        if($query)
                           {
                              mysqli_close($con);
                              echo '<script type="text/javascript">alert("¡Maestro Registrado!");</script>';
                              header('location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/Docente_index.php');
                           }
                     }
                     
 ?>