<?php
/**
 * Created by PhpStorm.
 * User: Jose
 * Date: 24/9/2017
 * Time: 01:19
 */

session_start();

if(empty($_SESSION['usuario'])){
    include_once 'vista/Login.vista.php';
}else{
    include_once 'vista/Inicio.vista.php';
}

