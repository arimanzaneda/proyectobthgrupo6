<?php
/*editar los datos de la cuenta*/
$conexion = new mysqli("localhost", "root", "", "bd_vicmac");
$ci = $_GET['ci'];
$resultado = $conexion->query("SELECT * FROM info WHERE ci='$ci'");
$usuario = $resultado->fetch_assoc();
?>

<form method="POST" action="actualizar.php">
    <input type="hidden" name="ci" value="<?php echo $usuario['ci']; ?>">

    <label>Nombre:</label>
    <input type="text" name="nom" value="<?php echo $usuario['nom']; ?>" required><br>

    <label>Apellido Paterno:</label>
    <input type="text" name="paterno" value="<?php echo $usuario['paterno']; ?>" required><br>

    <label>Apellido Materno:</label>
    <input type="text" name="materno" value="<?php echo $usuario['materno']; ?>" required><br>

    <label>Celular:</label>
    <input type="text" name="telefono" value="<?php echo $usuario['telefono']; ?>" required><br>

    <label>Fecha de nacimiento:</label>
    <input type="date" name="fecha_n" value="<?php echo $usuario['fecha_n']; ?>" required><br>

    <label>Dirección:</label>
    <input type="text" name="direc" value="<?php echo $usuario['direc']; ?>" required><br>

    <label>Contraseña:</label>
    <input type="text" name="contra" value=""><br>

    <input type="submit" value="Actualizar">
</form>