<?php
    session_start();
    $conexion = mysqli_connect("localhost", "root", "", "bd_vicmac");
    $eliminarEntrega = "DELETE FROM entrega WHERE tarea_idtarea=" . $_GET['idTarea'] . " AND cuenta_iduser = ". $_SESSION['usuario_id'] . ";";
    
    $resultado = mysqli_query($conexion, $eliminarEntrega);
    header("Location: /claseEstudiante.php?id=".$_SESSION['clase_id']);
?>