<?php 

require_once('base_conexion.php');
require_once('crud_interface.php');

class crudServicio implements crud{
//Constructor de la clase
    public function __construct(){}
//Funcion para insertar en la base de datos, se le pasa una variable de la clase Usuario y usa el metodo
// de la clase baseDatos conectar que devuelve un PDO para manipular la base de datos, también podemos usar
// metodos para preparar la sentencia de sql y para asignar los valores.

    public function insertar($servicio){
        $conexion = baseDatos::conectar();
        $insercion= $conexion->prepare('Insert INTO servicios values(NULL, :nombre,:descrip,:costo,:trabajador,NULL)');
        $insercion->bindValue(':nombre',$servicio->getNombreServicio());
        $insercion->bindValue(':descrip',$servicio->getDescripcion());
        $insercion->bindValue(':costo',$servicio->getCosto());
        $insercion->bindValue(':trabajador',$servicio->getNombreDueno());
        $insercion->execute();
    }
    public function eliminar($id){
        $conexion=baseDatos::conectar();
        $eliminar=$conexion->prepare('DELETE FROM servicios WHERE id_Servicio=:id');
        $eliminar->bindValue(':id',$id);
        $eliminar->execute();
    }

    public function obtenerLista(){
        $conexion = baseDatos::conectar();
        $listaServe = [];
        $select = $conexion->query('SELECT * FROM servicios');
        foreach($select->fetchAll() as $usuarioBD){
            //$servicio = new Servicio($_POST['nameSercive'],$_POST['descrip'],$_POST['costos'],"vendedor")
            $servicioLista = new Servicio($usuarioBD['nombre_servicio'],$usuarioBD['desc_servicio'],$usuarioBD['costo'],$usuarioBD['trabajador']);
            $servicioLista->setId($usuarioBD['id_Servicio']);
            $listaServe[] = $servicioLista;
        }
        return $listaServe;
    }

    public function obtenerElemento($id){
        $conexion = baseDatos::conectar();
        $select=$conexion->prepare('SELECT * FROM servicios WHERE id_Servicio=:id');
        $select->bindValue(':id',$id);
        $select->execute();
        $usuarioBD = $select->fetch();
        $servicioLista = new Servicio($usuarioBD['nombre_servicio'],$usuarioBD['desc_servicio'],$usuarioBD['costo'],$usuarioBD['trabajador']);
        $servicioLista->setId($usuarioBD['id_Servicio']);
        return $servicioLista;
    }
}


?>