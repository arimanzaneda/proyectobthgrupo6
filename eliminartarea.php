<?php
    session_start();
    $conexion = mysqli_connect("localhost", "root", "", "bd_vicmac");
    $consultaEliminarTarea = "DELETE FROM tarea WHERE idtarea=" . $_GET['id_tarea'] . ";";

    $resultado = mysqli_query($conexion, $consultaEliminarTarea);
    header( "Location: clase.php?id=". $_SESSION['clase_id']);
?>