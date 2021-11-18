<?php

include('config.php');
/*__Algoritmo para Crear aleatoriamente los 4 digitos de la contraseña__ */
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
        $clave  = 'la encripatcion es lo mejor que puede haber, por el simpe hecho de que la gnete jamas debe de saber sobre estos datos';
        //Metodo de encriptación
        $method = 'aes-256-cbc';
        // Puedes generar una diferente usando la funcion $getIV()
        $iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");
         /*
         Encripta el contenido de la variable, enviada como parametro.
          */
         $encriptar = function ($valor) use ($method, $clave, $iv) {
             return openssl_encrypt ($valor, $method, $clave, false, $iv);
         };

$fileContacts = $_FILES['fileContacts']; 
$fileContacts = file_get_contents($fileContacts['tmp_name']); 

$fileContacts = explode("\n", $fileContacts);
$fileContacts = array_filter($fileContacts); 
$i = 0;
// preparar contactos (convertirlos en array)
foreach ($fileContacts as $contact) 
{
    
    //$Numero = password_hash($num, PASSWORD_DEFAULT);
    $dato_encriptado  = (int)shuffle_nums(1, 9, 4);
    $Numero = (string)$encriptar($dato_encriptado);
    $cantidad_registros = count($fileContacts);
    $cantidad_regist_agregados =  ($cantidad_registros - 1);
    if ($i!=0) 
        {
            $contactList = explode(",", $contact);
            $Num_Ctrl          = !empty($contactList[0])  ? ($contactList[0]) : '';
            $Nombre            = !empty($contactList[1])  ? ($contactList[1]) : '';
            $Ape_paterno        = !empty($contactList[2])  ? ($contactList[2]) : '';
            $Ape_Materno        = !empty($contactList[3])  ? ($contactList[3]) : '';
            $Semestre          = !empty($contactList[4])  ? ($contactList[4]) : '';
            $Especialidad           = !empty($contactList[5])  ? ($contactList[5]) : '';
            $Grupo           = !empty($contactList[6])  ? ($contactList[6]) : '';
            $Periodo           = !empty($contactList[7])  ? ($contactList[7]) : '';
            $Status           = !empty($contactList[8])  ? ($contactList[8]) : '';

            if( !empty($Num_Ctrl) )
                {
                    $checkemail_duplicidad = ("SELECT Num_Ctrl FROM info_estudiantes WHERE Num_Ctrl='".($Num_Ctrl)."' ");
                    $ca_dupli = mysqli_query($con, $checkemail_duplicidad);
                    $cant_duplicidad = mysqli_num_rows($ca_dupli);
                 
            //No existe Registros Duplicados
            if ( $cant_duplicidad == 0 ) 
                {
                    $insertarData = "INSERT INTO info_estudiantes( 
                        Num_Ctrl, 
                        Nombre,
                        Ape_paterno,
                        Ape_Materno,
                        Semestre,
                        Especialidad,
                        Grupo,
                        Periodo,
                        Status
                    ) VALUES(
                        '$Num_Ctrl',
                        '$Nombre',
                        '$Ape_paterno',
                        '$Ape_Materno',
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
        
                    mysqli_query($con, $insertarData);
                    mysqli_query($con, $insertarlogin);
        
                }  
    /**Caso Contrario actualizo el o los Registros ya existentes*/
                else
                    {
                        $updateData =  ("UPDATE info_estudiantes SET 
                            Num_Ctrl = '".$Num_Ctrl. "', 
                            Nombre='" .$Nombre. "',
                            Ape_paterno='" .$Ape_paterno. "',
                            Ape_Materno='" .$Ape_Materno. "',
                            Semestre='" .$Semestre. "',
                            Especialidad='" .$Especialidad. "',
                            Grupo= '".$Grupo."',
                            Periodo= '".$Periodo."',
                            Status ='" .$Status. "'
                            WHERE Num_Ctrl ='".$Num_Ctrl."'
                        ");
                    }
        }
        else
        {
            $i = 0;
            mysqli_close($con);
        }

        }
    $i++;
    
}
?>


