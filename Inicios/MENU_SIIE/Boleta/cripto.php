<?php
include "mcript.php";
// Como usar las funciones para encriptar y desencriptar.
$dato = 5385;
//Encripta información:
$dato_encriptado = $encriptar($dato);
//Desencripta información:
$dato_desencriptado = $desencriptar($dato_encriptado);
echo 'Dato encriptado: '. $dato_encriptado . '<br>';
echo 'Dato desencriptado: '. $dato_desencriptado . '<br>';
?>
