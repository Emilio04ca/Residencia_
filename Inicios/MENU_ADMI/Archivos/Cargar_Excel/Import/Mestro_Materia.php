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
		$Clave_Materia       		= !empty($contactList[0])  ? ($contactList[0]) : '';
		$ID_Maestro                 = !empty($contactList[1])  ? ($contactList[1]) : '';
		$Especilidad             	= !empty($contactList[2])  ? ($contactList[2]) : '';
        $Grupo                      = !empty($contactList[3])  ? ($contactList[3]) : '';
        $Periodo                    = !empty($contactList[4])  ? ($contactList[4]) : '';
        
    $insertar = "INSERT INTO clientes( 
            Clave_Materia,
            ID_Maestro,
            Especilidad,
            Grupo,
            Periodo
        ) VALUES(
            '$Clave_Materia',
            '$ID_Maestro',
            '$Especilidad',
            '$Grupo',
            '$Periodo'
        )";
        mysqli_query($con, $insertar);
    }
	$i++;
	
}
?>