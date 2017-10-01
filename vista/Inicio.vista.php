<?php


session_start();

if(empty($_SESSION['usuario'])){
    header("Location: http://mascota:8089/vista/Login.vista.php");
}

?>

<form action="../controlador/Mascota.ctrl.php" method="post">

    <input name="nombre" placeholder="Nombre mascota" type="text">
    <br>
    <input name="edad" placeholder="Edad" type="text">
    <br>
    <input name="sexo" placeholder="Sexo" type="text">
    <br>
    <label for="">Foto </label>
    <input type="file">

    <br><br><br>

    <input name="agregar" value="agregar" type="submit">

</form>

<br><br>

<a href="../controlador/Inicio.ctrl.php?cerrar=true"> Cerrar sesión </a>

<br><br>

<?php
foreach ($mascota as $k => $v) {
    ?>

    <p><?php echo $v['marca'];?></p>
    <p> <a href="../controlador/Mascota.ctrl.php?opcion=eliminar&id=<?php echo $v['id']; ?>">Eliminar
        </a> <p> <a href="../controlador/Mascota.ctrl.php?opcion=editar&id=<?php echo $v['id']; ?>">Editar
        </a>
    </p>
    <?php
}
?>