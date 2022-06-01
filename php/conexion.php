<?php

$servidor = "localhost";
$nombreBd = "cuenta_usuario";
$usuario= "root";
$pass= "";

$conexion = new mysqli($servidor,$usuario,$pass,$nombreBd);
if($conexion -> connect_error){
    die("no se pudo conectar");
}
?>