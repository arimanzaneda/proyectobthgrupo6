<?php
$nombreServidor="localhost";
$usuario = "root";
$contraseña = "";
$basededatos = "bd_vicmac";
$conexion = new mysqli($nombreServidor,$usuario,$contraseña,$basededatos);
if ($conexion->connect_error) {
    echo "Hubo un error ";
}
$sql = "SELECT * FROM info";

$resultado = $conexion->query($sql);
if ($resultado->num_rows > 0) {
    while ($fila=$resultado->fetch_assoc()){
        echo $fila['ci']." ".$fila['nom']." ".$fila['paterno']." ".$fila['materno']." ".$fila['telefono']." ".$fila['fecha_n']." ".$fila['direc']." ".$fila['rude'];
        $ci=$fila['ci'];

        echo "<a href='formulariode.php?ci=$ci'><button>editar</button></a>";
    }
}
?>
