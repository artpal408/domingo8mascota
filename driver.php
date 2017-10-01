<?php
/**
 * Created by PhpStorm.
 * User: JDelgado
 * Date: 20/05/2017
 * Time: 11:44 PM
 */

class DMysqli
{
    private $conexion;
    const BASE = 'mascota';
    const SERVER = '127.0.0.1';//'192.168.2.8';//'';//'192.168.2.7';//'192.168.3.154';
    const PASS = '';
    const USER = 'root';//'ies';

    public function __construct()
    {
        $this->conexion = mysqli_connect(self::SERVER, self::USER, self::PASS) or die('Error conectando a la base de datos');

        if (!mysqli_select_db($this->conexion, self::BASE)) {
            echo 'Error conectando a la base de datos';
        }
    }

    public function query($query)
    {
        if (mysqli_query($this->conexion,$query)) {
            return true;
        } else {
            return false;
        }

    }

    /** Retorna un dato de una consulta */
    public function datos($query)
    {
        if ($d = mysqli_query($this->conexion, $query)) {
            return mysqli_fetch_array($d);
        } else {
            return false;
        }

    }

    /** Retorna múltiples datos de una consulta */
    public function multiples_datos($query)
    {
        $array = array();
        if ($d = mysqli_query($this->conexion, $query)) {
            while ($res = mysqli_fetch_assoc($d)) {
                $array[] = $res;
            }
            return $array;
        } else {
            return false;
        }
    }

    public function multiples_datos_row($query)
    {
        $array = array();
        if ($s = mysqli_query($this->conexion, $query)) {
            while ($z = mysqli_fetch_row($s)) {
                $array[] = $z;
            }

            return $array;
        } else {
            return false;
        }
    }

    public function preparar_consulta($var = null)
    {
        if (!isset($var)) {
            throw new Exception("No está inicializada la variable");
        }

        $res = mysqli_real_escape_string($this->conexion, $var);

        return $res;
    }


    public function validar_campos($arr = null)
    {

        $size = sizeof($arr);

        if ($size < 0) {
            throw new Exception("No está inicializada la variable");
        }

        for ($i = 0; $i < $size; $i++) {
            $arr[$i] = self::preparar_consulta($arr[$i]);
        }

        return $arr;
    }
}