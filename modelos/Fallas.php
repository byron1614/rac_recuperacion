<?php
require_once 'Conexion.php';

class Fallas extends Conexion {
    public $fal_id;
    public $fal_apli;
    public $fal_descripcion;
    public $fal_fecha;
    public $fal_estado;

    public function __construct($args = []) {
        $this->fal_id = $args['fal_id'] ?? null;
        $this->fal_apli = $args['fal_apli'] ?? '';
        $this->fal_descripcion = $args['fal_descripcion'] ?? '';
        $this->fal_fecha = $args['fal_fecha'] ?? '';
        $this->fal_estado = $args['fal_estado'] ?? 1;
    }

    public function guardar() {
        $sql = "INSERT INTO fallos(fal_apli, fal_descripcion, fal_fecha, fal_estado) 
                VALUES ('$this->fal_apli', '$this->fal_descripcion', '$this->fal_fecha', '$this->fal_estado')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar() {
        $sql = "   SELECT fal_id, fal_apli, fal_descripcion, fal_fecha, apli_nombre
        FROM fallos INNER JOIN aplicaciones ON fal_apli= apli_id";

        // if ($this->fal_id != null) {
        //     $sql .= " WHERE fal_id = $this->fal_id";
        // }

        // if ($this->fal_apli != '') {
        //     $sql .= " AND fal_apli LIKE '%$this->fal_apli%'";
        // }

        // if ($this->fal_descripcion != '') {
        //     $sql .= " AND fal_descripcion LIKE '%$this->fal_descripcion%'";
        // }

        // if ($this->fal_fecha != '') {
        //     $sql .= " AND fal_fecha = '$this->fal_fecha'";
        // }

        // if ($this->fal_estado != '') {
        //     $sql .= " AND fal_estado = '$this->fal_estado'";
        // }

        $resultado = self::servir($sql);
        return $resultado;
    }


public function buscarfal(){
    $sql=" SELECT* from fallos where fal_apli =$this->fal_apli ";
    $resultado = self::servir($sql);
    return $resultado;
}

    public function buscar1() {
        $sql = "   SELECT fal_id, fal_apli, fal_descripcion, fal_fecha, apli_nombre
        FROM fallos INNER JOIN aplicaciones ON fal_apli= apli_id where fal_id = $this->fal_id ";

        // if ($this->fal_id != null) {
        //     $sql .= " WHERE fal_id = $this->fal_id";
        // }

        // if ($this->fal_apli != '') {
        //     $sql .= " AND fal_apli LIKE '%$this->fal_apli%'";
        // }

        // if ($this->fal_descripcion != '') {
        //     $sql .= " AND fal_descripcion LIKE '%$this->fal_descripcion%'";
        // }

        // if ($this->fal_fecha != '') {
        //     $sql .= " AND fal_fecha = '$this->fal_fecha'";
        // }

        // if ($this->fal_estado != '') {
        //     $sql .= " AND fal_estado = '$this->fal_estado'";
        // }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar() {
        $sql = "UPDATE fallos 
                SET fal_apli = '$this->fal_apli', fal_descripcion = '$this->fal_descripcion', 
                    fal_fecha = '$this->fal_fecha', fal_estado = '$this->fal_estado' 
                WHERE fal_id = $this->fal_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar() {
        $sql = "DELETE FROM fallos WHERE fal_id = $this->fal_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
