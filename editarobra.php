<?php
require_once("config.php");
$nombre = htmlspecialchars($_GET["name"]);
$sql = "SELECT * FROM obra WHERE nombre='$nombre'";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_array();
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
                        <a class="nav-link text-white" href="admin dashboard.php">
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
                <form name="form1" method="GET" class="row align-items-center mt-1 ms-1 me-1" action="UpdateObra.php">
                    <div class="mb-3 text-center">
                        <h4>
                            Editar
                            <i class="bi bi-pencil-fill"></i>
                        </h4>
                        <h3 id="trabajos"></h3>
                    </div>
                    <div class="row">
                        <label for="nameInput" class="form-label">Nombre del Proyecto
                        </label>
                        <div class="text-center">
                            <input type="text" class="form-control" id="nameInput" name="nameInput" placeholder=""
                                required <?php echo 'value="' . ($row["nombre"]) . '"' ?> pattern="[a-zA-Z ]+" />
                        </div>
                    </div>
                    <div class="row">
                        <label for="descriptionInput" class="form-label">Descripción del Proyecto</label>
                        <div class="text-center">
                            <textarea class="form-control" id="descriptionInput" name="descriptionInput"
                                rows="6"><?php $info = trim($row['descripcion']);
                                                                                                                    echo $info; ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <label for="encargadoObra" class="form-label">Encargado del Proyecto
                        </label>
                        <div class="text-center">
                            <input type="text" name="encargadoObra" class="form-control" id="encargadoObra" required
                                disabled pattern="[a-zA-Z ]+" <?php echo 'value="' . ($row["encargado"]) . '"' ?> />
                        </div>
                    </div>
                    <div class="row">
                        <label for="locationInput" class="form-label">Ubicación</label>
                        <div class="text-center">
                            <input type="text" class="form-control" id="locationInput" placeholder="" required
                                name="locationInput" pattern="[a-zA-Z ]+"
                                <?php echo 'value="' . ($row["url_ubicacion"]) . '"' ?> />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="imageInput" class="form-label">Imágenes del Proyecto</label>

                        <div class="input-group mb-3">
                            <label class="input-group-text col-auto col-form-label" for="imageInput">Escoger
                                imagen</label>
                            <input type="file" class="form-control" id="imageInput" multiple required name="imageInput"
                                accept=".jpg, .jpeg, .png" />
                        </div>
                    </div>
                    <div class="preview row mb-3 ">
                        <div name="imageInput">

                            <?php
                            $id = $row["obra_id"];
                            $sql2 = "SELECT imagen, imagen.imagen_id FROM obra_imagen INNER JOIN imagen ON obra_imagen.imagen_id=imagen.imagen_id WHERE  obra_imagen.obra_id = ?";
                            $stmt2 = $conexion->prepare($sql2);
                            $stmt2->bind_param('s', $id);
                            $stmt2->execute();
                            $res = $stmt2->get_result();
                            while ($row2 = $res->fetch_array()) {
                            ?>
                            <div class="card d-grid gap-2 col-3 mx-auto mb-2">
                                <?php
                                    echo '<img  class="card-img-top img-thumbnail img-fluid " src="data:image/jpeg;base64,' . base64_encode($row2['imagen']) . '" />'
                                    ?>
                                <div class="card-img-overlay">
                                    <?php
                                        echo '<a class="btn btn-danger btn-sm float-end" name="delBtn" data-bs-toggle="popover"
                                    data-bs-content="Edit image" data-bs-trigger="hover focus" data-id=' . $row2["imagen_id"] . '>'

                                        ?>
                                    <i class="bi bi-x"></i>
                                    </a>
                                </div>
                            </div>

                            <?php
                            }
                            ?>


                        </div>
                    </div>
                    <div class="row ">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <input name="" id="" class="btn text-white" type="submit" value="Editar"
                                style="background-color: #94b27e" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <style></style>

    <script>
    const input = document.querySelector("input[name='imageInput']");
    const preview = document.querySelector(".preview");


    input.addEventListener("change", updateImageDisplay);

    function updateImageDisplay() {
        while (preview.firstChild) {
            preview.removeChild(preview.firstChild);
        }

        const curFiles = input.files;
        if (curFiles.length === 0) {
            const para = document.createElement("p");
            para.textContent = "No files currently selected for upload";
            preview.appendChild(para);
        } else {
            const list = document.createElement("ul");
            list.className = "list-group list-group-horizontal row";
            preview.appendChild(list);

            for (const file of curFiles) {
                const listItem = document.createElement("li");
                listItem.className = "list-group-item d-grid gap-2 col-6 mx-auto "
                const para = document.createElement("p");
                if (validFileType(file)) {
                    para.textContent = `File name ${file.name}, file size ${returnFileSize(
          file.size,
        )}.`;
                    const image = document.createElement("img");
                    image.src = URL.createObjectURL(file);
                    image.className = "img-thumbnail d-grid gap-2 col-6 mx-auto"
                    image.style.height = "64px"
                    image.style.width = "64px"
                    listItem.appendChild(image);
                    listItem.appendChild(para);
                } else {
                    para.textContent = `File name ${file.name}: Not a valid file type. Update your selection.`;
                    listItem.appendChild(para);
                }

                list.appendChild(listItem);
            }
        }
    }

    // https://developer.mozilla.org/en-US/docs/Web/Media/Formats/Image_types
    const fileTypes = [
        "image/apng",
        "image/bmp",
        "image/gif",
        "image/jpeg",
        "image/pjpeg",
        "image/png",
        "image/svg+xml",
        "image/tiff",
        "image/webp",
        "image/x-icon",
    ];

    function validFileType(file) {
        return fileTypes.includes(file.type);
    }

    function returnFileSize(number) {
        if (number < 1024) {
            return `${number} bytes`;
        } else if (number >= 1024 && number < 1048576) {
            return `${(number / 1024).toFixed(1)} KB`;
        } else if (number >= 1048576) {
            return `${(number / 1048576).toFixed(1)} MB`;
        }
    }
    </script>

    <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#image')
                    .attr('src', e.target.result)
                    .width(200)
                    .height();
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>

    <script>
    const buttonsEdit = document.getElementsByName("delBtn");
    let contador = 0;
    buttonsEdit.forEach(function(button) {
        button.addEventListener('click', function() {

            var index = $(this).attr("data-id");
            console.log(index);
            $.ajax({
                type: 'POST',
                url: 'deleteimage.php',
                data: {
                    index1: index,
                },
                success: function(response) {
                    console.log(response);
                    window.location.reload();
                }
            });
            // window.location.href = "#";
        });
    });
    </script>
</body>

</html>