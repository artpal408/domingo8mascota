<?php


session_start();

if(empty($_SESSION['usuario'])){
    header("Location: http://mascota:8089/vista/Login.vista.php");
}

?>

<form enctype="multipart/form-data" action="../controlador/Mascota.ctrl.php" method="post">

    <input value="<?php echo isset($nombreEditar) ? $nombreEditar : '' ?>" name="nombre" placeholder="Nombre mascota" type="text">
    <br>
    <input  value="<?php echo isset($edadEditar) ? $edadEditar : '' ?>" name="edad" placeholder="Edad" type="text">
    <br>
    <input  value="<?php echo isset($sexoEditar) ? $sexoEditar : '' ?>" name="sexo" placeholder="Sexo" type="text">
    <br>
    <label for="">Foto </label>
    <input  value="<?php echo isset($fotoEditar) ? $fotoEditar : '' ?>" name="foto" type="file">

    <br><br><br>

    <input name="idMascota"
           value="<?php echo $idEditar?>"
           type="hidden">
    <input name="<?php echo isset ($nombreEditar) ? 'guardar' : 'agregar' ?>"
           value="<?php echo isset ($nombreEditar) ? 'guardar' : 'agregar' ?>"
           type="submit">

</form>

<br><br><br>

<form
        method="post"
        action="../controlador/Mascota.ctrl.php">
    <input
            name="nombreabuscar"
            type="text">
    <input
            value="Buscar"
            name="buscar"
            type="submit">

</form>

<br><br><br>

<?php
foreach ($mascotas as $k => $v) {
    ?>

    <div>
        <img width="50px" src="<?php echo $v ['foto'] ?>" alt="">
        <p> <?php echo $v ['nombre'] ?> </p>
        <a href="http://mascota:8089/controlador/Mascota.ctrl.php?opcion=editar&id=<?php echo $v['idmascota'] ?>">Editar</a>
        <a href="http://mascota:8089/controlador/Mascota.ctrl.php?opcion=eliminar&id=<?php echo $v['idmascota'] ?>"">Eliminar</a>
    </div>

    <?php
}
?>

<br><br><br>


<br><br><br>

<a href="../controlador/Inicio.ctrl.php?cerrar=true"> Cerrar sesión </a>

<br><br>

