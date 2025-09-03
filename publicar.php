<?php
include "configuracion.php";
session_start();

//ver datos de sesion
$id = $_SESSION['id'] ?? null;
$nom = $_SESSION['nombre'] ?? null;
$idclase = $_GET['id'] ?? null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $publi = trim($_POST['mensaje'] ?? '');

    if (!$id || !$nom || !$idclase || !$publi) {
        //si datos incompletos es error
        header("Location: tablon.html?id=" . urlencode($idclase) . "&error=Datos incompletos");
        exit;
    }

    date_default_timezone_set('America/La_Paz');

    //fecha y hora para q salga -> nemotecnia ymdhiss
    $fcrea = date("Y-m-d H:i:s");

    //si la clase existe realmente
    $sql2 = "SELECT * FROM clases WHERE idclases = ?";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("i", $idclase);
    $stmt2->execute();
    $resultado = $stmt2->get_result();

    if ($resultado->num_rows > 0) {
        $sql = "INSERT INTO publica (nom_publi, contenido, f_crea, clases_idclases, clases_usuarios_user) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssii", $nom, $publi, $fcrea, $idclase, $id);

        if ($stmt->execute()) {
            header("Location: tablon.html?id=" . urlencode($idclase));
            exit;
        } else {
            header("Location: tablon.html?id=" . urlencode($idclase) . "&error=Error al publicar");
            exit;
        }
    } else {
        header("Location: tablon.html?id=" . urlencode($idclase) . "&error=Clase no encontrada");
        exit;
    }
} else {
    header("Location: tablon.html?id=" . urlencode($idclase) . "&error=Solicitud no válida");
    exit;
}
