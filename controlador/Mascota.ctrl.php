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

    $estado = $modelo->agregarMascota($nombre, $sexo, $edad, 'http://mascota:8089/' . 'imagenes/' . $_FILES["foto"]["name"]);

    if($estado == true){
        echo 'Mascota agregada';
    }else{
        echo 'Fallo al agregar mascota';
    }
}

if (isset ($_GET['opcion'])) {
    if ($_GET['opcion'] == "eliminar") {
        $id = $_GET ['id'];
        $estado = $modelo->eliminarMascota($id);

        if ($estado) {
            echo "se elmino con exito";
        } else {
            echo "fallo al eliminar";
        }
    }


    if ($_GET['opcion'] == "editar") {
        $id = $_GET ['id'];
        $resultado = $modelo->obtenerMascotasPorId($id);
        $nombreEditar = $resultado['nombre'];
        $sexoEditar = $resultado ['sexo'];
        $edadEditar = $resultado ['edad'];
        $fotoEditar = $resultado ['foto'];
        $idEditar = $resultado ['idmascota'];
    }

}

if (isset($_POST["guardar"])){
    $nombre = $_POST['nombre'];
    $sexo = $_POST['sexo'];
    $edad = $_POST['edad'];
    $id = $_POST['idmascota'];

    $estado= $modelo->actualizarMascota($nombre, $sexo, $edad, $id);

    if($estado){
        echo "Se actualizo correctamente";
    }else{
        echo "Fallo al actualizar";
    }
}




if(isset($_POST['buscar'])) {
    $buscar = $_POST['nombreabuscar'];
    $mascotas = $modelo->obtenerMascotaPorNombre($buscar);

}else{
    $mascotas = $modelo->obtenerMascotas();
}



include_once '../vista/Inicio.vista.php';
