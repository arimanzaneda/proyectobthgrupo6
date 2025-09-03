<?php
require "universal.php";
session_start();

$nombre = $_POST['nombre'];
$materia = $_POST['materia'];
$aula = $_POST['aula'];
$iduser = $_SESSION['usuario'];

$codigo = substr(md5($nombre . $materia . $aula . time()), 0, 8);

$sql = "INSERT INTO clases (nom_clase, codel, cuenta_iduser) VALUES ('$nombre', '$codigo', '$iduser')";

if ($con->query($sql)) {
    echo "Clase creada correctamente.<br>";
    echo "<a href='clases.php'>Volver al listado de clases</a>";
} else {
    echo "Error al crear la clase: " . $con->error;
    echo "<a href='form.crearclase.html'>Volver al formulario</a>";
}
?>  