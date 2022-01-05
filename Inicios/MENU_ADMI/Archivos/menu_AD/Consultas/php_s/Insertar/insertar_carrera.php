<?php
 include ('conexion.php');
    $subir = utf8_decode($_POST['nombre']);
    
    if (isset($subir))
    {
        $id= $_POST['id'];

    $consulta = "SELECT id FROM datos_carrera WHERE id='$id'";
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
                    $insetarData = "INSERT INTO datos_carrera(
                        id,
                        Nombre
                    ) VALUES(
                        '$id',
                        '$subir'
                    )";
                    $query = mysqli_query($con, $insetarData);
                    if($query){
                        mysqli_close($con);
                        header('location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/Carreras.php');
                    }
                    }
                }

 ?>