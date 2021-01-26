
<?php 
class Servicio
{
public $id;
public $nombreServicio;
public $descripcion;
public $costo;
private $nombreDueno;
public function __construct($nombreServicio,$descripcion,$costo,$nombreDueno)
 {
    //$this->id = $id;
    $this->nombreServicio = $nombreServicio;
    $this->descripcion = $descripcion;
    $this->costo = $costo;
    $this->nombreDueno = $nombreDueno;
 }
 public function setId($id){
    $this->id = $id;
}
public function getId(){
    return $this->id;
}

 public function setNombreServicio($nombreServicio){
    $this->nombreServicio = $nombreServicio;
}
public function setDescripcion($descripcion){
    $this->descripcion = $descripcion;
}
public function setCosto($costo){
    $this->costo = $costo;
}
public function setNombreDueno($nombreDueno){
    $this->nombreDueno = $nombreDueno;
}

 public function getNombreServicio(){
    return $this->nombreServicio;
}
public function getDescripcion(){
    return $this->descripcion;
}
public function getCosto(){
    return $this->costo;
}
public function getNombreDueno(){
    return $this->nombreDueno;
}

}
?>