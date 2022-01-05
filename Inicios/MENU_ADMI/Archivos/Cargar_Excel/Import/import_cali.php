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
       
        if($Num_Ctrl !="")
        {
            $duplicidad = ("SELECT Num_Ctrl FROM datos_calificaciones WHERE Num_Ctrl='$Num_Ctrl' and Clave_Materia='$Materia' 
            and Grupo='$Grupo' and Unidad='$Unidad' and Periodo='$Periodo'");
			$ca_dupli = mysqli_query($con, $duplicidad);
			$cant_duplicidad = mysqli_num_rows($ca_dupli);
		    //No existe Registros Duplicados
			if ( $cant_duplicidad == 0 ) 
				{
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
                /**Caso Contrario actualizo el o los Registros ya existentes*/
				else
                {
                    $updateData =  ("UPDATE datos_calificaciones SET 
                        Clave_Materia 		=   '$Materia',
                        Semestre	        =   '$Semestre',
                        Grupo	            =   '$Grupo',
                        Calificacion        =   '$Calificacion',
                        Asistencia	        =   '$Asistencia',
                        Unidad		        =   '$Unidad',
                        Periodo		        =   '$Periodo',
                        Acreditacion		=   '$Acreditacion'
                        WHERE 		Num_Ctrl ='$Num_Ctrl'
                    ");
                    mysqli_query($con, $updateData);
                }

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