<?php
require_once("config.php");

$descripcion = $_POST["descObra"];
$url_ubicacion = $_POST["ubicacionObra"];
$encargado = $_POST["encargadoObra"];
$nombre = $_POST["nombreObra"];
$imagen = $_POST["imageInput"];

$target_dir = '/img';
if (isset($_POST['submit'])) {
	if (getimagesize($_FILES['imageInput']['tmp_name']) == false) {
		echo "<br />Please Select An Image.";
	} else {

		//declare variables
		$image = $_FILES['imageInput']['tmp_name'];
		$name = $_FILES['imageInput']['name'];
		$image = base64_encode(file_get_contents(addslashes($image)));
		$sqlInsertimageintodb = "INSERT INTO 'imagen'('imagen') VALUES ('$image')";
		if (mysqli_query($conexion, $sqlInsertimageintodb)) {
			echo "<br />Image uploaded successfully.";
		} else {
			echo "<br />Image Failed to upload.<br />";
		}
	}
}

// if (count($_FILES) > 0) {
// 	if (is_uploaded_file($_FILES['imageInput']['tmp_name'])) {
// 		$imgData = file_get_contents($_FILES['imageInput']['tmp_name']);
// 		$sql2 = "INSERT INTO imagen (imagen)  VALUES (?)";
// 		$statement = $conexion->prepare($sql2);
// 		$statement->bind_param('s', $imgData);
// 		printf($statement);
// 		$current_id = $statement->execute() or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_connect_error());
// 	}
// }

// $sql = "INSERT INTO obra (descripcion, url_ubicacion, encargado, nombre) VALUES ('" . $descripcion . "', '" . $url_ubicacion . "','" . $encargado . "','" . $nombre . "');";
// if ($conexion->query($sql) === TRUE) {
// 	echo "Nuevo registro creado con éxito";
// } else {
// 	echo "Error: " . $sql . "<br>" . $conexion->error;
// }

$conexion->close();
