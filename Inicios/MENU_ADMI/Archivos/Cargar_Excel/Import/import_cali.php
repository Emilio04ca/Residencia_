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
		$Semestre       = !empty($contactList[2])  ? ($contactList[2]) : '';
        $Grupo          = !empty($contactList[3])  ? ($contactList[3]) : '';
        $Calificacion   = !empty($contactList[4])  ? ($contactList[4]) : '';
        $Asistencia     = !empty($contactList[5])  ? ($contactList[5]) : '';
        $Unidad         = !empty($contactList[6])  ? ($contactList[6]) : '';
        $Periodo        = !empty($contactList[7])  ? ($contactList[7]) : '';
        $Acreditacions   = !empty($contactList[8])  ? ($contactList[8]) : '';
        $Acreditacion = trim($Acreditacions);
       
        
    $insertar = "INSERT INTO datos_calificaciones( 
            Num_Ctrl,
            Clave_Materia,
            Semestre,
            Grupo,
            Calificacion,
            Asistencia,
            Unidad,
            Periodo,
            Acreditacion

        ) VALUES(
            '$Num_Ctrl',
            '$Materia',
            '$Semestre',
            '$Grupo',
            '$Calificacion',
            '$Asistencia',
            '$Unidad',
            '$Periodo',
            '$Acreditacion'

        )";
        mysqli_query($con, $insertar);
    }
	$i++;
	
}


?>