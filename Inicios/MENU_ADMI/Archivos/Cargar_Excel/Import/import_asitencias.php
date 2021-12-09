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
		$Especilidad             	= !empty($contactList[0])  ? ($contactList[0]) : '';
        $Semestre             	    = !empty($contactList[1])  ? ($contactList[1]) : '';
        $Periodo             	    = !empty($contactList[2])  ? ($contactList[2]) : '';
        $Nombre_Materia       		= !empty($contactList[3])  ? ($contactList[3]) : '';
        $Grupo             	        = !empty($contactList[4])  ? ($contactList[4]) : '';
		$Unidad                     = !empty($contactList[5])  ? ($contactList[5]) : '';
		$Numero_Asitencias_Totaless  = !empty($contactList[6])  ? ($contactList[6]) : '';
        $Numero_Asitencias_Totaless = trim($Numero_Asitencias_Totaless);
       
        
    $insertar = "INSERT INTO clientes( 
            Especialidad,
            Semestre,
            Periodo,
            Materia,
            Grupo,
            Unidad,
            Asitencias_totales
        ) VALUES(
            '$Especilidad',
            '$Semestre',
            '$Periodo',
            '$Nombre_Materia',
            '$Grupo',
            '$Unidad',
            '$Numero_Asitencias_Totales'
        )";
        mysqli_query($con, $insertar);
    }
	$i++;
	
}
?>