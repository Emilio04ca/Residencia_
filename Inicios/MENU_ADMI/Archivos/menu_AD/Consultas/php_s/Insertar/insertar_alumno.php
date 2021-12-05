<?php
 include ('conexion.php');
 require_once("../../cripto/mcript.php");
    $Num_Ctrl = $_POST['Num_Ctrl'];
    $Nombre = utf8_decode($_POST['Nombre']);
    $Apellido_p = utf8_decode($_POST['Apellido_p']);
    $Apellido_M = utf8_decode($_POST['Apellido_m']);
    $Semestre = $_POST['Semestre'];
    $Especialidad = utf8_decode($_POST['Especialidad']);
    $Grupo = $_POST['Grupo'];
    $Turno = $_POST['Turno'];
    $Periodo = $_POST['Periodo'];
    $Vigente = "activo";
                                 
                                 function shuffle_nums($min,$max, $count)
                                 {
                                    $nums = range($min, $max);
                                    shuffle($nums);
                                    
                                    $response = array();
                                    for($i=0;$i<$count && $i<count($nums);$i++)
                                    {
                                       array_push($response, $nums[$i]);
                                    }
                                    $string = implode("",$response);
                                    $valorentero = (int)$string;
                                    return $valorentero;
                                 }
    
    $consulta = "SELECT Num_Ctrl FROM datos_alumnos WHERE Num_Ctrl='$Num_Ctrl'";
    $querys=mysqli_query($con,$consulta);
    $cant_duplicidad = mysqli_num_rows($querys);
         if($cant_duplicidad != 0)
               {
                  mysqli_close($con);
                  echo '<script type="text/javascript">alert("¡Este Numero de Control Ya se encuentra Registrado!");</script>';
                  echo '<script type="text/javascript">window.location.href = "http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/alumno_index.php";</script>';
               }
               else{
                  $dato_encriptado  = (int)shuffle_nums(1, 9, 4);
	               $Numero = (string)$encriptar($dato_encriptado);

                        $insetarData = "INSERT INTO datos_alumnos(
                           Num_Ctrl, 
                           Nombre,
                           Ape_paterno,
                           Ape_Materno,
                           Especialidad,
                           Semestre,
                           Grupo,
                           Turno,
                           Periodo,
                           Vigente
                        ) VALUES(
                           '$Num_Ctrl',
                           '$Nombre',
                           '$Apellido_p',
                           '$Apellido_M',
                           '$Especialidad',
                           '$Semestre',
                           '$Grupo',
                           '$Turno',
                           '$Periodo',
                           '$Vigente'
                        )";
                        $insertarlogin = "INSERT INTO login_est( 
                           Num_Ctrl, 
                         Contrasena
                         
                           ) VALUES(
                              '$Num_Ctrl',
                              '$Numero'
                           )";
                        $query = mysqli_query($con, $insetarData);
                        $query = mysqli_query($con, $insertarlogin);

                        if($query){
                           mysqli_close($con);
                           header('location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Archivos/menu_AD/Consultas/alumno_index.php');
                        }
                        }

                        
                                 

 ?>