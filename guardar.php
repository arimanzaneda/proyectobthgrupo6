<?php
session_start();
include 'universal.php';
//no se necesita iniciar sesión para registrar a  nuevos usuarios

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $apellidoPaterno = trim($_POST['apellidoPaterno'] ?? '');
    $apellidoMaterno = trim($_POST['apellidoMaterno'] ?? '');
    $ci = trim($_POST['CI'] ?? '');
    $celular = trim($_POST['celular'] ?? '');
    $contrasena = trim($_POST['contrasena'] ?? '');
    $fechadenacimiento = $_POST['fechadenacimiento'] ?? '';
    $direccion = trim($_POST['direccion'] ?? '');
    $rude = trim($_POST['rude'] ?? '');
    //rude para que sean solo digitos y solo sean 11
    if (!preg_match('/^\d{1,11}$/', $rude)) {
        header('Location: registro.php?error=rude_invalido');
        exit();
    }
    $rol = $_POST['rol'] ?? 'estudiante';

    //validar campos necesarios nombre, apellidos, etc...........
    if (
        empty($nombre) || empty($apellidoPaterno) || empty($apellidoMaterno) ||
        empty($ci) || empty($contrasena) || empty($fechadenacimiento) ||
        empty($direccion) || empty($rude)
    ) {
        header('Location: registro.php?error=campos_requeridos');
        exit();
    }

    //si el CI ya existe o aun nop
    $verificar_ci = "SELECT COUNT(*) as existe FROM info WHERE ci = ?";
    $stmt = $con->prepare($verificar_ci);
    $stmt->execute([$ci]);
    $resultado = $stmt->fetch();

    if ($resultado['existe'] > 0) {
        header('Location: registro.php?error=ci_existente');
        exit();
    }

    //lo mismo q ci, solo q ahora con rude
    $verificar_rude = "SELECT COUNT(*) as existe FROM info WHERE rude = ?";
    $stmt = $con->prepare($verificar_rude);
    $stmt->execute([$rude]);
    $resultado = $stmt->fetch();

    if ($resultado['existe'] > 0) {
        header('Location: registro.php?error=rude_existente');
        exit();
    }

    try {
        $con->beginTransaction();

        $query_cuenta = "INSERT INTO cuenta (iduser, contra, rol, bloqueado) VALUES (?, ?, ?, 0)";
        $stmt = $con->prepare($query_cuenta);
        $stmt->execute([$ci, $contrasena, $rol]);

        //para insertar todo en la tabla de bd info
        $query_info = "INSERT INTO info (ci, nom, paterno, materno, fecha_n, direc, rude, telefono, cuenta_iduser) 
               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($query_info);
        $stmt->execute([
            $ci,
            $nombre,
            $apellidoPaterno,
            $apellidoMaterno,
            $fechadenacimiento,
            $direccion,
            $rude,
            $celular,
            $ci
        ]);

        $con->commit();

        header('Location: logueo.php?success=registro_exitoso');
        exit();
    } catch (Exception $e) {
        $con->rollBack();
        echo '<h2>Error al registrar usuario</h2>';
        echo '<p>' . htmlspecialchars($e->getMessage()) . '</p>';
        if (isset($stmt)) {
            echo '<pre>' . htmlspecialchars(print_r($stmt->errorInfo(), true)) . '</pre>';
        }
        exit();
    }
} else {
    header('Location: registro.php');
    exit();
}
