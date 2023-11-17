<?php
require_once("config.php");

$nombre = $_GET["nameInput"];
$descripcion = $_GET["descriptionInput"];
$ubicacion = $_GET["locationInput"];


$sql = "UPDATE obra SET descr_art='$nombre', cant=$cantidad, precio_art=$precio WHERE id_art=$clave";
if ($conn->query($sql) === TRUE) {
    echo "Cambio de  registro creado con éxito";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
// Esperar 5 segundos antes de redirigir


header("Location: index.html");

?>
-