<?php
 include ('conexion.php');
 require_once("../../cripto/mcript.php");
    $Num_Ctrl = $_POST['Num_Ctrl'];
    $Nombre = $_POST['Nombre'];
    $Apellido_p = $_POST['Apellido_p'];
    $Apellido_M = $_POST['Apellido_m'];
    $Semestre = $_POST['Semestre'];
    $Especialidad = $_POST['Especialidad'];
    $Grupo = $_POST['Grupo'];
    $Periodo = $_POST['Periodo'];
    $Status = 1;
                                 
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
    
    $consulta = "SELECT Num_Ctrl FROM info_estudiantes WHERE Num_Ctrl='$Num_Ctrl'";
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

                        $insetarData = "INSERT INTO info_estudiantes(
                           Num_Ctrl,
                           Nombre,
                           Ape_paterno,
                           Ape_Materno,
                           Semestre,
                           Especialidad, 
                           Grupo,
                           Periodo,
                           status
                        ) VALUES(
                           '$Num_Ctrl',
                           '$Nombre',
                           '$Apellido_p',
                           '$Apellido_M',
                           '$Semestre',
                           '$Especialidad',
                           '$Grupo',
                           '$Periodo',
                           '$Status'
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