<?php
session_start();
include 'universal.php';

// acceso de admin
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'administrador') {
    header('Location: dashboard.php?error=acceso_denegado');
    exit();
}

$error = '';
$mensaje = '';

//elimina user
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $stmt = $con->prepare("DELETE FROM cuenta WHERE iduser = ?");
    try {
        if ($stmt->execute([$id])) {
            $mensaje = "Usuario eliminado correctamente.";
        } else {
            $error = "Error al eliminar usuario.";
        }
    } catch (PDOException $e) {
        $error = "Error al eliminar usuario: " . $e->getMessage();
    }
}

//crea o actualiza user
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';
    $iduser = trim($_POST['iduser'] ?? '');
    $contra = trim($_POST['contra'] ?? '');
    $rol = $_POST['rol'] ?? '';
    $bloqueado = isset($_POST['bloqueado']) ? 1 : 0;

    if ($accion === 'crear') {
        if ($iduser === '' || $contra === '' || !in_array($rol, ['estudiante', 'profesor', 'administrador'])) {
            $error = 'Datos inválidos para crear usuario.';
        } else {
            $stmt = $con->prepare("INSERT INTO cuenta (iduser, contra, rol, bloqueado) VALUES (?, ?, ?, ?)");
            try {
                if ($stmt->execute([$iduser, $contra, $rol, $bloqueado])) {
                    $mensaje = 'Usuario creado correctamente.';
                } else {
                    $error = 'Error al crear usuario.';
                }
            } catch (PDOException $e) {
                $error = 'Error al crear usuario: ' . $e->getMessage();
            }
        }
    } elseif ($accion === 'actualizar') {
        $orig_id = intval($_POST['orig_iduser'] ?? 0);
        if ($orig_id <= 0 || $contra === '' || !in_array($rol, ['estudiante', 'profesor', 'administrador'])) {
            $error = 'Datos inválidos para actualizar usuario.';
        } else {
            $stmt = $con->prepare("UPDATE cuenta SET contra = ?, rol = ?, bloqueado = ? WHERE iduser = ?");
            try {
                if ($stmt->execute([$contra, $rol, $bloqueado, $orig_id])) {
                    $mensaje = 'Usuario actualizado correctamente.';
                } else {
                    $error = 'Error al actualizar usuario.';
                }
            } catch (PDOException $e) {
                $error = 'Error al actualizar usuario: ' . $e->getMessage();
            }
        }
    }
}

//listado de users
$stmt = $con->query("SELECT iduser, rol, bloqueado FROM cuenta ORDER BY iduser");
$usuarios = $stmt->fetchAll();

