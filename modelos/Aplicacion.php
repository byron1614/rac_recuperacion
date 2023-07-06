<?php
require_once 'Conexion.php';

class Aplicacion extends Conexion{
    public $apli_id;
    public $apli_nombre;
    public $apli_estado;


    public function __construct($args = [] )
    {
        $this->apli_id = $args['apli_id'] ?? null;
        $this->apli_nombre = $args['apli_nombre'] ?? '';
        $this->apli_estado = $args['apli_estado'] ?? 1;
    }

    public function guardar(){
        $sql = "INSERT INTO aplicaciones(apli_nombre, apli_estado) VALUES ('$this->apli_nombre','$this->apli_estado')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * FROM aplicaciones WHERE apli_estado = 1";

        if($this->apli_nombre != ''){
            $sql .= " AND apli_nombre LIKE '%$this->apli_nombre%'";
        }

        if($this->apli_estado != ''){
            $sql .= " AND apli_estado = '$this->apli_estado'";
        }

        if($this->apli_id != null){
            $sql .= " AND apli_id = $this->apli_id";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }


    public function buscart(){
        $sql = "SELECT * FROM aplicaciones WHERE apli_estado in (1,2,3,4,5)";

        if($this->apli_nombre != ''){
            $sql .= " AND apli_nombre LIKE '%$this->apli_nombre%'";
        }

            if($this->apli_id != null){
            $sql .= " AND apli_id = $this->apli_id";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function buscarapp(){
        $sql = "SELECT * FROM aplicaciones WHERE apli_estado in (1,2,3,4,5) AND apli_id = $this->apli_id";



        $resultado = self::servir($sql);
        return $resultado;
    }





    public function modificar(){
        $sql = "UPDATE aplicaciones SET apli_nombre = 
        '$this->apli_nombre', apli_estado = '$this->apli_estado' 
        WHERE apli_id = $this->apli_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }



    
    public function modificar2(){
        $sql = "UPDATE aplicaciones SET  apli_estado = '$this->apli_estado' WHERE apli_id = $this->apli_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "DELETE FROM aplicaciones WHERE apli_id = $this->apli_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
