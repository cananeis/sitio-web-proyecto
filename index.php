<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Conocer las zonas turísticas tambien conocer los servicios
  turisticos en Ahome ">
  <meta name="author" content="">
  <meta name="keywords" content="Turismo-ahome,Servicios-turisticos,zonas-turisticas-ahome">

  <title>Eventos turísticos en Ahome</title>

  <!-- Bootstrap core CSS -->
  <link href="./css/bootstrap.css" rel="stylesheet">

  <!-- Custom fonts for this template -->


  <!-- Custom styles for this template -->
  <link href="./css/landing-page.min.css" rel="stylesheet">
  
  <script src="./js/jquery-3.4.1.js"></script>
 
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Principal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
    <?php session_start();
     if(isset($_SESSION['nombre_usuario']))
     {
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
     }
        ?>
        </ul>
      <span class="navbar-text" id=login>
        <?php
        if(isset($_SESSION['nombre_usuario']))
        {
            echo '<button type="button" class="btn btn-primary" onclick="cerrarSesion();">Cerrar sesión</button>';
        }else{
          echo '<a href="./login.php">Login</a>';
        }
        ?>
        
      </span>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">¡Reserva una actividad turistica en cualquier momento!</h1>
        </div>

      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-screen-desktop m-auto text-primary"></i>
            </div>
            <h3>Compra experiencias de viaje unicas</h3>

          </div>
        </div>
        <div class="col-lg-6">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-layers m-auto text-primary"></i>
            </div>
            <h3>Date a conocer en la comunidad turistica más grande</h3>

          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Image Showcases -->
  <section class="showcase">
    <div class="container-fluid p-0">
      <div class="row no-gutters">

        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/Turismo-ahome.jpg');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>Pasa las mejores vacaciones en los atractivos de turismo de Ahome</h2>

        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/Venta-servicio-turismo.jpg');"></div>
        <div class="col-lg-6 my-auto showcase-text">
          <h2>Una experiencia de venta y compra de servicios en materia de turismo inigualable</h2>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/Compra-venta-servicio-turismo.jpg');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>Animate a conocer el municipio de Ahome y todo lo que te puede ofrecer</h2>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->


  <!-- Call to Action -->


  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">

          <!-- <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2019. All Rights Reserved.</p> -->
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <!--<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->
  <script src="./js/bootstrap.js"></script>
  <script src="./js/custom.js"></script>
</body>

</html>
