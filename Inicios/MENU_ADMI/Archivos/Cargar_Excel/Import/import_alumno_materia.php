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
		$Num_Ctrl             	= !empty($contactList[0])  ? ($contactList[0]) : '';
        $Materia             	= !empty($contactList[1])  ? ($contactList[1]) : '';
        $Grupo             	    = !empty($contactList[2])  ? ($contactList[2]) : '';
        $Semestre       		= !empty($contactList[3])  ? ($contactList[3]) : '';
        $Periodos             	= !empty($contactList[4])  ? ($contactList[4]) : '';
        $Periodo =trim($Periodos);
       
        if($Num_Ctrl != "")
        {
            $insertar = "INSERT INTO clientes( 
                    Num_Ctrl,
                    Clave_Materia,
                    Grupo,
                    Semestre,
                    Periodo
                ) VALUES(
                    '$Num_Ctrl',
                    '$Materia',
                    '$Grupo',
                    '$Semestre',
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