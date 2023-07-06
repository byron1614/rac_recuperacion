<?php
require_once 'Conexion.php';

class Programadores extends Conexion {
    public $proga_id;
    public $proga_nombres;
    public $proga_apellidos;
    public $proga_sit;

    public function __construct($args = []) {
        $this->proga_id = $args['proga_id'] ?? null;
        $this->proga_nombres = $args['proga_nombres'] ?? '';
        $this->proga_apellidos = $args['proga_apellidos'] ?? '';
        $this->proga_sit = $args['proga_sit'] ?? 1;
    }

    public function guardar() {
        $sql = "INSERT INTO programador( proga_nombres, proga_apellidos, proga_sit) 
                VALUES ( '$this->proga_nombres', '$this->proga_apellidos', '$this->proga_sit')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar() {
        $sql = "SELECT proga_id,  proga_nombres || ' ' || proga_apellidos AS nombre
        FROM programador ";

        if ($this->proga_id != null) {
            $sql .= " AND proga_id = $this->proga_id";
        }

        if ($this->proga_nombres != '') {
            $sql .= " AND proga_nombres LIKE '%$this->proga_nombres%'";
        }

        if ($this->proga_apellidos != '') {
            $sql .= " AND proga_apellidos LIKE '%$this->proga_apellidos%'";
        }


        $resultado = self::servir($sql);
        return $resultado;
    }


    public function buscar2() {
        $sql = "SELECT * FROM programador where proga_id = $this->proga_id ";

       

        $resultado = self::servir($sql);
        return $resultado;
    }



    public function modificar() {
        $sql = "UPDATE programador 
                SET proga_nombres = '$this->proga_nombres', proga_apellidos = '$this->proga_apellidos', 
                    proga_sit = '$this->proga_sit' 
                WHERE proga_id = $this->proga_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar() {
        $sql = "DELETE FROM programador WHERE proga_id = $this->proga_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
