<?php

/**
 * CRUD modal en PHP y MySQL
 * 
 * Este archivo muestra el listado de registros y las opciones para agregar,
 * editar y eliminar registros desde ventanas modal de Bootstrap
 * @author MRoblesDev
 * @version 1.0
 * https://github.com/mroblesdev
 * 
 */

session_start();

require 'config/database.php';

$sqlPeliculas = "SELECT p.id, p.nombre, p.descripcion, g.nombre AS genero FROM pelicula AS p
INNER JOIN genero AS g ON p.id_genero=g.id";
$peliculas = $conn->query($sqlPeliculas);

$dir = "posters/";

?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Final-DB</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/all.min.css" rel="stylesheet">
</head>

<header>
  <div style="position: relative;">
    <img src="img/portada.png" alt="Portada" width="100%">
    <h1 style="position: absolute; top: 0; left: 0; z-index: 1; margin-left: 270px; margin-top: 180px; font-size: 180px; color: white; text-shadow: 0 15px 15px black;">Peliculas FI-DB</h1>
  </div>
</header>

<body class="d-flex flex-column h-100" style="background-color: #f0f8ff;">

    <div class="container py-3">
        <header>
            <h1>¡Bienvenido a la base de datos CRUD de películas!</h1>
        </header>
        <br>
        <main>
            <p>Aquí puedes encontrar información sobre películas de todo el mundo. Puedes ver películas por título, director, género o año de estreno. También puedes ver listas de las películas más populares, las mejores valoradas o las más recientes.</p>
            <p>Si eres un aficionado al cine, esta es la herramienta perfecta para ti. Con ella, podrás descubrir nuevas películas y aprender más sobre tus películas favoritas.</p>
           
        </main>

        <hr>

        <?php if (isset($_SESSION['msg']) && isset($_SESSION['color'])) { ?>
            <div class="alert alert-<?= $_SESSION['color']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['msg']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php
            unset($_SESSION['color']);
            unset($_SESSION['msg']);
        } ?>

    <br>
    <header>
        <h3>Buscador:</h3>
    </header>
    <form action="#" method="GET">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Buscar película por ID, nombre o género" aria-label="Buscar película" aria-describedby="basic-addon2" name="search">
        <button type="submit" class="btn btn-outline-primary" id="basic-addon2">Buscar</button>
    </div>
    </form>
    <?php
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $sqlPeliculas = "SELECT p.id, p.nombre, p.descripcion, g.nombre AS genero FROM pelicula AS p
            INNER JOIN genero AS g ON p.id_genero=g.id
            WHERE p.id LIKE '%$search%' OR p.nombre LIKE '%$search%' OR g.nombre LIKE '%$search%'";
            $peliculas = $conn->query($sqlPeliculas);
        } else {
            $sqlPeliculas = "SELECT p.id, p.nombre, p.descripcion, g.nombre AS genero FROM pelicula AS p
            INNER JOIN genero AS g ON p.id_genero=g.id";
            $peliculas = $conn->query($sqlPeliculas);
        }
    ?>


        <br>
        <div class="row justify-content-end">
            <div class="col-auto">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoModal"><i class="fa-solid fa-circle-plus"></i> Nuevo registro</a>
            </div>
        </div>

        <table class="table table-sm table-striped table-hover mt-4">
            <thead class="table-dark" style="text-align: center;">
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>POSTER</th>
                    <th width="45%">DESCRIPCION</th>
                    <th>GENERO</th>
                    <th >EDITAR/ELIMINAR</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($row = $peliculas->fetch_assoc()) { ?>
                    <tr>
                        <td style="text-align: center;"><?= $row['id']; ?></td>
                        <td><?= $row['nombre']; ?></td>
                        <td style="text-align: center;"><img src="<?= $dir . $row['id'] . '.jpg?n=' . time(); ?>" width="100"></td>
                        <td style="text-align: justify;"><?= $row['descripcion']; ?></td>
                        <td style="text-align: center;"><?= $row['genero']; ?></td>>
                        <td style="text-align: center;">
                            <a href="#" class="btn btn-sm btn-warning btn-primary"  data-bs-toggle="modal" data-bs-target="#editaModal" data-bs-id="<?= $row['id']; ?>"><i class="fa-solid fa-pen-to-square"></i>UPDATE</a>

                            <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#eliminaModal" data-bs-id="<?= $row['id']; ?>"><i class="fa-solid fa-trash"></i></i>DELETE</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    
        <header style="text-align: center; margin: 15px;">
            <h1>¡Gracias por visitarnos!</h1>
        </header>

    </div>
    <div style="background-image: url('img/final.jpg');">
        <footer style="margin: 40px; border-top: 1px solid black;">
            <div class="container" style="margin: 60px; ">
                <div class="row">
                    <div class="col-md-3">
                        <img src="img/logoFi.png" alt="Logo de la empresa" width="45%">
                    </div>
                <div class="col-md-3">
                    <ul class="list-unstyled">
                        <li><a href="#" style="font-size: 40px; text-shadow: 0 5px 5px black; color: white;">GitHub</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 style="font-size: 25px; text-shadow: 0 2px 2px white;">Proyecto desarrollado por:</h5>
                    <br>
                    <br>
                    <h6 style="font-size: 20px; text-shadow: 0 5px 5px black; color: white;">>> Hernández Rivera David</h6>
                    <h6 style="font-size: 20px; text-shadow: 0 5px 5px black; color: white;">>> Villeda Hernandez Erick</h6>
                </div>
                    <div class="col-md-3" style="font-size: 20px; text-shadow: 0 5px 5px black; color: white;">
                        <p>Copyright &copy; 2023 FI-UNAM</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <?php
    $sqlGenero = "SELECT id, nombre FROM genero";
    $generos = $conn->query($sqlGenero);
    ?>

    <?php include 'nuevoModal.php'; ?>

    <?php $generos->data_seek(0); ?>

    <?php include 'editaModal.php'; ?>
    <?php include 'eliminaModal.php'; ?>

    <script>
        let nuevoModal = document.getElementById('nuevoModal')
        let editaModal = document.getElementById('editaModal')
        let eliminaModal = document.getElementById('eliminaModal')

        nuevoModal.addEventListener('shown.bs.modal', event => {
            nuevoModal.querySelector('.modal-body #nombre').focus()
        })

        nuevoModal.addEventListener('hide.bs.modal', event => {
            nuevoModal.querySelector('.modal-body #nombre').value = ""
            nuevoModal.querySelector('.modal-body #descripcion').value = ""
            nuevoModal.querySelector('.modal-body #genero').value = ""
            nuevoModal.querySelector('.modal-body #poster').value = ""
        })

        editaModal.addEventListener('hide.bs.modal', event => {
            editaModal.querySelector('.modal-body #nombre').value = ""
            editaModal.querySelector('.modal-body #descripcion').value = ""
            editaModal.querySelector('.modal-body #genero').value = ""
            editaModal.querySelector('.modal-body #img_poster').value = ""
            editaModal.querySelector('.modal-body #poster').value = ""
        })

        editaModal.addEventListener('shown.bs.modal', event => {
            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')

            let inputId = editaModal.querySelector('.modal-body #id')
            let inputNombre = editaModal.querySelector('.modal-body #nombre')
            let inputDescripcion = editaModal.querySelector('.modal-body #descripcion')
            let inputGenero = editaModal.querySelector('.modal-body #genero')
            let poster = editaModal.querySelector('.modal-body #img_poster')

            let url = "getPelicula.php"
            let formData = new FormData()
            formData.append('id', id)

            fetch(url, {
                    method: "POST",
                    body: formData
                }).then(response => response.json())
                .then(data => {

                    inputId.value = data.id
                    inputNombre.value = data.nombre
                    inputDescripcion.value = data.descripcion
                    inputGenero.value = data.id_genero
                    poster.src = '<?= $dir ?>' + data.id + '.jpg'

                }).catch(err => console.log(err))

        })

        eliminaModal.addEventListener('shown.bs.modal', event => {
            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')
            eliminaModal.querySelector('.modal-footer #id').value = id
        })
    </script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>