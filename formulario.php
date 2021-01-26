<?php
if(isset($_SESSION['nombre_usuario']))
{
  header('location: http://localhost/perfil.php', true, 307);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
    <script src="./js/bootstrap.js"></script>
    <title>Document</title>
    <style media="screen">
      form{
        width: 350px;
        margin: auto;
        margin-top: 50px;
        padding: 15px;
        text-align: center;
        border: 7px solid #007bff;
      }
      .form-control{
        width: 300px;
        border-radius: 5px;
        border: 2px solid #007bff;
      }
      input{
        margin-top: 15px;
      }
      .btn{
        display: block;
        width: 300px;
      }
      @media (max-width: 350px){
        form{
          width: 95% !important;
        }
        .form-control, .btn{
          width: calc(100% - 15px) !important;
        }
      }
    </style>
</head>

<body>


      <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Principal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
      </ul>
      <span class="navbar-text">
        <a href="./login.php">Login</a>
      </span>
    </div>
  </nav>
    <form action="./controlador/controlador_usuario.php" method="POST">
        <h2>Registro</h2>
        <input type="text" class="form-control" placeholder="Nombre" name="nombre" required pattern="[a-zA-Z]*" oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Escribe un Nombre válido. Solo Letras, no números ni caracteres especiales')">
        <input type="text" class="form-control" placeholder="Apellido" name="apellido" required required pattern="[a-zA-Z]*" oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Escribe un Apellido válido. Solo Letras, no números ni caracteres especiales')">
        Usuario
        <input type="radio"  placeholder="Nombre" name="tipo_usuario" value="usuario" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Publicista
        <input type="radio"  placeholder="Nombre" name="tipo_usuario" value="publicista" required>
        <input type="text" class="form-control" placeholder="Nombre de usuario" name="nombre_usuario" required>
        <input type="password" class="form-control" placeholder="Contrase&ntilde;a" name="contrasena" required>
        <input type="submit" class="btn btn-primary"></input>
        <input type="hidden" id="mandar" name="mandar" value="registroUsuario">
    </form>
</body>

</html>
