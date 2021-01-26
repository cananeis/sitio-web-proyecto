
<?php 
class Reservacion
{
public $id_reservacion;
public $id_servicio;
public $id_vendedor;
public $id_comprador;
public $costo;
public $cupos;
public $fecha;
public $hora;
public function __construct($id_servicio,$id_vendedor,$id_comprador,$costo,$cupos,$fecha,$hora)
 {
    //$this->id = $id;
    $this->id_servicio = $id_servicio;
    $this->id_vendedor = $id_vendedor;
    $this->id_comprador = $id_comprador;
    $this->costo = $costo;
    $this->cupos = $cupos;
    $this->fecha = $fecha;
    $this->hora = $hora;
 }
 public function sethora($hora){
    $this->hora = $hora;
}
public function gethora(){
    return $this->hora;
}
 public function setfecha($fecha){
    $this->fecha = $fecha;
}
public function getfecha(){
    return $this->fecha;
}
 public function setcupos($cupos){
    $this->cupos = $cupos;
}
public function getcupos(){
    return $this->cupos;
}
 public function setcosto($costo){
    $this->costo = $costo;
}
public function getcosto(){
    return $this->costo;
}
 public function setid_comprador($id_comprador){
    $this->id_comprador = $id_comprador;
}
public function getid_comprador(){
    return $this->id_comprador;
}
 public function setId($id_reservacion){
    $this->id_reservacion = $id_reservacion;
}
public function getId(){
    return $this->id_reservacion;
}
 public function setId_Servicio($id_servicio){
    $this->id_servicio = $id_servicio;
}
public function getid_servicio(){
    return $this->id_servicio;
}
public function setid_vendedor($id_vendedor){
    $this->id_vendedor = $id_vendedor;
}
public function getid_vendedor(){
    return $this->id_vendedor;
}


}
?>