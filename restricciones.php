<?php
session_start();
require "universal.php";

/* revisa si el usuario esta logeado */
if (!isset($_SESSION['usuario_id']) || !isset($_SESSION['rol'])) {
    header("Location: logueo.php?error=no_autenticado");
    exit();
}

/*guarda */
$id = $_SESSION['usuario_id'];
$rol = $_SESSION['rol'];
$nombre = $_SESSION['nombre'] ?? 'Usuario';

/*no deja entrar si esta bloqueado*/
$stmt = $con->prepare("SELECT bloqueado FROM cuenta WHERE iduser = ?");
$stmt->execute([$id]);
$usuario = $stmt->fetch();

if ($usuario && $usuario['bloqueado'] == 1) {
    session_destroy(); 
    header("Location: logueo.php?error=cuenta_bloqueada");
    exit();
}




function soloAdmin() {
    global $rol;
    if ($rol !== 'administrador') {
        header("Location: dashboard.php?error=acceso_denegado");
        exit();
    }
}

function soloProfesor() {
    global $rol;
    if ($rol !== 'profesor') {
        header("Location: dashboard.php?error=acceso_denegado");
        exit();
    }
}

function soloEstudiante() {
    global $rol;
    if ($rol !== 'estudiante') {
        header("Location: dashboard.php?error=acceso_denegado");
        exit();
    }
}
?>
