<?php
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_tarea = $_POST['id_tarea'];
    $id_estudiante = $_POST['id_estudiante']; 
    $fecha = date("Y-m-d H:i:s");

    $sql = "INSERT INTO Entrega (id_tarea, id_estudiante, fechaEntrega) 
            VALUES ('$id_tarea', '$id_estudiante', '$fecha')";

    if ($conexion->query($sql)) {
        echo "✅ Tarea subida correctamente.";
    } else {
        echo "❌ Error: " . $conexion->error;
    }
}
?>

<!-- Formulario -->
<form method="POST">
    <label>ID Tarea:</label>
    <input type="number" name="id_tarea" required><br>

    <label>ID Estudiante:</label>
    <input type="number" name="id_estudiante" required><br>

    <button type="submit">Subir Tarea</button>
</form>