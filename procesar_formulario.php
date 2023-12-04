<?php


$host = "127.0.0.1";
$user = "root";
$password = "";
$db = "constructora";
// Conexión a la base de datos (reemplaza 'tubasededatos', 'tuusuario', 'tucontraseña' y 'localhost' con tus propios valores)
$conexion = new mysqli($host, $user, $password, $db);

// Verificar la conexión
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

$username = $_POST['usernameInput'];
$contrasena = $_POST['passwordInput'];
// Consulta SQL para verificar el usuario y la contraseña (reemplaza 'usuarios' y 'contrasenas' con tus propias tablas)
$consulta = "SELECT * FROM usuario WHERE  usuario.nombre = '$username' AND  usuario.password='$contrasena'";
echo $consulta;
echo "hola";
$resultado = $conexion->query($consulta);

// Verificar si la consulta fue exitosa
if ($resultado->num_rows > 0) {
    // Usuario autenticado, realiza las acciones necesarias (por ejemplo, redirección)
    echo '¡Usuario autenticado correctamente!';
    header("Location: admin dashboard.php");
} else {
    // Usuario no autenticado, puedes redirigirlo de nuevo al formulario de inicio de sesión
    echo '¡Error de autenticación!';
}

// Cerrar la conexión a la base de datos
$conexion->close();
