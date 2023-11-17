<?php
$host = "127.0.0.1";
$user = "root";
$password = "";
$db = "constructora";

$conexion = new mysqli($host, $user, $password, $db);

if ($conexion->connect_errno) {
    echo "Falló la conexión a la base de datos " . $conexion->connect_error;
}
