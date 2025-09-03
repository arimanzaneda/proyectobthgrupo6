lo mismo que actualizar
<?php
require "universal.php";
    $id=$_GET['id'];
    $sql="SELECT * FROM registro WHERE id=$id";
    $resultado= $conexion ->query($sql);
    if ($resultado->num_rows > 0) {
         while ($fila=$resultado->fetch_assoc()){
            $ci = $_POST['ci'];
$nombre = $fila['nombre'];
$apellido_paterno = $fila['Apellidopaterno'];
$apellido_materno = $fila['Apellidomaterno'];
$celular = $fila['celular'];
$contrasena =$fila['contrasena'];
$fecha_nacimiento = $fila['fechadenacimiento'];
$direccion = $fila['direccion'];
$RUDE = $fila['RUDE'];
}
} 
?>