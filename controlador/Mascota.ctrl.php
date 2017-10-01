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

    var_dump($_FILES);
    $directorio = $_SERVER["DOCUMENT_ROOT"] . '/imagenes/' . str_replace( '', '_', $_FILES["foto"]["name"]);

    if(move_uploaded_file($_FILES["foto"]["tmp_name"] , $directorio)){
        echo "Se subio la imagen";
    }else {
        echo "Fallo al subir la imagen";
    }


    $nombre = $_POST['nombre'];
    $sexo = $_POST['sexo'];
    $edad = $_POST['edad'];



    $estado = $modelo->agregarMascota($nombre, $sexo, $edad, 'http://mascota:8089/' . '/imagenes/' + $_FILES["foto"]["name"]);

    if($estado == true){
        echo 'Mascota agregada';
    }else{
        echo 'Fallo al agregar mascota';
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
$mascota = $modelo->mostrarMascotas();

include_once '../vista/Inicio.vista.php';
