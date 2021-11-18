<?php

include('config.php');
/*__Algoritmo para Crear aleatoriamente los 4 digitos de la contraseña__ */

$fileContacts = $_FILES['fileContacts']; 
$fileContacts = file_get_contents($fileContacts['tmp_name']); 

$fileContacts = explode("\n", $fileContacts);
$fileContacts = array_filter($fileContacts); 
$i = 0;
// preparar contactos (convertirlos en array)
foreach ($fileContacts as $contact) 
{
    $cantidad_registros = count($fileContacts);
    $cantidad_regist_agregados =  ($cantidad_registros - 1);
    if ($i!=0) 
        {
            $contactList = explode(",", $contact);
            $Clave          = !empty($contactList[0])  ? ($contactList[0]) : '';
            $Nombre            = !empty($contactList[1])  ? ($contactList[1]) : '';
            $Tipo        = !empty($contactList[2])  ? ($contactList[2]) : '';

            if( !empty($Num_Ctrl) )
                {
                    $checkemail_duplicidad = ("SELECT Clave FROM  info_materias WHERE Num_Ctrl='".($Clave)."' ");
                    $ca_dupli = mysqli_query($con, $checkemail_duplicidad);
                    $cant_duplicidad = mysqli_num_rows($ca_dupli);
                 
            //No existe Registros Duplicados
            if ( $cant_duplicidad == 0 ) 
                {
                    $insertarMateria = "INSERT INTO  info_materias( 
                        Clave, 
                        Nombre,
                        Tipo
                    ) VALUES(
                        '$Clave',
                        '$Nombre',
                        '$Tipo'
                    )";
        
                    mysqli_query($con, $insertarMateria);
                    
        
                }  
    /**Caso Contrario actualizo el o los Registros ya existentes*/
                else
                    {
                        $updateData =  ("UPDATE info_estudiantes SET 
                            Clave = '".$Clave. "', 
                            Nombre='" .$Nombre. "',
                            Tipo='" .$Tipo. "'
                            WHERE Clave ='".$Clave."'
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
