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
        $consulta =" SELECT * FROM mascotas";
        return $this->enlace->multiples_datos($consulta);
    }
    public function obtenerMascotaPorNombre($nombre){
        $consulta = sprintf("Select * From mascotas WHERE nombre Like '%s%%'", $nombre);
        return $this->enlace->multiples_datos($consulta);
    }

    public function desactivarMascotas($id){
        $consulta = "UPDATE mascotas set activo = 0 WHERE id = " . $id;
        return $this->enlace->query($consulta);
    }
    function eliminarMascotas($id){
        $consulta = "DELETE FROM mascotas WHERE id = " . $id;
        return $this->enlace->query($consulta);
    }
    function obtenerDatosPorId($id){
        $consulta = "SELECT * FROM mascotas WHERE activo = 1 and id = " . $id;
        return $this->enlace->datos($consulta);
    }

}