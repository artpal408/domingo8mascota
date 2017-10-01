<?php
/**
 * Created by PhpStorm.
 * User: Jose
 * Date: 24/9/2017
 * Time: 04:11
 */

require_once '../driver.php';

class MascotaModelo{
    private $enlace;

    public function __construct()
    {
        $this->enlace = new DMysqli();
    }

    public function agregarMascota($nombre, $sexo, $edad, $foto){
        $consulta = sprintf("INSERT INTO mascotas VALUES(default, '%s', %d, '%s', '%s', default)", $nombre, $edad, $sexo, $foto);
        return $this->enlace->query($consulta);
    }

    public function obtenerMascotas(){
        $consulta =" SELECT * FROM mascotas WHERE activo = 1";
        return $this->enlace->multiples_datos($consulta);
    }
    public function obtenerMascotaPorNombre($nombre){
        $consulta = sprintf("Select * From mascotas WHERE nombre Like '%s%%'", $nombre);
        return $this->enlace->multiples_datos($consulta);
    }

    function eliminarMascota($id){
        $consulta = sprintf("UPDATE mascotas set activo = 0 WHERE idmascota = %d", $id);
        return $this->enlace->query($consulta);
    }

    function obtenerMascotasPorId($id){
        $consulta = sprintf("SELECT * FROM mascotas WHERE idmascota = %d", $id);
        return $this->enlace->datos($consulta);
    }

    public function actualizarMascota($nombre, $sexo, $edad, $id){
        $consulta = sprintf("UPDATE mascotas set nombre = '%s', edad = %d, sexo = '%s' WHERE idmascota = %d", $nombre, $edad, $sexo, $id);
        return $this->enlace->query($consulta);
    }
}