<?php session_start();
if(isset($_SESSION['nombre_usuario']))
{
  header('location: http://localhost/perfil.php', true, 307);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="Evento turístico, Turismo Ahome, Viaje a Ahome, Diversión en la playa, 
      Reservación de servicio turístico, Venta de servicio, Da a conocer tu servicio, 
      Eventos turísticos en Ahome, Compra y venta de servicio, Conocer las zonas turísticas, 
      Conocer los servicios turísticos de Ahome, zonas costeras turísticas">
    <title>Turismo Ahome</title>
    <style>
        *{
            margin: 0;
            font-family: arial;
        }
        body{
            background: #E1E1E1;
            overflow-x: hidden;
        }
        
     #barra{
            width: 100%;
            background-color: #3BB358;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #A3A3A3;
            
        }
        #barra a{
            color: white;
            text-decoration: none;
        }
        #barra button, #dw{
            display: inline-block;
            height: inherit;
            width: 150px;
            border: 0;
            background-color: #3BB358;
            font-weight: bold;
            font-size: 1.1em;
            color: white;
        }
        #barra button:hover, #dw:hover{
            background-color: white;
            cursor: pointer;
            /* para log in */
            color: black;
        }
        #barra button:hover > a{
            color: black;
        }
        #barra #dw{
            background-image: url(img/menublanco.png);
            background-size: 40px auto;
            background-repeat: no-repeat;
            background-position: center;
        }
        #barra #dw:hover{
            background-image: url("img/menu.png") !important;
            background-size: 40px auto;
            background-repeat: no-repeat;
            background-position: center;
        }
        #barra #logo{
            left: 10px;
            position: absolute;
            height: 50px;
            width: auto;
        }
        #barra #menu{
            height: 30px;
            width: auto;
        }
        #main{
            width: 80%;
 
            margin: 15px auto;
            clear: both;
            overflow: hidden;
            height: 1%;
        }
        #info{
            width: 60%;
            float: left;
            height: 850px;
            border-radius: 25px;
            background: #D5D5D5;
            text-align: center;
        }
        #info h1 span{
            display: inline-block;    
            margin-top: 15px;
            font-size: 1.2em;
            font-weight: bold;
        }
        #info p{
            font-size: 1.2em;
            font-weight: bold;
            margin: 15px 0;
        }
        #info img{
            display: block;
            width: 70%;
            margin: auto;
            margin-top: 60px;
        }
        #registro{
            width: 35%;
            float: right;

            border-radius: 25px;
            padding: 20px 0;
            background: #D5D5D5;
        }
        #registro form{
            width: 90%;
            text-align: center;
            margin: auto;
            padding: 40px 0 0 0;
            background: #C1C1C1;
            font-size: 1.5em;
            font-weight: bold;

            border-radius: 20px;
            color: #0B7DEF;
        }
        #registro form input{
            width: 70%;
            height: 40px;
            margin-bottom: 20px;
            margin-top: 15px;
        }
        #registro h2{
            text-align: center;
            color: #FF3B3B;
            margin-bottom: 15px;
        }
        #pie{
            width: 100%;
            height: 150px;
            background: #3BB358;
            color: white;
            font-size: 2em;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #barra #iniciar{
            right: 0;
            position: absolute;
        }
        
        #barra #dw ul{
            display: none;
            position: absolute;
            list-style: none;
            top:100%;
             right:0;
             background:#999999;
             padding:0;
            color: black !important;
        }
        ul li{
            float: none;
            width: 150px;
        }
        ul li a{
            line-height:200%;
            padding:10px 15px;
        }
        #dw li:hover{
            background: #3BB358;
        }

        @media (max-width: 1200px) {
            #info{
                width: 100% !important;
                margin-bottom: 20px;
                height: 800px;
            }
            #registro{
                float: none;
                margin: auto;
                width: 100% !important;
            }
       
            #barra #iniciar{
                display: block;
            }
        }
        @media (max-width: 900px) {
         #info{
                height: 700px;
            }
         #barra button{
                display: none;
            }
         #barra #iniciar{
               position: relative;
            }
            #barra #dw[style]{
                display: block !important;
                right: 0 !important;
                position: absolute !important;
                
            }
        }
    </style>
    <script src="js/jq.js"></script>
    <script>
      $(document).ready(function(){
          $("#dw").click(function(){
              $("#dw ul").toggle();
          });
      });
    </script>
</head>
<body>
   
   <div id="barra">
        <img src="img/fjr.png" alt="Compra y venta de servicios" id="logo">
         <button ><a href="registro.html">Inicio</a></button>
         <button ><a href="ofertas.html">Ofertas</a></button>
         <button ><a href="contacto.html">Contacto</a></button>
         
         <button id="iniciar">Log In</button>

             <li id="dw" style="width: 75px; display: none;">
             <ul>
                 <li>
                     <a href="registro.html">Inicio</a>
                 </li>
                 <li>
                     <a href="ofertas.html">Ofertas</a>
                 </li>
                 <li>
                     <a href="contacto.html">Contacto</a>
                 </li>
             </ul>
         </li>    

         
  </div>
   
   <div id="main">
       <div id="info">
           <h1> <span style="color: #0B7DEF;">Find!</span> <span style="color: #FF3B3B;">Job</span> Turismo Ahome</h1>
           <p>Encuentra cientos de trabajos en nuestra plataforma</p>
           <p>Publica trabajos para encontrar ayuda o empleados</p>
           <p>Es fácil y rápido</p>
           <p>prueba <span style="color: #0B7DEF;">Find!</span> <span style="color: #FF3B3B;">Job</span> ahora</p>
           <img src="img/dup.png" alt="Da a conocer tus servicios"> 
       </div>
       
       <div id="registro">
          <h2>Registrate</h2>
           
           <form action="./controlador/controlador_usuario.php" method="POST">
               Nombre: <br>
                <input type="text" placeholder="Nombre" name="nombre"> <br>
                Apellido: <br>
                <input type="text" placeholder="Apellido" name="apellido"> <br>
                Usuario: <br>
                <input type="radio" placeholder="Nombre" name="tipo_usuario" value="usuario"> <br>
                Publicista: <br>
                <input type="radio" placeholder="Nombre" name="tipo_usuario" value="publicista"> <br>
                <input type="text" placeholder="Nombre de usuario" name="nombre_usuario"> <br>
                <input type="password" placeholder="Contrase&ntilde;a" name="contrasena"> <br>
                <span style="font-size: 15px; display: block;"><input type="checkbox" style="margin: 0; width: 15px; height: 15px;"> Acepto los terminos y condiciones de Find! Job</span>
               <input type="submit" value="Registrar" style="cursor: pointer; background: #3BB358; border:0; font-weight: bold; color: white; font-size: 1.1em; height: 60px;">
                <input type="hidden" id="mandar" name="mandar" value="registroUsuario">
            </form>
       </div>
   </div>
   
   <div id="pie">
       <h2>En Construcción</h2>
   </div>
    
</body>
</html>
