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
		$contactList = explode("|", $contact);
		
        $Materia             	    = !empty($contactList[0])  ? ($contactList[0]) : '';
        $Grupo             	        = !empty($contactList[1])  ? ($contactList[1]) : '';
        $Especilidad             	= !empty($contactList[2])  ? ($contactList[2]) : '';
        $Semestre       		    = !empty($contactList[3])  ? ($contactList[3]) : '';
        $Asitencias_totales         = !empty($contactList[4])  ? ($contactList[4]) : '';
		$Unidad                     = !empty($contactList[5])  ? ($contactList[5]) : '';
		$data_periodo               = !empty($contactList[6])  ? ($contactList[6]) : '';
        $Periodo                    = trim($data_periodo);
        
        if($Especilidad !="")
        {
            $insertar = "INSERT INTO  asistencias_materias( 
                    Materia,
                    Grupo,
                    Especialidad,
                    Semestre,
                    Asitencias_totales,
                    Unidad,
                    Periodo
                ) VALUES(
                    
                    '$Materia',
                    '$Grupo',
                    '$Especilidad',
                    '$Semestre',
                    '$Asitencias_totales',
                    '$Unidad',
                    '$Periodo'
                )";
                mysqli_query($con, $insertar);
        }
        else
            {
                $i = 0;
                mysqli_close($con);
                break;
            }
    }
	$i++;
	
}
?>