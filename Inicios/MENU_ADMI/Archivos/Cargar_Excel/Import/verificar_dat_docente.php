<html lang="es">
	<head> 
		<title>registros_Alumnos</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
        <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Css-Scripts/style.css">
    <link rel="stylesheet" href="http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/MENU_ADMI/Css-Scripts/estilo2.css"> 
       <!-- <link rel="stylesheet" href="css/cargando.css">-->
      <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
                <table class="table" >
                    <tbody>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Clave_Docente</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Area</th>
                    </tr>
                    <tr>
                <?php
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
                                if($clave != "")
                                {
                ?>
                                            <td><?php echo utf8_encode($i)?></td>
                                            <td><?php echo utf8_encode($clave)?></td>
                                            <td><?php echo utf8_encode($Nombre + $Apellido_P + $Apellido_M)?></td>
                                            <td><?php echo utf8_encode($Area)?></td>
                                        </tr>
                <?php
    	                        }
                            }
                        $i++;	
                    }
                    $numerfinal = $i - 1;
                    ?>
<center class="h1"><?php echo $numerfinal?> <br> Datos encontrados</center>
            </tbody>
            </table>
</body>
</html>