//para editar datos
$edit_user = null;
if (isset($_GET['edit'])) {
    $eid = intval($_GET['edit']);
    $stmt = $con->prepare("SELECT iduser, contra, rol, bloqueado FROM cuenta WHERE iduser = ?");
    $stmt->execute([$eid]);
    $edit_user = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios - UET</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Lora:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: "Lora", serif;
            background-color: #570a0a;
            color: #000000;
            margin: 0;
            padding: 20px;
        }

        .contenedor-principal {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #f7ebdd;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.3);
        }

        .header-dashboard {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #a02222;
        }

        .header-dashboard h1 {
            color: #a02222;
            font-family: "Cinzel", serif;
            font-size: 36px;
            margin: 0;
        }

        .info-usuario {
            text-align: right;
        }

        .nombre-usuario {
            font-weight: bold;
            color: #a02222;
            font-size: 18px;
        }

        .rol-usuario {
            color: #666;
            font-size: 14px;
            text-transform: capitalize;
        }

        .btn-cerrar-sesion,
        .btn-gestion-usuarios {
            background-color: #dc3545;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            margin-top: 10px;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .btn-gestion-usuarios {
            background-color: #6c757d;
        }

        .btn-cerrar-sesion:hover {
            background-color: #c82333;
        }

        .btn-gestion-usuarios:hover {
            background-color: #5a6268;
        }

        .mensaje {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .mensaje.exito {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .mensaje.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background: #f0f0f0;
        }

        .btn-edit {
            background: #ffc107;
            color: #000;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
        }

        .btn-delete {
            background: #dc3545;
            color: #fff;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .header-dashboard {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }

            .info-usuario {
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="contenedor-principal">
        <div class="header-dashboard">
            <h1>👥 Gestión de Usuarios - UET</h1>
            <div class="info-usuario">
                <div class="nombre-usuario">👤 <?php echo htmlspecialchars($_SESSION['nombre'] ?? ''); ?></div>
                <div class="rol-usuario">Rol: <?php echo htmlspecialchars($_SESSION['rol'] ?? ''); ?></div>
                <a href="cerrar_sesion.php" class="btn-cerrar-sesion">🚪 Cerrar Sesión</a>
                <a href="dashboard.php" class="btn-gestion-usuarios">🏠 Dashboard</a>
            </div>
        </div>
        <?php if ($mensaje): ?>
            <div class="mensaje exito"><?php echo htmlspecialchars($mensaje); ?></div>
        <?php endif; ?>
        <?php if ($error): ?>
            <div class="mensaje error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <?php if ($edit_user): ?>
            <h2>Editar Usuario <?php echo htmlspecialchars($edit_user['iduser']); ?></h2>
            <form method="POST">
                <input type="hidden" name="accion" value="actualizar">
                <input type="hidden" name="orig_iduser" value="<?php echo htmlspecialchars($edit_user['iduser']); ?>">
                <label>ID:</label>
                <input type="text" value="<?php echo htmlspecialchars($edit_user['iduser']); ?>" disabled>
                <label>Contraseña:</label>
                <input type="password" name="contra" value="<?php echo htmlspecialchars($edit_user['contra']); ?>" required>
                <label>Rol:</label>
                <select name="rol" required>
                    <option value="estudiante" <?php if ($edit_user['rol'] === 'estudiante') echo 'selected'; ?>>Estudiante</option>
                    <option value="profesor" <?php if ($edit_user['rol'] === 'profesor') echo 'selected'; ?>>Profesor</option>
                    <option value="administrador" <?php if ($edit_user['rol'] === 'administrador') echo 'selected'; ?>>Administrador</option>
                </select>
                <label>Bloqueado:</label>
                <input type="checkbox" name="bloqueado" <?php if ($edit_user['bloqueado']) echo 'checked'; ?>>
                <button type="submit">Actualizar</button>
                <a href="usuarios.php">Cancelar</a>
            </form>
        <?php else: ?>
            <h2>Crear Nuevo Usuario</h2>
            <form method="POST">
                <input type="hidden" name="accion" value="crear">
                <label>ID:</label>
                <input type="text" name="iduser" required>
                <label>Contraseña:</label>
                <input type="password" name="contra" required>
                <label>Rol:</label>
                <select name="rol" required>
                    <option value="estudiante">Estudiante</option>
                    <option value="profesor">Profesor</option>
                    <option value="administrador">Administrador</option>
                </select>
                <label>Bloqueado:</label>
                <input type="checkbox" name="bloqueado">
                <button type="submit">Crear</button>
            </form>
        <?php endif; ?>

        <h2>Lista de Usuarios</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Rol</th>
                    <th>Bloqueado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $u): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($u['iduser']); ?></td>
                        <td><?php echo htmlspecialchars($u['rol']); ?></td>
                        <td><?php echo $u['bloqueado'] ? 'Sí' : 'No'; ?></td>
                        <td>
                            <a href="usuarios.php?edit=<?php echo $u['iduser']; ?>" class="btn btn-edit">Editar</a>
                            <a href="usuarios.php?delete=<?php echo $u['iduser']; ?>" class="btn btn-delete" onclick="return confirm('¿Eliminar usuario <?php echo $u['iduser']; ?>?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
        setTimeout(function() {
            const msgs = document.querySelectorAll('.mensaje');
            msgs.forEach(m => {
                m.style.opacity = '0';
                setTimeout(() => m.remove(), 500);
            });
        }, 5000);
    </script>
</body>

</html>