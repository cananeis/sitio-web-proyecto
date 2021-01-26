
<?php 
class Horario
{
public $id_horario;
public $id_servicio;
public $de;
public $para;
public $dias;
public $capacidad;
public function __construct($id_servicio,$de,$para,$dias,$capacidad)
 {
    //$this->id = $id;
    $this->id_servicio = $id_servicio;
    $this->de = $de;
    $this->para = $para;
    $this->dias = $dias;
    $this->capacidad = $capacidad;
 }
 public function setcapacidad($capacidad){
    $this->capacidad = $capacidad;
}
public function getcapacidad(){
    return $this->capacidad;
}

 public function setId($id_horario){
    $this->id_horario = $id_horario;
}
public function getId(){
    return $this->id_horario;
}

 public function setId_Servicio($id_servicio){
    $this->id_servicio = $id_servicio;
}
public function setDe($de){
    $this->de = $de;
}
public function setpara($para){
    $this->para = $para;
}
public function setDias($dias){
    $this->dias = $dias;
}

 public function getId_Servicio(){
    return $this->id_servicio;
}
public function getDe(){
    return $this->de;
}
public function getpara(){
    return $this->para;
}
public function getDias(){
    return $this->dias;
}

}
?>