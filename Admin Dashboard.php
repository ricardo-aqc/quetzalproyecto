<?php
$usuario = "root";
$password = "";
$servidor = "127.0.0.1";
$basededatos = "constructora";

$conexion = mysqli_connect($servidor, $usuario, "") or die("No se a podido conectar al servidor de la base de datos");

$db = mysqli_select_db($conexion, $basededatos) or die("Ups! Parece ser que no se a podido conectar a la base de datos");

$consulta = "SELECT * FROM obra";
$resultado = mysqli_query($conexion, $consulta)
?>
<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Quetzal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all"
        rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-auto col-md-2" style="background-color: #394f4c">
                <a class="text-decoration-none mt-1 align-items-center text-white" href="Admin Dashboard.php">
                    <span class="fs-4 d-none d-sm-inline"> Admin Quetzal</span>
                </a>
                <nav class="nav nav-tabs flex-column mt-4" style="background-color: #6ba4ac">
                    <a class="nav-link text-white" href="#" data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02"
                        aria-expanded="false">Obras
                    </a>
                    <div class="collapse" id="navbarTogglerDemo02">
                        <a class="nav-link text-white" href="editarobra.php">
                            <i class="bi bi-pencil" style="font-size: 1em; color: #ffffff"></i><span
                                class="d-none d-sm-inline text-white ms-2">Editar Obra</span>
                        </a>
                        <a class="nav-link text-white" href="agregarobra.php" id="">
                            <i class="bi bi-plus-lg" style="font-size: 1em; color: #ffffff"></i>
                            <span class="d-none d-sm-inline text-white ms-1">Agregar Obra</span>
                        </a>
                    </div>
                </nav>
            </div>

            <div class="col-auto col-md-10 ms-auto min-vh-100">
                <form name="form1" action="#" class="row align-items-center mt-1 ms-1 me-1" method="post">
                    <div class="mb-3 text-left">
                        <h4>Obras</h4>



                        <div class="preview row mb-3 ">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nombre Obra</th>
                                        <th>Descripcion</th>
                                        <th>Encargado</th>
                                        <th>Ubicacion</th>
                                        <th> Acciones </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($columna = mysqli_fetch_array($resultado)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $columna['nombre']; ?></td>
                                        <td><?php echo $columna['descripcion']; ?></td>
                                        <td><?php echo $columna['encargado']; ?></td>
                                        <td><?php echo $columna['url_ubicacion']; ?></td>
                                        <td>
                                            <btn class="btn btn-warning" id="editBtn" name="editBtn">
                                                <i class="bi bi-pencil" style="font-size: 1em; color: #181717">
                                                </i>
                                            </btn>
                                            <btn class="btn btn-danger" id="delBtn" name="delBtn">
                                                <i class="bi bi-trash" style="font-size: 1em; color: #181717">
                                                </i>
                                            </btn>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>


                        </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script>
    const buttonsEdit = document.getElementsByName("editBtn");
    buttonsEdit.forEach(function(button) {
        button.addEventListener('click', function() {
            window.location.href = "editarobra.php?name=hola";
        });
    });

    const buttonsDelete = document.getElementsByName("delBtn");
    buttonsDelete.forEach(function(button) {
        button.addEventListener('click', function() {
            window.location.href = "editarobra.php";
        });
    });
    </script>

    <style></style>

</body>

</html>