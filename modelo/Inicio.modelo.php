<?php
/**
 * Created by PhpStorm.
 * User: Jose
 * Date: 24/9/2017
 * Time: 02:29
 */

require_once '../driver.php';

class InicioModelo{
    private $enlace;

    public function __construct()
    {
        $this->enlace = new DMysqli();
    }

    public function login($usuario, $pass){
        $consulta = sprintf("SELECT * FROM usuarios WHERE usuario = '%s' AND pass = '%s' ", $usuario, $pass);
        var_dump($consulta);
        return $this->enlace->datos($consulta);

    }

}