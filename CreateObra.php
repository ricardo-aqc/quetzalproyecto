<?php
require_once("config.php");

/*$descripcion=$_GET["descObra"];
$url_ubicacion=$_GET["ubicacionObra"];
$encargado=$_GET["encargadoObra"];
$nombre=$_GET["nombreObra"];

$sql="INSERT INTO obra (descripcion, url_ubicacion, encargado, nombre) VALUES ('".$descripcion."', '".$url_ubicacion."','".$encargado."','".$nombre."');";
if ($conexion->query($sql) === TRUE) {
	echo "Nuevo registro creado con éxito";
} else {
	echo "Error: " . $sql . "<br>" . $conexion->error;
}*/

$status="error";
/*(if(!empty($_FILES["imageInput"]["name"])) {
	var_dump($_FILES);

	$fileName = basename($_FILES["imageInput"]["name"]);
	$fileType = pathinfo($fileName, PATHINFO_EXTENSION);

	$allowTypes = array('jpg','png','jpeg','gif');
	if(in_array($fileType, $allowTypes)){
		$image = $_FILES["imageInput"]["tmp_name"];
		$imageContent = addslashes(file_get_contents($image));

		$insert = $conexion->query("INSERT INTO imagen (imagen) VALUES ('".$imageContent."')");
		if($conexion->query($sql) === TRUE) {
			echo "Nuevo registro creado con éxito";
		} else {
			echo "Error: " . $sql . "<br>" . $conexion->error;
		}
	}
}*/

// Assume $filename is the path to the file you want to convert to Blob
$image = $_GET["imageInput"];
$filename = "C:/xampp/htdocs/Php/quetzalproyecto/img/$image";
// Check if the file exists
if (file_exists($filename)) {
    // Read the file content
    $fileContent = file_get_contents($filename);

    // Create a Blob object
    $blob = base64_encode($fileContent); // Convert the binary data to base64

	$insert = $conexion->query("INSERT INTO imagen (imagen) VALUES ('".$blob."')");
}else
	echo "error";
$conexion->close();
?>