<?php

include('config.php');

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
    if ($i!=0) {
		$contactList = explode(",", $contact);
		$clave       		= !empty($contactList[0])  ? ($contactList[0]) : '';
		$Nombre_Materia     = !empty($contactList[1])  ? ($contactList[1]) : '';
		$Tipo             	= !empty($contactList[2])  ? ($contactList[2]) : '';
       
        
    $insertar = "INSERT INTO clientes( 
            clave,
            Nombre_Materia,
            Tipo
        ) VALUES(
            '$clave',
            '$Nombre_Materia',
            '$Tipo'
        )";
        mysqli_query($con, $insertar);
    }
	$i++;
	
}
?>