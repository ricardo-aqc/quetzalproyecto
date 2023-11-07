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
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Restauracion SOSA</td>
                                        <td>Restauracion en la avenida Sosa </td>
                                        <td>Ricardo Juarez</td>
                                        <td>Av. Sosa 1503 Calle Simon</td>
                                        <th> <i class="bi bi-pencil" style="font-size: 1em; color: #181717"></i><i
                                                class="bi bi-trash"></i></th>
                                    </tr>
                                    <tr>
                                        <td>Miguel Aleman</td>
                                        <td>Construccion en la calle Miguel Aleman</td>
                                        <td>Christian Fernandez</td>
                                        <td>Av. Miguel Aleman, Juarez</td>
                                        <th> <i class="bi bi-pencil" style="font-size: 1em; color: #181717"></i> <i
                                                class="bi bi-trash"></i></th>
                                    </tr>

                                    <tr>
                                        <td>Remodelacion Casa Chavez</td>
                                        <td>Remodelacion en con distrito de los Chavez</td>
                                        <td>Jordi Vazconcelos</td>
                                        <td>Chavez Chavez, 1289. Av. Chavez</td>
                                        <th> <i class="bi bi-pencil" style="font-size: 1em; color: #181717"></i><i
                                                class="bi bi-trash"></i></th>
                                    </tr>

                                    <tr>
                                        <td>Construccion Calderon</td>
                                        <td>Construccion en la calle de Felipe Calderon</td>
                                        <td>Juan Pablo Dominguez</td>
                                        <td>Av. Chavez, Felipe Calderon</td>
                                        <th> <i class="bi bi-pencil" style="font-size: 1em; color: #181717"></i><i
                                                class="bi bi-trash"></i></th>
                                    </tr>

                                    </tr>
                                    <tr>

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
</body>

</html>