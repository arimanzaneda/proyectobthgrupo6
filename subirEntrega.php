<?php
    session_start();
    $conexion = mysqli_connect("localhost", "root", "", "bd_vicmac");
// echo $_SESSION['usuario_id'];
// echo $_GET['idTarea'];
$f_entrega = date("Y-m-d H:i:s");

// IdTarea,idusuario, 0 , f_entrega


$sql = "INSERT INTO Entrega (tarea_idtarea, cuenta_iduser, f_entrega) 
            VALUES (".$_GET['idTarea']. ", '".$_SESSION['usuario_id']. "', '". $f_entrega."');";
echo $sql;
$resultado = mysqli_query($conexion, $sql);
header("Location: /claseEstudiante.php?id=".$_SESSION['clase_id']);

?>
