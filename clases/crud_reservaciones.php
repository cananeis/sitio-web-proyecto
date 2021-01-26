<?php 

require_once('base_conexion.php');
require_once('crud_interface.php');

class crudReservacion implements crud{
//Constructor de la clase
    public function __construct(){}
//Funcion para insertar en la base de datos, se le pasa una variable de la clase Usuario y usa el metodo
// de la clase baseDatos conectar que devuelve un PDO para manipular la base de datos, también podemos usar
// metodos para preparar la sentencia de sql y para asignar los valores.

    public function insertar($reservacion){
        $conexion = baseDatos::conectar();
        $insercion= $conexion->prepare('Insert INTO reservacion values(NULL, :idServicio,:id_vendedor,:id_comprador,:costo,:cupos,:fecha,:hora)');
        $insercion->bindValue(':idServicio',$reservacion->getid_servicio());
        $insercion->bindValue(':id_vendedor',$reservacion->getid_vendedor());
        $insercion->bindValue(':id_comprador',$reservacion->getid_comprador());
        $insercion->bindValue(':costo',$reservacion->getcosto());
        $insercion->bindValue(':cupos',$reservacion->getcupos());
        $insercion->bindValue(':fecha',$reservacion->getfecha());
        $insercion->bindValue(':hora',$reservacion->gethora());
        $insercion->execute();
    }
    public function eliminar($id){
        //NO TRABAJAO!!!!!!
        $conexion=baseDatos::conectar();
        $eliminar=$conexion->prepare('DELETE FROM reservacion WHERE id_horario=:id');
        $eliminar->bindValue(':id',$id);
        $eliminar->execute();
    }

    public function obtenerLista(){
        //NO TRABAJAO!!!!!!
        $conexion = baseDatos::conectar();
        $listaServe = [];
        $select = $conexion->query('SELECT * FROM reservacion');
        foreach($select->fetchAll() as $horarioBD){
            //$servicio = new Servicio($_POST['nameSercive'],$_POST['descrip'],$_POST['paras'],"vendedor")
            $horarioEnLista = new Horario($horarioBD['id_servicio'],$horarioBD['de'],$horarioBD['para'],$horarioBD['dias'],$horarioBD['capacidad']);
            $horarioEnLista->setId($horarioBD['id_horario']);
            $listaServe[] = $horarioEnLista;
        }
        return $listaServe;
    }

    public function obtenerElemento($id){
        //NO TRABAJAO!!!!!!
        $conexion = baseDatos::conectar();
        $select=$conexion->prepare('SELECT * FROM reservacion WHERE id_servicio=:id');
        $select->bindValue(':id',$id);
        $select->execute();
        $horarioBD = $select->fetch();
        $horarioEnLista = new Horario($horarioBD['id_servicio'],$horarioBD['de'],$horarioBD['para'],$horarioBD['dias'],$horarioBD['capacidad']);
        $horarioEnLista->setId($horarioBD['id_horario']);
        return $horarioEnLista;
    }
}


?>