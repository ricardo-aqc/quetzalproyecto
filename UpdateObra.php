<?php
require_once("config.php");

$nombre = $_GET["nameInput"];
$descripcion = $_GET["descriptionInput"];
$encargado = $_GET["encargadoObra"];
$ubicacion = $_GET["locationInput"];


$sql = "UPDATE obra SET descripcion='$descripcion', url_ubicacion='$ubicacion', nombre='$nombre' WHERE encargado='$encargado'";
if ($conexion->query($sql) === TRUE) {
    echo "Cambio de  registro creado con éxito";
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}


$conexion->close();
// Esperar 5 segundos antes de redirigir
header("Location: admin dashboard.php");
