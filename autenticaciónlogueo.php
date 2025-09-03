<?php
session_start();
include 'universal.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $contraseña = trim($_POST['contraseña'] ?? '');
    
    if (empty($usuario) || empty($contraseña)) {
        header('Location: logueo.php?error=campos_vacios');
        exit();
    }
    
    //esto es para poder buscar usuario en la bd
    $query = "SELECT c.iduser, c.contra, c.rol, c.bloqueado, i.nom, i.paterno, i.materno 
              FROM cuenta c 
              LEFT JOIN info i ON c.iduser = i.cuenta_iduser 
              WHERE c.iduser = ?";
    
    $stmt = $con->prepare($query);
    $stmt->execute([$usuario]);
    $usuario_data = $stmt->fetch();
    
    if ($usuario_data) {
        
        //para verificar si la cuenta esta bloqueada o no
        if ($usuario_data['bloqueado'] == 1) {
            header('Location: logueo.php?error=cuenta_bloqueada');
            exit();
        }
        
        //para verificar contraseña
        if ($usuario_data['contra'] === $contraseña) {
            //logueo
            $_SESSION['usuario_id'] = $usuario_data['iduser'];
            $_SESSION['rol'] = $usuario_data['rol'];
            $_SESSION['nombre'] = $usuario_data['nom'] . ' ' . $usuario_data['paterno'] . ' ' . $usuario_data['materno'];
            $_SESSION['login_time'] = time();
            
            //redirigir según el rol o sea est, prof, admin
            switch ($usuario_data['rol']) {
                case 'administrador':
                    header('Location: dashboard.php?rol=admin');
                    break;
                case 'profesor':
                    header('Location: dashboard.php?rol=profesor');
                    break;
                case 'estudiante':
                    header('Location: dashboard.php?rol=estudiante');
                    break;
                default:
                    header('Location: dashboard.php');
            }
            exit();
        } else {
            header('Location: logueo.php?error=credenciales_incorrectas');
            exit();
        }
    } else {
        header('Location: logueo.php?error=usuario_no_encontrado');
        exit();
    }
} else {
    header('Location: logueo.php');
    exit();
}
?>
