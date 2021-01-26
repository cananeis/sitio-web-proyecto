<?php

session_start();
if(!isset($_SESSION['nombre_usuario']) || $_SESSION['tipo'] != 'publicista')
{
  header('location: http://localhost/index.php', true, 307);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insertar Servicio</title>
  <script src="jquery-3.1.1.min.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="./css/custom.css">
  <script src="./js/jquery-3.4.1.js"></script>
  <script src="./js/bootstrap.js"></script>
  <script>
    function resetearFormu() {
      document.getElementById("formRegistro").reset();
    }
    function llamarRegistro() {
      var nombreServicio = $("#nameSercive").val();
      var descripServicio = $("#descrip").val();
      var costoServ = $("#costos").val();
      var vendedor1 = "vendedor";
      var form_data = new FormData($("#formRegistro")[0]);
      // AJAX
      $.ajax({
        //Tipo de envio
        type: "POST",
        //URL destino
        url: "./controlador/controlador_servicio.php",
        //Datos a enviar
        //data: {mandar:"registro",nameSercive:nombreServicio,descrip:descripServicio,costos:costoServ,vendedor:vendedor1},  // Se forma la cadena getusuario.php?nombre=2&&contra=dato2
        data: form_data,
        contentType: false,
        processData: false,
        //Procesa Dato recibido
        success: function (data) {
          document.getElementById("formRegistro").reset();
          //Coloca el resultado en la pagina WEB
          $("#result").html(data);
        },

        //Procesa mensaje de error
        error: function (e) {
          //Coloca un mensaje en la pagina WEB
          $("#result").text("error:" + e.status + "error:" + e.statusText);
        }
      });

    }
  </script>
  <style>
    h2 {
      text-align: center;
      margin-bottom: 30px;
    }

    body {
      background: #F0F0F0;
    }

    form {
      width: 650px;
      margin: auto;
      margin-top: 30px;
      margin-bottom: 30px;
      padding: 15px;
      border-radius: 5px;
      background-color: #ffffff;
      border: 10px solid #007bff;
    }

    .form-control {
      border-radius: 5px;
      border: 2px solid #007bff;
    }

    input {
      border-radius: 5px;
      border-color: #007bff;
    }

    .contenedorDias {
      display: flex;
    }

    .dias {
      width: 50%;
    }

    .dias .form-check {
      width: inherit;
      margin: auto;
      text-align: left;
    }

    .horas {
      text-align: center;
    }

    #subir{
      width: 250px;
      padding: 15px;
      background: #007bff;
      color: white;
      font-weight: bold;
      border: none;
      margin: auto;
      margin-top: 15px;
    }

    @media (max-width: 768px) {
      form {
        width: 90% !important;
        text-align: center;
        padding: 5px;
      }

      .dias {
        text-align: left;
      }

      .dias .form-check {
        padding: 0;
      }
    }
    #fotos{
      display: flex;
      flex-wrap: wrap;
      margin: 20px 0;
      justify-content: center;
    }
    #fotos img{
      max-width: 150px !important;
      width: 150px;
      height: 150px;
      margin-right: 10px;
      margin-bottom: 10px;
    }

    @media (max-width: 500px) {
      form {
        border: 5px solid #007bff;
      }

      .dias .form-check {
        width: auto !important;
      }
      #fotos img{
        margin-right: 0 !important;
      }

    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Principal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
      aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
       <li class="nav-item active">
         <a class="nav-link" href="perfil.php">Perfil<span class="sr-only"></span></a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="productos.php">Servicios</a>
       </li>
      </ul>
      <span class="navbar-text">
      <button type="button" class="btn btn-primary" onclick="cerrarSesion();">Cerrar sesión</button>
      </span>
    </div>
  </nav>

  <form id="formRegistro" method="POST">
    <h2>Registra un Servicio</h2>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Nombre Servicio</label>
        <input class="form-control" required type="text" name="nameSercive" id="nameSercive" placeholder="Servicio">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Costo</label>
        <input class="form-control" required type="number" name="costos" id="costos" placeholder="Precio">
      </div>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Descipcion del servicio</label>
      <textarea class="form-control" required id="descrip" name="descrip" rows="3" cols="10"></textarea>
    </div>
    <label for="exampleInputPassword1">Horario de trabajo</label><br>
    <div class="form-row contedorDias">
      <div class="form-group dias col-md-6">
        <div class="form-check">
          <input type="checkbox" id="Lunes" name="Lunes" value="Lunes">
          <label for="vehicle1">Lunes</label><br>
        </div>
        <div class="form-check">
          <input type="checkbox" id="Martes" name="Martes" value="Martes">
          <label for="vehicle2">Martes</label><br>
        </div>
        <div class="form-check">
          <input type="checkbox" id="Miercoles" name="Miercoles" value="Miercoles">
          <label for="vehicle3">Miercoles</label><br>
        </div>
      </div>
      <div class="form-group dias col-md-6">
        <div class="form-check">
          <input type="checkbox" id="Jueves" name="Jueves" value="Jueves">
          <label for="vehicle3">Jueves</label><br>
        </div>
        <div class="form-check">
          <input type="checkbox" id="Viernes" name="Viernes" value="Viernes">
          <label for="vehicle3">Viernes</label><br>
        </div>
        <div class="form-check">
          <input type="checkbox" id="Sabado" name="Sabado" value="Sabado">
          <label for="vehicle3">Sabado</label><br>
        </div>
        <div class="form-check">
          <input type="checkbox" id="Domingo" name="Domingo" value="Domingo">
          <label for="vehicle3">Domingo</label><br>
        </div>

      </div>
    </div>
    <div class="form-group horas">
      <label for="exampleInputPassword1">De:</label>
      <input type="time" required name="de" id="">
      <label for="exampleInputPassword1">Para:</label>
      <input type="time" required name="para" id="">
    </div>
    <label for="inputPassword4">Capacidad por actividad</label>
    <input class="form-control mb-3"  type="number" name="capa" id="capa" placeholder="Capacidad">

    Select Image Files to Upload:
    <input onchange=cambio_fotos() type="file" name="fotukis[]" id="fotukis" multiple style="display: none;">
    <button type="button" name="subir" id="subir" value="browse" onclick="document.getElementById('fotukis').click();" style="display: block;">Subir</button>
    <div id="fotos"></div>

    <div class="form-group">
      <input class="btn btn-primary"  type="submit" value="Registrar" onclick="llamarRegistro();return false;"></input>
      <input class="btn btn-primary" type="submit" value="Borrar" onclick="resetearFormu()"></input>
    </div>
    <!--<input type="button" value="registrar" onclick="llamarRegistro();return false;">-->
    <input type="hidden" id="mandar" name="mandar" value="registro">
  </form>
  <div id="result"></div>
  <script src="./js/custom.js"></script>
</body>

</html>
