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
<style>
        input {
  border-style: solid;
  background-color:  #fff;
  color:#014E82;
  padding: 1px 3px 1px 3px;
  font-size: 14px;
  text-align: center;
  width: 100px;
}
    </style>
</head>
<body>
                <table class="table" >
                    <tbody>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Num_Ctrl</th>
                        <th scope="col">Materia</th>
                        <th scope="col">Semestre</th>
                        <th scope="col">Grupo</th>
                        <th scope="col">Calificacion</th>
                        <th scope="col">Asistencia</th>
                        <th scope="col">Unidad</th>
                        <th scope="col">Periodo</th>
                        <th scope="col">Acreditacion</th>
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
                            $Num_Ctrl       = !empty($contactList[0])  ? ($contactList[0]) : '';
                            $Materia        = !empty($contactList[1])  ? ($contactList[1]) : '';
                            $Semestre       = !empty($contactList[2])  ? ($contactList[2]) : '';
                            $Grupo          = !empty($contactList[3])  ? ($contactList[3]) : '';
                            $Calificacion   = !empty($contactList[4])  ? ($contactList[4]) : '';
                            $Asistencia     = !empty($contactList[5])  ? ($contactList[5]) : '';
                            $Unidad         = !empty($contactList[6])  ? ($contactList[6]) : '';
                            $Periodo        = !empty($contactList[7])  ? ($contactList[7]) : '';
                            $Acreditacion   = !empty($contactList[8])  ? ($contactList[8]) : '';
                                if($Num_Ctrl != "")
                                {
                ?>
                                            <td><?php echo utf8_encode($i)?></td>
                                            <td><?php echo utf8_encode($Num_Ctrl)?></td>
                                            <td><?php echo utf8_encode($Materia)?></td>
                                            <td><?php echo utf8_encode($Semestre)?></td>
                                            <td><?php echo utf8_encode($Grupo)?></td>
                                            <td><?php echo utf8_encode($Calificacion)?></td>
                                            <td><?php echo utf8_encode($Asistencia)?></td>
                                            <td><?php echo utf8_encode($Unidad)?></td>
                                            <td><?php echo utf8_encode($Periodo)?></td>
                                            <td><?php echo utf8_encode($Acreditacion)?></td>
                                        </tr>
                <?php
    	                        }
                            }
                        $i++;	
                    }
                    $numerfinal = $i - 1;
                    ?>
<center class="h1"><?php echo $numerfinal?> <br> Datos encontrados</center>
<center><input type="button" value="Página anterior"  onClick="history.go(-1);"> </center>
            </tbody>
            </table>
</body>
</html>


