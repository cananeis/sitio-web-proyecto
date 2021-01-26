<?php

require_once('../clases/crud_servicio.php');
require_once('../clases/crud_horarios.php');
require_once('../usuario.php');
require_once('../servicio.php');
require_once('../horario.php');

$crud = new crudServicio();
$crud_horario = new crudHorario();
//echo"1";
if(isset($_POST['mandar']))
{
    //echo"2";
    session_start();
    if($_POST['mandar']==="registro")
    {
        if(isset($_SESSION["tipo"]))
        {
            if($_SESSION["tipo"]=="publicista")
            {
                validarCampos();
                $servicio = new Servicio($_POST['nameSercive'],$_POST['descrip'],$_POST['costos'],$_SESSION['nombre_usuario']);
                $crud->insertar($servicio);
                //busco todos los servicicos
                $listaDeservicio = $crud->obtenerLista();
                //consigo el ultimo agrego y le saco su id
                $last = end($listaDeservicio);
                $ultimoId = $last->getId();
                //creo un horario y lo inserto
                //$id_servicio,$de,$para,$dias,$capacidad
                $dias=concatenacionDeDias();
                $horario = new Horario($ultimoId,$_POST['de'],$_POST['para'],$dias,$_POST['capa']);
                $crud_horario->insertar($horario);
                pasarFotos($ultimoId);
                moverFotoServidor($ultimoId);
                //$id_servicio,$de,$para,$dias
               
                /*$de = $_POST['de'];
                $para = $_POST['para'];
                $capa = $_POST['capa'];*/
                echo "<span style='font-weight:bold;color:green;'>Servicio registrado<span>";
               /*echo "Luenes--- ".$lunes; 
            echo "MAr--- ".$martes; 
            echo "Mier--- ".$miercoles; 
            echo "J-- ".$jueves; 
            echo "V --".$viernes; 
            echo "S-- ".$sabado; 
             echo "D ---".$domingo; 
            echo "DE-- ".$de; 
            echo "PARA --".$para; */
            }
        }
    }
    if($_POST['mandar']==="consultar")
    {
        if(isset($_SESSION["tipo"]))
        {
            $listaDeservicio = $crud->obtenerLista();
            //echo is_array($listaDeservicio) ? 'Array' : 'No es un array';
            //echo "tamaño del array: ".count($listaDeservicio);
            foreach ($listaDeservicio as $key => $servicioEnLista) {
                //echo $servicioEnLista->getNombreServicio()."---";
                echo "<li class='list-group-item noBorder'>";
                echo "   <div class='media'>";
                echo "        <div class='media-body'>";
                echo "    <a href='detalles.php?id=".$servicioEnLista->getId()."'>    <h5 class='mt-0 font-weight-bold mb-2'>".$servicioEnLista->getNombreServicio() ."</h5></a> ";
                echo "            <p class='font-italic text-muted mb-0 small'>".$servicioEnLista->getDescripcion() ."</p>";
                echo "            <h6 class='font-weight-bold my-2'>".$servicioEnLista->getCosto()."</h6>";
                echo "        </div>";
                echo "        <img title='Turismo en Ahome' alt='Evento turistico en Ahome' onclick=".'"'."location.href ='http://localhost/sitio-web-proyecto/detalles.php?id=".$servicioEnLista->getId()." ';".'"'." src='./img/paisaje.jpg' alt=''>"   ;
                echo "    </div>   ";
                echo "</li>";
            }
            echo"<li class='list-group-item noBorder'>";
            echo"        <div class='media'>";
            echo"            <div class='media-body'>";
            echo"            </div>";
            echo"            <button onclick='ActualizarLista();return false;'>actualizar</button>";
            echo"        </div>   ";
            echo"</li>";
            //$servicio = $crud->obtenerUsuario($_POST['id']);
            //echo $usuario->getNombre();
        }
    }
}
else
{
    echo"123";
}
function pasarFotos( $ultimoId){
    $micarpeta = "./fotosServicio/".$ultimoId."";
    if (!file_exists($micarpeta)) {
        mkdir($micarpeta, 0777, true);
        echo "<span style='font-weight:bold;color:green;'>se creo la carpeta<span>";
    }else{
        echo "<span style='font-weight:bold;color:red;'>NO  se creo la carpeta<span>";
    }
    echo "<span style='font-weight:bold;color:red;'>asfafafafsfas<span>";
    $fotos_de_morras  = $_FILES['fotukis']['name'];   
    foreach( $fotos_de_morras as $value ) {
        
    }
}
function validarCampos(){
    validarSeleccionDias();
    if($_POST['nameSercive']==""){
        echo "<span style='font-weight:bold;color:red;'>Falta nombre de servicio<span>";
        exit;
    }
    if($_POST['costos']==""){
        echo "<span style='font-weight:bold;color:red;'>Agrege un costo a sus servicio<span>";
        exit;
    }
    if($_SESSION['nombre_usuario']==""){
        echo "<span style='font-weight:bold;color:red;'>No hay nombre de usuario<span>";
        exit;
    }
    if($_POST['de']==""){
        echo "<span style='font-weight:bold;color:red;'>no dio un horario de inicio<span>";
        exit;
    }
    if($_POST['para']==""){
        echo "<span style='font-weight:bold;color:red;'>No dio un horario de acabado<span>";
        exit;
    }
    if($_POST['capa']==""){
        echo "<span style='font-weight:bold;color:red;'>da de alta una capacidad de su servicio<span>";
        exit;
    }
}
function validarSeleccionDias(){
    $dias = false;
    if(isset($_POST['Lunes']))
    {
        $dias = true;
    }
    if(isset($_POST['Martes']))
    {
        $dias = true;
    }
    if(isset($_POST['Miercoles']))
    {
        $dias = true;
    }
    if(isset($_POST['Jueves']))
    {
        $dias = true;
    }
    if(isset($_POST['Viernes']))
    {
        $dias = true;
    }
    if(isset($_POST['Sabado']))
    {
        $dias = true;
    }
    if(isset($_POST['Domingo']))
    {
        $dias = true;
    }
    if($dias==false){
        echo "<span style='font-weight:bold;color:red;'>Escoge un horario de trabajo porfavor<span>";
        exit;
    }
}
function concatenacionDeDias(){
    $dias = '';
    if(isset($_POST['Lunes']))
    {
        $dias.= $_POST['Lunes']."-";
    }
    if(isset($_POST['Martes']))
    {
        $dias.= $_POST['Martes']."-";
    }
    if(isset($_POST['Miercoles']))
    {
        $dias.= $_POST['Miercoles']."-";
    }
    if(isset($_POST['Jueves']))
    {
        $dias.= $_POST['Jueves']."-";
    }
    if(isset($_POST['Viernes']))
    {
        $dias.= $_POST['Viernes']."-";
    }
    if(isset($_POST['Sabado']))
    {
        $dias.= $_POST['Sabado']."-";
    }
    if(isset($_POST['Domingo']))
    {
        $dias.= $_POST['Domingo']."-";
    }
    return $dias;
}

function moverFotoServidor($ultimoId){
    $target_dir = "./fotosServicio/".$ultimoId."/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
        echo "<span style='font-weight:bold;color:green;'>se creo la carpeta<span>";
    }else{
        echo "<span style='font-weight:bold;color:red;'>NO  se creo la carpeta<span>";
    }
   $fotos_de_morras  = $_FILES['fotukis']['name'];   
    for($i=0;$i<count($fotos_de_morras);$i++) {
    
$target_file = $target_dir . basename($fotos_de_morras[$i]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["mandar"])) {
  $check = getimagesize($_FILES["fotukis"]["tmp_name"][$i]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fotukis"]["size"][$i] > 50000000) {
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fotukis"]["tmp_name"][$i], $target_file)) {
      echo "se hizo bien";
  } else {
      "algo salio mal";
  }
}
    }
}


?>