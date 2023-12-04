<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/all.min.css" rel="stylesheet">
<?php

if (!empty($_POST["btningr"])) {

    if (empty($_POST["user"]) || empty($_POST["pass"])) {
        echo '<div class="alert alert-primary" role="alert">Los Acceso denegado. LOS CAMPOS ESTAN VACIOS.</div>';
    } else {

        $usuario = $_POST["user"];
        $clave = $_POST["pass"];

        $sql = $conn->query("SELECT * FROM usuario WHERE usuario='$usuario' AND clave='$clave'");

        if ($datos = $sql->fetch_object()) {
            header("location:index.php");
        } else {
            echo '<div class="alert alert-danger" role="alert">Acceso denegado. DATOS INCORRECTOS.</div>';
        }
    }
}

?>
