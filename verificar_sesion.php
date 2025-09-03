<?php
//verificar sesión y redirigir si no está autenticado
if (!isset($_SESSION['usuario_id']) || !isset($_SESSION['rol'])) {
    header('Location: logueo.php?error=no_autenticado');
    exit();
}

//si la sesión ha expirado o nop
if (isset($_SESSION['login_time']) && (time() - $_SESSION['login_time']) > 28800) {
    session_destroy();
    header('Location: logueo.php?error=sesion_expirada');
    exit();
}

//ver si el usuario tiene un rol
function verificarRol($roles_permitidos) {
    if (!in_array($_SESSION['rol'], $roles_permitidos)) {
        header('Location: dashboard.php?error=sin_permisos');
        exit();
    }
}

//si el usuario tiene acceso a una clase específica
function verificarAccesoClase($clase_id, $conexion) {
    $usuario_id = $_SESSION['usuario_id'];
    $rol = $_SESSION['rol'];
    
    //admin acceso a todo
    if ($rol === 'administrador') {
        return true;
    }
    
    //si el usuario está registrado en la clase
    $verificar_acceso = "SELECT COUNT(*) as acceso FROM cuenta_has_clases 
                        WHERE cuenta_iduser = ? AND clases_idclases = ?";
    $stmt = $conexion->prepare($verificar_acceso);
    $stmt->execute([$usuario_id, $clase_id]);
    $resultado = $stmt->fetch();
    
    if ($resultado['acceso'] > 0) {
        return true;
    }
    
    //si es profesor de la clase
    $verificar_profesor = "SELECT COUNT(*) as es_profesor FROM clases 
                          WHERE idclases = ? AND cuenta_iduser = ?";
    $stmt = $conexion->prepare($verificar_profesor);
    $stmt->execute([$clase_id, $usuario_id]);
    $es_profesor = $stmt->fetch();
    
    return $es_profesor['es_profesor'] > 0;
}
?>
