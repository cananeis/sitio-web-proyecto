<?php 

require_once('base_conexion.php');
require_once('crud_interface.php');

class crudHorario implements crud{
//Constructor de la clase
    public function __construct(){}
//Funcion para insertar en la base de datos, se le pasa una variable de la clase Usuario y usa el metodo
// de la clase baseDatos conectar que devuelve un PDO para manipular la base de datos, también podemos usar
// metodos para preparar la sentencia de sql y para asignar los valores.

    public function insertar($horario){
        $conexion = baseDatos::conectar();
        $insercion= $conexion->prepare('Insert INTO horarios_servicios values(NULL, :idServicio,:de,:para,:dias,:capacidad)');
        $insercion->bindValue(':idServicio',$horario->getId_Servicio());
        $insercion->bindValue(':de',$horario->getDe());
        $insercion->bindValue(':para',$horario->getpara());
        $insercion->bindValue(':dias',$horario->getDias());
        $insercion->bindValue(':capacidad',$horario->getcapacidad());
        $insercion->execute();
    }
    public function eliminar($id){
        $conexion=baseDatos::conectar();
        $eliminar=$conexion->prepare('DELETE FROM servicios WHERE id_horario=:id');
        $eliminar->bindValue(':id',$id);
        $eliminar->execute();
    }

    public function obtenerLista(){
        $conexion = baseDatos::conectar();
        $listaServe = [];
        $select = $conexion->query('SELECT * FROM horarios_servicios');
        foreach($select->fetchAll() as $horarioBD){
            //$servicio = new Servicio($_POST['nameSercive'],$_POST['descrip'],$_POST['paras'],"vendedor")
            $horarioEnLista = new Horario($horarioBD['id_servicio'],$horarioBD['de'],$horarioBD['para'],$horarioBD['dias'],$horarioBD['capacidad']);
            $horarioEnLista->setId($horarioBD['id_horario']);
            $listaServe[] = $horarioEnLista;
        }
        return $listaServe;
    }

    public function obtenerElemento($id){
        $conexion = baseDatos::conectar();
        $select=$conexion->prepare('SELECT * FROM horarios_servicios WHERE id_servicio=:id');
        $select->bindValue(':id',$id);
        $select->execute();
        $horarioBD = $select->fetch();
        $horarioEnLista = new Horario($horarioBD['id_servicio'],$horarioBD['de'],$horarioBD['para'],$horarioBD['dias'],$horarioBD['capacidad']);
        $horarioEnLista->setId($horarioBD['id_horario']);
        return $horarioEnLista;
    }
}


?>