<?php
require_once("config.php");

$descripcion = $_GET["descObra"];
$url_ubicacion = $_GET["ubicacionObra"];
$encargado = $_GET["encargadoObra"];
$nombre = $_GET["nombreObra"];

$sql = "INSERT INTO obra (descripcion, url_ubicacion, encargado, nombre) VALUES ('" . $descripcion . "', '" . $url_ubicacion . "','" . $encargado . "','" . $nombre . "');";
if ($conexion->query($sql) === TRUE) {
	echo "Nuevo registro creado con éxito";
} else {
	echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();
