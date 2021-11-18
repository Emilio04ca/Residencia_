<?php
require_once("config.php");
//include '../../helps/mcript.php';
$clave  = 'la encripatcion es lo mejor que puede haber, por el simpe hecho de que la gnete jamas debe de saber sobre estos datos';
//Metodo de encriptación
$method = 'aes-256-cbc';
// Puedes generar una diferente usando la funcion $getIV()
$iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");
 /*
 Encripta el contenido de la variable, enviada como parametro.
  */
 $encriptar = function ($valor) use ($method, $clave, $iv) {
     return openssl_encrypt ($valor, $method, $clave, false, $iv);
 };
 /*
 /*Genera un valor para IV*/


$Num_Ctrl = $_POST['no_de_control'];
$cont_ant = $_POST['anterior'];
$contan = $encriptar($cont_ant);
$Cont = $_POST['nip_nuevo'];
$Contrasena = $encriptar($Cont);
$valor = "1";

if ($_POST['no_de_control'] != null && $_POST['nip_nuevo'])  {

	$consulta = "SELECT Num_Ctrl, Contrasena FROM login_est WHERE Num_Ctrl = '$Num_Ctrl'";
	$resultado = $conn->query($consulta);
	$fila = $resultado->fetch_assoc();
	$resul1 = $fila['Num_Ctrl'];
	$resul2 = $fila['Contrasena'];

	if ($resul1 == $Num_Ctrl && $resul2 == $contan) {

		$consultas = "UPDATE login_est SET Contrasena = '$Contrasena' WHERE Num_Ctrl = '$Num_Ctrl'";
		mysqli_query($conn, $consultas);

		if($conn->errno) die($conn->error);
		
	}
	else{
		return print("Error al actulizar");
	}
	

}
else
{
	return print("Error .....");
}
mysqli_close($conn);
session_start();
session_destroy();
// Redirect to the login page:
header('Location: http://localhost:8080/SIIE(CBTIS)%20-%20V1.2/Inicios/login-php/vista/Principal.php');