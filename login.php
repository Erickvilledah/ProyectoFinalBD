<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/03a89292db.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <?php
        session_start();
        require 'config/database.php';
        require 'controlador.php';
    ?>
    <h1 style="font-size: 80px; color: #FFF; font-family: Arial, sans-serif; font-weight: bold; text-shadow: 0 8px 8px black;">Iniciar sesión ahora</h1>
    <div class="container">
    <div class="logo">
        <img class="logo_img" src="img/logoFi.png" alt="Logo">
    </div>

    <form method="post" action="" class="form">
        <div class="form__usuario">
        <label for="usuario">Usuario:   </label>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
        </svg>
        <input type="text" id="usuario" class="usuario" name="user" placeholder="Ingrese su nombre de usuario">
        </div>

        <div class="form__clave">
        <label for="clave">Contraseña:  </label>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
            <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8m4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5"/>
            <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
        </svg>
        <input type="password" id="clave" class="clave" name="pass" placeholder="Ingrese su contraseña">
        </div>

        <div class="form__boton">
        <input type="submit" class="btn btn-success" name="btningr" value="Iniciar sesión">
        </div>
    </form>
</div>
</body>

</html>

<style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body {
  font-family: "Roboto", sans-serif;
  background-image: url("img/login.jpeg");

}

.container{
    width: 700px;
    position: relative;
    margin: auto;
    background-image: url("img/borroso.jpg");
    padding: 25px;
    border-radius: auto;
    display: flex;
    align-items: center;
    gap: 20px;
}
.logo_img{
    width: 250px;
}

.form{
    padding: 10px;
}

.form__usuario,
.form__clave{
    width: 100%;
    margin-bottom: 40px;
    position: relative;
}
.usuario, .clave{
    width: 100%;
    padding: 10px 15px;
    border: none;
    outline: none;
    border-bottom: solid #222 2px;
}

.boton{
    background: green;
    padding: 15px 25px;
    color: white;
    border: none;
    cursor: pointer;
}
h1{
    text-align: center;
    padding: 20px;
    color: white;
}
.form__boton{
    display: flex;
    justify-content: flex-start;
}
.boton:hover{
    background: rgb(2, 117, 2);
}
</style>