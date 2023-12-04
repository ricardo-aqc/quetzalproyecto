<?php
$usuario = "root";
$password = "";
$servidor = "127.0.0.1";
$basededatos = "constructora";

$conexion = mysqli_connect($servidor, $usuario, "") or die("No se a podido conectar al servidor de la base de datos");

$db = mysqli_select_db($conexion, $basededatos) or die("Ups! Parece ser que no se a podido conectar a la base de datos");


$con = "SELECT * FROM obra";
$index = $_POST["index1"];
$res = mysqli_query($conexion, $con);
/* Seek to row no. 401 */
$res->data_seek($index);
/* Fetch single row */
$row = $res->fetch_row();
echo $row[4];
