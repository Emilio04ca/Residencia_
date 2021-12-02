<?php
 include ('conexion.php');

   $Clave_RFC = $_POST['Clave_RFC'];
   $Nombre = $_POST['Nombre'];
   $Apellido_p = $_POST['Ape_Paterno'];
   $Apellido_M = $_POST['Ape_Materno'];
   
   $consulta = "SELECT Clave_RFC FROM info_maestros WHERE Clave_RFC='$Clave_RFC'";
    $querys=mysqli_query($con,$consulta);
    $cant_duplicidad = mysqli_num_rows($querys);
         if($cant_duplicidad != 0)
               {
                  mysqli_close($con);
                  echo '<script type="text/javascript">alert("¡Este Maestro Ya se encuentra registrado!");</script>';
                  echo '<script type="text/javascript">window.location.href = "http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/Docente_index.php";</script>';
               }
               else{
                        $insetarData = "INSERT INTO info_maestros(
                           Clave_RFC,
                           Nombre,
                           Ape_paterno,
                           Ape_Materno
                        ) VALUES(
                           '$Clave_RFC',
                           '$Nombre',
                           '$Apellido_p',
                           '$Apellido_M'
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