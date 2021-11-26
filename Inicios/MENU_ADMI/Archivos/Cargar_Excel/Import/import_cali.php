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
		$Num_Ctrl       = !empty($contactList[0])  ? ($contactList[0]) : '';
		$Materia        = !empty($contactList[1])  ? ($contactList[1]) : '';
		$Calificacion   = !empty($contactList[2])  ? ($contactList[2]) : '';
        $Asistencia     = !empty($contactList[3])  ? ($contactList[3]) : '';
        $Unidad         = !empty($contactList[4])  ? ($contactList[4]) : '';
        $Periodo        = !empty($contactList[5])  ? ($contactList[5]) : '';
       
        
    $insertar = "INSERT INTO info_materias( 
            Num_Ctrl,
            Clave_Materia,
            Calificacion,
            Asistencia,
            Unidad,
            Periodo
        ) VALUES(
            '$Num_Ctrl',
            '$Materia',
            '$Calificacion',
            '$Asistencia',
            '$Unidad',
            '$Periodo'
        )";
        mysqli_query($con, $insertar);
    }
	$i++;
	
}
?>