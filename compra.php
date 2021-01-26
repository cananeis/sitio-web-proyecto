<?php
//incluye la clase Libro y CrudLibro
//incluye la clase Libro y CrudLibro
session_start();
if(!isset($_SESSION['nombre_usuario']))
{
  header('location: http://localhost/index.php', true, 307);
}
require_once('./clases/crud_servicio.php');
require_once('./clases/crud_horarios.php');
require_once('servicio.php');
require_once('horario.php');
$crud=new crudServicio();
$crud_horario = new crudHorario();
$servicio= new Servicio("","",""," ");
$horario = new Horario("","","","","");
//obtiene todos los libros con el método mostrar de la clase crud
$servicio=$crud->obtenerElemento($_GET["evento"]);
$horario=$crud_horario->obtenerElemento($_GET["evento"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva Servicio</title>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./css/custom.css">
    <script src="./js/jquery-3.4.1.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script>
       /*window.onload = function () {
        //document.formularioCompra.nombre.focus();
        document.formularioCompra.addEventListener('submit', validarFormulario);
      }

function validarFormulario(evObject) {
  evObject.preventDefault();
  var todoCorrecto = false;
  var formulario = document.formularioCompra;
  for (var i=0; i<formulario.length; i++) {
    if(formulario[i].type =='number' || formulario[i].type =='date' || formulario[i].type =='time') {
      if (formulario[i].value == null || formulario[i].value.length == 0 || /^\s*$/.test(formulario[i].value)){
        alert (formulario[i].name+ ' no puede estar vacío o contener sólo espacios en blanco');
        todoCorrecto=true;
      }
    }
  }
  return false;
  //if (todoCorrecto ==true) {formulario.submit();} 
}*/
        function RealizarCompra()
        {
            $.ajax({
                    //Tipo de envio
                    type: "POST",
                    //URL destino
                    url: "./controlador/controlador_reservaciones.php",
                    //Datos a enviar
                    data: $("#formularioCompra").serialize(),

                    //Procesa Dato recibido
                    success: function (data) {
                        //Coloca el resultado en la pagina WEB
                        $("#result").html(data);;
                    },

                    //Procesa mensaje de error
                    error: function (e) {
                        //Coloca un mensaje en la pagina WEB
                        $("#result").text("error:"+e.status+"error:"+e.statusText);
                    }
                });
        }
    </script>
    <style media="screen">
    body{
      background: #F0F0F0;
    }
    form{
      width: 650px;
      margin: auto;
      margin-top: 30px;
      margin-bottom: 30px;
      padding: 15px;
      border-radius: 5px;
      background-color: #ffffff;
      border: 10px solid #007bff;
      text-align: center;
    }
    h2{
      font-size: 3vh;
      color: #494949;
    }
    p{
      font-size: 3vh;
      font-weight: bold;
      color: red;
    }
    input{
      border-radius: 5px;
      border: 2px solid #007bff;

    }
    .btn{
      display: block;
      width: 300px;
      margin: auto;
      margin-top: 15px;
    }
    span{
      color: red;
    }
    @media (max-width: 768px){
      form{
        width: 90% !important;
      }
      input{
        margin-top: 15px;
      }
    }
    @media (max-width: 400px){
      .btn, span{
        width: calc(100% - 15px) !important;
      }
       span{
        word-wrap: break-word;
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
      <?php
     if(($_SESSION['tipo'])=='publicista')
     {
       echo '
       <li class="nav-item">
       <a class="nav-link" href="perfil.php">Perfil<span class="sr-only"></span></a>
     </li>
       <li class="nav-item">
         <a class="nav-link" href="productos.php">Servicios</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="insertarServicio.php">Registrar servicio</a>
       </li>
     ';
     }else{
      echo '
      <li class="nav-item">
        <a class="nav-link" href="perfil.php">Perfil<span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="productos.php">Servicios</a>
      </li>
    ';
     }
        ?>
      </ul>
      <span class="navbar-text">
      <button type="button" class="btn btn-primary" onclick="cerrarSesion();">Cerrar sesión</button>
      </span>
    </div>
  </nav>

    <form name="formularioCompra" id="formularioCompra" action="./verificar_Compra.php" method="POST">
        <h2>Nombre producto</h2>
        <p name="servicio"><?php echo $servicio->getNombreServicio() ?></p>
        <input type="hidden" id="servicio" name="servicio" value="<?php echo $servicio->getNombreServicio() ?>">
        <h2>Precio</h2>
        <p name="costo">$ <?php echo $servicio->getCosto() ?></p>
        <input type="hidden" id="costo" name="costo" value="<?php echo $servicio->getCosto() ?>">
        <h2>capacidad por evento: <?php echo $horario->getcapacidad() ?></h2>
        <input required type="number"  name="cupos" id="cupos" max="<?php echo $horario->getcapacidad() ?>">
        <h2 class="horarios">Horarios:<span> <?php echo $horario->getDias() ?></span></h2>
        <h2>Desde: <?php echo $horario->getDe() ?></h2>
        <h2>Hasta: <?php echo $horario->getpara() ?></h2>

        <input type="date"  name="dia" required id="dia" min="2020-01-01" max="2020-12-31" >
        <input type="time"  name="hora" required id="hora" min="<?php echo $horario->getDe() ?>" max="<?php echo $horario->getpara() ?>">

        <input class="btn btn-primary" class="btn" type="submit" value="Verificar" onclick="RealizarCompra();return false;"></input>
        <input type="hidden" id="mandar" name="mandar" value="compra">
        <input type="hidden" id="id_servicio" name="id_servicio" value="<?php echo $servicio->getId() ?>">
        <input type="hidden" id="nombre_vendedor" name="nombre_vendedor" value="<?php echo $servicio->getNombreDueno() ?>">
    </form>
    <div id="result"></div>
    <script src="./js/custom.js"></script>
</body>
</html>
