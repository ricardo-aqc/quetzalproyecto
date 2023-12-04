<?php
require_once("config.php");

$nombre = $_POST["nameInput"];
$descripcion = $_POST["descriptionInput"];
$linkurl = $_POST["locationInput"];
$clave = 1;


$sql = "UPDATE obra SET `nombre`='$nombre', `descripcion`='$descripcion', `url_ubicacion` = '$linkurl' WHERE obra_id=$clave";
if ($conexion->query($sql) === TRUE) {
    echo "Cambio de  registro creado con éxito";
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();
// Esperar 5 segundos antes de redirigir


header("Location: admin dashboard.php");

?>
-