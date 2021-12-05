<?php
 include ('conexion.php');
    $Clave = $_POST['Clave'];
    $Nombre = utf8_decode($_POST['Nombre']);
    $Nom_Abreviado =utf8_decode($_POST['Abreviatura']);
    $Semestre = $_POST['Semestre'];
    $Tipo = $_POST['Tipo'];
    
    $consulta = "SELECT Clave FROM datos_materias WHERE Clave='$Clave'";
    $querys=mysqli_query($con,$consulta);
    $cant_duplicidad = mysqli_num_rows($querys);
         if($cant_duplicidad != 0)
               {
                  echo '<script type="text/javascript">alert("¡Esta Materia Ya Se Encuentra Registrada!");</script>';
                  echo '<script type="text/javascript">window.location.href = "http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/Materia_index.php";</script>';
               }
               else
               {
                  $insetarData = "INSERT INTO datos_materias(
                     Clave,
                     Nombre,
                     Nom_Abreviado,
                     Semestre,
                     Tipo
                  ) VALUES(
                     '$Clave',
                     '$Nombre',
                     '$Nom_Abreviado',
                     '$Semestre',
                     '$Tipo'
                  )"; 
                  $query = mysqli_query($con, $insetarData);

                  if($query)
                     {
                        header('location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/Materia_index.php');
                     }
               }
?>