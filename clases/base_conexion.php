<?php

class baseDatos { 
    private static $conexion=NULL;
    //Constructor de la clase
	private function __construct (){}
    
    public static function conectar(){
        try{
            //Self se usa para referirse a la clase en contexto estatico, los puntitos dobles para 
            //para referirse a una varible igual en estatico, se hace un objeto de PDO con la conexion a 
            // la base de datos y lo retorna.
            self::$conexion= new PDO('mysql:host=localhost;dbname=proyecto','root','');
            return self::$conexion;
        }catch(PDOException $e){
            echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
            exit;
        }  
    }
  } 

?>