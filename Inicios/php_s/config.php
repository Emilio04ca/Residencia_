<?php
header("Content-Type: text/html;charset=utf-8");
$usuario  = "root";
$password = "";
$servidor = "localhost";
$basededatos = "cbtis_bd";
$conn = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
mysqli_query($conn,"SET SESSION collation_connection ='utf8_unicode_ci'");
$db = mysqli_select_db($conn, $basededatos) or die("Upps! Error en conectar a la Base de Datos");
?>