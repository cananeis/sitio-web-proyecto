<?php session_start();
if(isset($_SESSION['nombre_usuario']))
{
  header('location: http://localhost/perfil.php', true, 307);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login </title>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./css/custom.css">
    <script src="./js/jquery-3.4.1.js"></script>
    <script src="./js/bootstrap.js"></script>
    <link rel="stylesheet" href="./css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <script>
        function VerificarLogin()
        {
            var nombreUsuario = document.getElementById("nameUser").value;
            var contra = document.getElementById("contra").value;
            $.ajax({
                    //Tipo de envio
                    type: "POSt",
                    //URL destino
                    url: "./controlador/controlador_usuario.php",
                    //Datos a enviar
                    data: {mandar:"login",nombre_usuario:nombreUsuario,contrasena:contra},  // Se forma la cadena getusuario.php?q=2
                    
                    //Procesa Dato recibido
                    success: function (data) {
                        if(data=="Contraseña correcta")
                        {
                            location.href ="perfil.php";
                        }
                        //Coloca el resultado en la pagina WEB
                        $("#result").html(data);
                    },
                    
                    //Procesa mensaje de error
                    error: function (e) {
                        //Coloca un mensaje en la pagina WEB
                        $("#result").text("error:"+e.status+"error:"+e.statusText);
                    }
                });
        }
    </script>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Principal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
   </nav>
<body>
    <div class="login-form">
        <form  method="post">
            <h2 class="text-center">Login</h2>
            <div class="form-group">
                <input type="text" id="nameUser" class="form-control" placeholder="Usuario" required="required" name="nombre_usuario">
            </div>
            <div class="form-group">
                <input type="password" id="contra" class="form-control" placeholder="Contrase&ntilde;a" required="required"
                    name="contrasena">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" onclick="VerificarLogin();return false;">Login</button>
            </div>
            <input type="hidden" id="mandar" name="mandar" value="login">
            <div class="clearfix">
                <label class="pull-left checkbox-inline"><input type="checkbox">Recordarme</label>
                <a href="#" class="pull-right">¿Olvidaste tu contrase&ntilde;a</a>
            </div>
        </form>
        <p class="text-center"><a href="formulario.php">Crear una cuenta</a></p>
        <p id="result" class="text-center"></p>
    </div>
</body>

</html>