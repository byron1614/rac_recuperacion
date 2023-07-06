<?php
require_once 'Conexion.php';

class Asignar extends Conexion {
    public $asi_id;
    public $asi_programador;
    public $asi_apli;
    public $asi_sit;

    public function __construct($args = []) {
        $this->asi_id = $args['asi_id'] ?? null;
        $this->asi_programador = $args['asi_programador'] ?? '';
        $this->asi_apli = $args['asi_apli'] ?? '';
        $this->asi_sit = $args['asi_sit'] ?? 1;
    }

    public function guardar() {
        $sql = "INSERT INTO asi_programador (asi_programador, asi_apli, asi_sit) 
                VALUES ('$this->asi_programador', '$this->asi_apli', '$this->asi_sit')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
    
    public function buscarnom() {
        $sql = "SELECT  proga_nombres || ' ' || proga_apellidos AS nombre FROM asi_programador
        INNER JOIN programador ON asi_programador = proga_id 
        WHERE asi_apli = '$this->asi_apli'";

        if ($this->asi_id != null) {
            $sql .= " AND asi_id = $this->asi_id";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function buscar() {
        $sql = " SELECT asi_id, proga_nombres || ' ' || proga_apellidos AS nombre, apli_nombre FROM asi_programador
        INNER JOIN programador ON asi_programador = proga_id 
        inner join aplicaciones on apli_id = asi_apli";

        

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar() {
        $sql = "UPDATE asi_programador 
                SET asi_programador = '$this->asi_programador', asi_apli = '$this->asi_apli', 
                    asi_sit = '$this->asi_sit' 
                WHERE asi_id = $this->asi_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar() {
        $sql = "DELETE FROM asi_programador WHERE asi_id = $this->asi_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    } 
}
