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
		$Nombre            	= !empty($contactList[1])  ? ($contactList[1]) : '';
		$Apellido_P        	= !empty($contactList[2])  ? ($contactList[2]) : '';
        $Apellido_M        	= !empty($contactList[3])  ? ($contactList[3]) : '';
        $Area        	    = !empty($contactList[4])  ? ($contactList[4]) : '';
        
    $insertar = "INSERT INTO datos_docentes( 
            Clave_Docente,
            Nombre,
            Ape_paterno,
            Ape_materno,
            Area	
        ) VALUES(
            '$clave',
            '$Nombre',
            '$Apellido_P',
            '$Apellido_M',
            '$Area'
        )";
        mysqli_query($con, $insertar);
    }
	$i++;
	
}
?>