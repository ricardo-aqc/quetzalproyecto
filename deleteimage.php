<?php
$usuario = "root";
$password = "";
$servidor = "127.0.0.1";
$basededatos = "constructora";

$conexion = mysqli_connect($servidor, $usuario, "") or die("No se a podido conectar al servidor de la base de datos");

$db = mysqli_select_db($conexion, $basededatos) or die("Ups! Parece ser que no se a podido conectar a la base de datos");


$index = $_POST["index1"];
$sql2 = "DELETE imagen FROM obra_imagen INNER JOIN imagen ON obra_imagen.imagen_id=imagen.imagen_id WHERE  obra_imagen.imagen_id = ?";
$stmt2 = $conexion->prepare($sql2);
$stmt2->bind_param('s', $index);
$stmt2->execute();
if ($stmt2->affected_rows > 0) {
    printf("Success");
}
