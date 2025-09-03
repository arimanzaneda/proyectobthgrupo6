<?php
$conexion = new mysqli("localhost", "root", "", "bd_vicmac");

$ci = $_POST['ci'];
$nombre = $_POST['nom'];
$apellido_paterno = $_POST['paterno'];
$apellido_materno = $_POST['materno'];
$celular = $_POST['telefono'];
$fecha_nacimiento = $_POST['fecha_n'];
$direccion = $_POST['direc'];
$contrasena = $_POST['contra'];

$sql = "UPDATE info SET 
    nom='$nombre',
    paterno='$apellido_paterno',
    materno='$apellido_materno',
    telefono='$celular',
    fecha_n='$fecha_nacimiento',
    direc='$direccion'
WHERE ci='$ci'";

$sql2 = "UPDATE cuenta SET contra='$contrasena' WHERE iduser='$ci'";

if ($conexion->query($sql) && $conexion->query($sql2)) {
    echo "Registro actualizado correctamente.<br>";
} else {
    echo "Error al actualizar: " . $conexion->error;
}

echo "<a href='read.php'>Volver a la lista</a>";
?>