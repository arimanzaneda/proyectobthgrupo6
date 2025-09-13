<?php
    session_start();
    $conexion = mysqli_connect("localhost", "root", "", "bd_vicmac");
    $actualizarTarea = "UPDATE tarea SET titulo='" . $_POST['titulo'] . "', `desc`='" . $_POST['descripcion'] . "', tema='" . $_POST['tema'] . "', nota=" . $_POST['puntos'] . " WHERE idtarea=" . $_GET['id_tarea'] . ";";
    echo $actualizarTarea;
    $resultado = mysqli_query($conexion, $actualizarTarea);
    header( "Location: clase.php?id=". $_SESSION['clase_id']);

    // header("Location: ./clase.php?id=". $_GET['id_clase']); 
?>