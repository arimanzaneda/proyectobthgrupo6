<?php
session_start();
include 'universal.php';

//SI usuario está logueado
to_start:
if (!isset($_SESSION['usuario_id']) || !isset($_SESSION['rol'])) {
    header('Location: logueo.php?error=no_autenticado');
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$rol = $_SESSION['rol'];
$clase_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($clase_id <= 0) {
    header('Location: dashboard.php?error=clase_invalida');
    exit();
}

//info clase
$query = "SELECT idclases, nom_clase, cuenta_iduser FROM clases WHERE idclases = ?";
$stmt = $con->prepare($query);
$stmt->execute([$clase_id]);
$clase = $stmt->fetch();

if (!$clase) {
    header('Location: dashboard.php?error=clase_no_encontrada');
    exit();
}

//permisos
if ($clase['cuenta_iduser'] != $usuario_id && $rol !== 'administrador') {
    header('Location: dashboard.php?error=sin_acceso');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_clase = trim($_POST['nom_clase'] ?? '');
    if (empty($nom_clase)) {
        $error = "El nombre de la clase no puede estar vacío";
    } else {
        $update = "UPDATE clases SET nom_clase = ? WHERE idclases = ?";
        $stmt = $con->prepare($update);
        if ($stmt->execute([$nom_clase, $clase_id])) {
            header('Location: dashboard.php?success=clase_editada');
            exit();
        } else {
            $error = "Error al actualizar la clase";
        }
    }
} else {
    $nom_clase = $clase['nom_clase'];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>✏️ Editar Clase - UET</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Lora:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Lora", serif;
            background-color: #570a0a;
            color: #000;
            margin: 0;
            padding: 20px;
        }

        .contenedor {
            max-width: 600px;
            margin: 0 auto;
            background-color: #f7ebdd;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .mensaje {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .mensaje.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .form-editar {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .form-editar input {
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }

        .btn-guardar {
            background-color: #28a745;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color .3s;
        }

        .btn-guardar:hover {
            background-color: #1e7e34;
        }

        .btn-cancelar {
            background-color: #dc3545;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color .3s;
            text-decoration: none;
            text-align: center;
        }

        .btn-cancelar:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <div class="contenedor">
        <h2>✏️ Editar Clase</h2>
        <?php if (isset($error)): ?>
            <div class="mensaje error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <form class="form-editar" method="POST" action="">
            <label for="nom_clase">Nombre de la Clase:</label>
            <input type="text" id="nom_clase" name="nom_clase" value="<?php echo htmlspecialchars($nom_clase); ?>" required>
            <button type="submit" class="btn-guardar">💾 Guardar Cambios</button>
            <a href="dashboard.php" class="btn-cancelar">↩️ Cancelar</a>
        </form>
    </div>
</body>

</html>