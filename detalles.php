
<?php

session_start();
if(!isset($_SESSION['nombre_usuario']))
{
  header('location: http://localhost/index.php', true, 307);
}
//incluye la clase Libro y CrudLibro
require_once('./clases/crud_servicio.php');
require_once('servicio.php');
$crud=new crudServicio();
$servicio= new Servicio("","","","  ");
//obtiene todos los libros con el método mostrar de la clase crud
$servicio=$crud->obtenerElemento($_GET["id"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./css/custom.css">
    <script src="./js/jquery-3.4.1.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script>
        function ActualizarLista()
        {
            $.ajax({
                    //Tipo de envio
                    type: "POSt",
                    //URL destino
                    url: "./controlador/controlador_servicio.php",
                    //Datos a enviar
                    data: {mandar:"consultar"},  // Se forma la cadena getusuario.php?q=2

                    //Procesa Dato recibido
                    success: function (data) {
                        //Coloca el resultado en la pagina WEB
                        $(".list-group").html(data);
                    },

                    //Procesa mensaje de error
                    error: function (e) {
                        //Coloca un mensaje en la pagina WEB
                        $("#result").text("error:"+e.status+"error:"+e.statusText);
                    }
                });
        }
    </script>
    <link rel="stylesheet" href="./css/font-awesome.min.css">
    <style media="screen">
    h5{
      padding: 5px;
      border-width: 0 0 2px 0;
      border-style: solid;
      border-color: #42B8FF;
    }
      h6{
        color: red;
      }
      .img{
        display: block;

      }
      .img img{
        display: block;

        margin-top: 15px;
      }
      img{
        max-width: 500px !important;
        height: auto;
      }
      @media (max-width: 1100px){
        img{
          max-width: 90% !important;
          width: 90% !important;
        }
      }
      @media (max-width: 500px){
        img{
          max-width: 100% !important;
          width: 100% !important;
        }
      }
    </style>
</head>
<body>

<div class="container-fluid">

    <!-- Header -->
    <header>
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
      <li class="nav-item active">
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
      <button type="button" class="btn btn-primary" onclick="cerrarSesion();">Cerrar sesión</button>;
      </span>
    </div>
  </nav>
        <div class="row">
          <!-- Jumbotron que contiene imagen e input/button, remover el estilo en linea de jumbotron -->
            <div class="col-12 col-no-padding" ><div class="jumbotron jumbotron-fluid" style="background-image: url(./img/paisaje.jpg);">
                <div class="container">
                  </div>
              </div></div>
        </div>
        </header>


   <div class="container py-1"></div>
<!-- Contenedor de lista-->
    <div class="container py-1">

    <div class="row">
        <!-- Columna grande ajustada derecha izquierda-->
        <div class="col-lg-8 mx-auto">
            <!-- Lista de productos-->
            <ul class="list-group">
                <!-- Elemento de lista-->
                <li class="list-group-item noBorder">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mt-0 font-weight-bold mb-2"><?php echo $servicio->getNombreServicio() ?></h5>
                        </div>
                    </div>
                </li>
                <li class="list-group-item noBorder">
                    descripcion
                <p class="font-italic text-muted mb-0 small"><?php echo $servicio->getDescripcion() ?></p>
                </li>
                <li class="list-group-item noBorder">
                    costo
                    <h6 class="font-weight-bold my-2">$ <?php echo $servicio->getCosto() ?></h6>
                </li>
                <li class="list-group-item noBorder img">
                    imagenes
                    <?php
                      $directory="./controlador/fotosServicio/".$_GET["id"];
                      $dirint = dir($directory);
                      while (($archivo = $dirint->read()) !== false)
                      {
                        $extension = strtolower(pathinfo($archivo ,PATHINFO_EXTENSION));
                        if($extension=='jpg' || $extension =='png' || $extension == 'gif' || $extension == 'bmp') {
                              echo '<img src="'.$directory."/".$archivo.'">'."\n";
                          }
                      }
                      $dirint->close();
                    ?>
                </li>
                <li class="list-group-item noBorder">
                    Vendedor
                    <a href="perfil.php?usuario=<?php echo $servicio->getNombreDueno() ?>">
                    <h6 class="font-weight-bold my-2"><?php echo $servicio->getNombreDueno() ?></h6>
                    </a>
                </li>
                <li class="list-group-item noBorder">

                    <a href="compra.php?evento=<?php echo $servicio->getId() ?>">
                    <input class="btn btn-primary" type="submit" value="Comprar" onclick="false;"></input>
                    </a>
                </li>
                <!-- Elemento de lista-->
              </ul>
        </div>
    </div>
    </div>


    </div>
    <script src="./js/custom.js"></script>
</body>
</html>
