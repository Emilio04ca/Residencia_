<?php
 include ('conexion.php');
    $subir = $_POST['nombre'];
    
    if (isset($subir))
    {
    $clave_carrera = $_POST['clave_carrera'];
    $nombre = $_POST['nombre'];
    $clave_division = $_POST['clave_division'];

    $consulta = "SELECT clave_carrera FROM carrera WHERE clave_carrera='$clave_carrera'";
    $querys=mysqli_query($con,$consulta);
    $cant_duplicidad = mysqli_num_rows($querys);
        if($cant_duplicidad != 0)
            {
                mysqli_close($con);
                echo '<script type="text/javascript">alert("¡Esta clave de carrera ya se encuentra Registrada!");</script>';
                echo '<script type="text/javascript">window.location.href = "http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/Carreras.php";</script>';
            }
            else
                {
                    $insetarData = "INSERT INTO carrera(
                        clave_carrera, 
                        Nombre,
                        clave_division
                    ) VALUES(
                        '$clave_carrera',
                        '$nombre',
                        '$clave_division'
                    )";
                    $query = mysqli_query($con, $insetarData);
                    if($query){
                        mysqli_close($con);
                        header('location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/Carreras.php');
                    }
                    }
                }

 ?>