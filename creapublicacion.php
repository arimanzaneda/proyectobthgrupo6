<?php
require "universal.php";
session_start();

//si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header("Location: logueo.html");
    exit();
}

$iduser = $_SESSION['usuario'];
$rol = $_SESSION['rol'];
$idclase = $_POST['idclase'];
$contenido = $_POST['anuncio'];

//si el usuario esta en la clase (para estud)
if ($rol == 'estudiante') {
    $check = $con->query("SELECT * FROM cuenta_has_clases WHERE cuenta_iduser='$iduser' AND clases_idclases='$idclase'");
    if ($check->num_rows == 0) {
        echo "No tienes acceso a esta clase.";
        exit();
    }
}

if (!empty($contenido)) {
    $sql = "INSERT INTO publicaciones (contenido, f_crea, cuenta_iduser, clases_idclases) VALUES ('$contenido', NOW(), '$iduser', '$idclase')";
    if ($con->query($sql) === TRUE) {
        header("Location: tablondemateria.php?id=$idclase");
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
} else {
    header("Location: tablondemateria.php?id=$idclase");
}
