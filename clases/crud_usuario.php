<?php 

require_once('base_conexion.php');
require_once('crud_interface.php');

class crudUsuario implements crud{
//Constructor de la clase
    public function __construct(){}
//Funcion para insertar en la base de datos, se le pasa una variable de la clase Usuario y usa el metodo
// de la clase baseDatos conectar que devuelve un PDO para manipular la base de datos, también podemos usar
// metodos para preparar la sentencia de sql y para asignar los valores.
    public function insertar($usuario){
        $conexion = baseDatos::conectar();
        $insercion= $conexion->prepare('Insert INTO usuarios values(NULL, :nombre,:apellido,:tipo_usuario,:nombre_usuario,:contrasena,NULL)');
        $insercion->bindValue(':nombre',$usuario->getNombre());
        $insercion->bindValue(':apellido',$usuario->getApellido());
        $insercion->bindValue(':tipo_usuario',$usuario->getTipo());
        $insercion->bindValue(':nombre_usuario',$usuario->getNombreUsuario());
        $insercion->bindValue(':contrasena',$usuario->getContrasena());
        if ($insercion->execute()) { 
            echo "Insertado";
         } else {
            echo "El nombre de usuario está siendo utilizado";
         }
    }

    public function obtenerLista(){
        $conexion = baseDatos::conectar();
        $listaUsuarios = [];
        $select = $conexion->prepare('SELECT * FROM usuarios');

        foreach($select->fetchAll() as $usuarioBD){
            $usuarioLista = new Usuario($usuarioBD['nombre'],$usuarioBD['apellido'],$usuarioBD['tipo_usuario'],$usuarioBD['nombre_usuario']);
            $listaUsuarios[] = $usuarioLista;
        }
        return $listaUsuarios;
    }

    public function obtenerElemento($nombre_usuario){
        $conexion = baseDatos::conectar();
        $select=$conexion->prepare('SELECT * FROM usuarios WHERE nombre_usuario=:nombre');
        $select->bindValue(':nombre',$nombre_usuario);
        $select->execute();
        $usuarioBD = $select->fetch();
        if(!is_bool($usuarioBD)){
            $usuarioLista = new Usuario($usuarioBD['nombre'],$usuarioBD['apellido'],$usuarioBD['tipo_usuario'],$usuarioBD['nombre_usuario'],$usuarioBD['contrasena']);
            $usuarioLista->setid_usuario($usuarioBD['id_usuario']);
            return $usuarioLista;
            //return new Usuario($usuarioBD['nombre'],$usuarioBD['apellido'],$usuarioBD['tipo_usuario'],$usuarioBD['nombre_usuario'],$usuarioBD['contrasena']);
        }else{
            echo "el usuario no existe";
        }
        
    }
}


?>