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
		$Clave_Materia       		= !empty($contactList[0])  ? ($contactList[0]) : '';
		$Grupo                      = !empty($contactList[1])  ? ($contactList[1]) : '';
		$Semestre             	    = !empty($contactList[2])  ? ($contactList[2]) : '';
        $Especialidad               = !empty($contactList[3])  ? ($contactList[3]) : '';
        $Turno                      = !empty($contactList[4])  ? ($contactList[4]) : '';
        $Clave_Maestro              = !empty($contactList[5])  ? ($contactList[5]) : '';
        $Periodos                   = !empty($contactList[6])  ? ($contactList[6]) : '';
        $Periodo = trim($Periodos);
        if($Clave_Maestro !="")
        {
            $insertar = "INSERT INTO materia_relacion( 
                    Clave_Materia,
                    Grupo,
                    Semestre,
                    Especialidad,
                    Turno,
                    Clave_Maestro,
                    Periodo
                ) VALUES(
                    '$Clave_Materia',
                    '$Grupo',
                    '$Semestre',
                    '$Especialidad',
                    '$Turno',
                    '$Clave_Docente',
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