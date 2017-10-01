<?php
/**
 * Created by PhpStorm.
 * User: Jose
 * Date: 24/9/2017
 * Time: 01:24
 */

session_start();

require_once '../modelo/Inicio.modelo.php';

$modelo = new InicioModelo();


if(isset($_GET['cerrar'])){
    session_destroy();
    header("Location: http://mascota:8089");
}

if(isset($_POST['login'])){
    echo 'Hey, te quieres loguear';
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];

    $resultado = $modelo->login($usuario, $pass);

    if(empty($resultado)){
       echo 'Usuario no encontrado';
    }else{
        echo 'Bienvenido';
        $_SESSION['usuario'] = 1;
        header("Location: http://mascota:8089/controlador/Mascota.ctrl.php");
    }
}


if(!empty($_POST['agregar'])){
    echo 'Hey! vamos a agregar';
}