<?php
/**
 * Created by PhpStorm.
 * User: Jose
 * Date: 24/9/2017
 * Time: 04:19
 */

require_once '../modelo/Mascota.modelo.php';

$modelo = new MascotaModelo();


if(isset($_POST['agregar'])){
    $nombre = $_POST['nombre'];
    $sexo = $_POST['sexo'];
    $edad = $_POST['edad'];

    $estado = $modelo->agregarMascota($nombre, $sexo, $edad, '');

    if($estado == true){
        echo 'Mascota agregada';
    }else{
        echo 'Fallo al agregar mascota';
    }
}

if(!empty ($_POST['guardar'])){
    $id= $_POST ['id'];
    $nombre = $_POST['nombre'];
    $sexo = $_POST['sexo'];
    $edad = $_POST['edad'];
    $agrego = $modelo->actualizarMascota($id, $nombre, $sexo, $edad);
    if($agrego == true){
        echo "Exito al guardando dato";
    }else{
        echo "Fallo al guardando dato";
    }
}
if($_GET['opcion']){
    if($_GET['opcion'] == 'eliminar'){
        $id = $_GET['id'];
        $elimino = $modelo->desactivarMascota($id);
        if($elimino){
            echo 'Exito al eliminar mascota';
        }else{
            echo 'Fallo al eliminar mascota';
        }
    }
    if($_GET['opcion']== "editar"){
        $id=$_GET['id'];
        $datos = $modelo->obtenerDatosPorId($id);
        $nombreEditable = $datos ['nombre'];
        $sexoEditable = $datos ['sexo'];
        $edadEditable = $datos ['edad'];
        //var_dump($datos);
    }
}
$mascota = $modelo->mostrarMascota();

include_once '../vista/Inicio.vista.php';
