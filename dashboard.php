<?php
session_start();
include 'universal.php';

// si el usER se loguo
if (!isset($_SESSION['usuario_id']) || !isset($_SESSION['rol'])) {
    header('Location: logueo.php?error=no_autenticado');
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$rol = $_SESSION['rol'];
$nombre_usuario = $_SESSION['nombre'] ?? 'Usuario';

//tener clases segun rol
$clases = [];
if ($rol === 'administrador') {
    //admins ven todas las clases
    $query_clases = "SELECT c.*, i.nom, i.paterno, i.materno 
                     FROM clases c 
                     LEFT JOIN info i ON c.cuenta_iduser = i.cuenta_iduser 
                     ORDER BY c.nom_clase";
    $stmt = $con->prepare($query_clases);
    $stmt->execute();
    $clases = $stmt->fetchAll();
} elseif ($rol === 'profesor') {
    //profes pueden ver sus propias clases
    $query_clases = "SELECT c.*, i.nom, i.paterno, i.materno 
                     FROM clases c 
                     LEFT JOIN info i ON c.cuenta_iduser = i.cuenta_iduser 
                     WHERE c.cuenta_iduser = ? 
                     ORDER BY c.nom_clase";
    $stmt = $con->prepare($query_clases);
    $stmt->execute([$usuario_id]);
    $clases = $stmt->fetchAll();
} elseif ($rol === 'estudiante') {
    //estudiantesver las clases en las que están registrados
    $query_clases = "SELECT c.*, i.nom, i.paterno, i.materno 
                     FROM clases c 
                     INNER JOIN cuenta_has_clases chc ON c.idclases = chc.clases_idclases 
                     LEFT JOIN info i ON c.cuenta_iduser = i.cuenta_iduser 
                     WHERE chc.cuenta_iduser = ? 
                     ORDER BY c.nom_clase";
    $stmt = $con->prepare($query_clases);
    $stmt->execute([$usuario_id]);
    $clases = $stmt->fetchAll();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';

    if ($accion === 'crear_clase' && ($rol === 'profesor' || $rol === 'administrador')) {
        $nom_clase = trim($_POST['nom_clase'] ?? '');
        if (!empty($nom_clase)) {
            $codel = substr(md5(uniqid()), 0, 8);
            $query = "INSERT INTO clases (nom_clase, codel, cuenta_iduser) VALUES (?, ?, ?)";
            $stmt = $con->prepare($query);
            if ($stmt->execute([$nom_clase, $codel, $usuario_id])) {
                $mensaje = "Clase creada exitosamente";
                header('Location: dashboard.php?success=clase_creada');
                exit();
            } else {
                $error = "Error al crear la clase";
            }
        } else {
            $error = "El nombre de la clase no puede estar vacío";
        }
    }
    elseif ($accion === 'unirse_codigo' && $rol === 'estudiante') {
        $codigo = trim($_POST['codigo_clase'] ?? '');
        if (!empty($codigo)) {
            $sql = "SELECT idclases FROM clases WHERE codel = ?";
            $stmt = $con->prepare($sql);
            $stmt->execute([$codigo]);
            $fila = $stmt->fetch();
            if ($fila) {
                $cid = $fila['idclases'];
                $chk = "SELECT COUNT(*) as cnt FROM cuenta_has_clases WHERE cuenta_iduser = ? AND clases_idclases = ?";
                $stmt = $con->prepare($chk);
                $stmt->execute([$usuario_id, $cid]);
                $r = $stmt->fetch();
                if ($r['cnt'] == 0) {
                    $ins = "INSERT INTO cuenta_has_clases (cuenta_iduser, clases_idclases) VALUES (?, ?)";
                    $stmt = $con->prepare($ins);
                    if ($stmt->execute([$usuario_id, $cid])) {
                        $mensaje = '✅ Te has unido a la clase con éxito';
                    } else {
                        $error = 'Error al unirse a la clase';
                    }
                } else {
                    $error = 'Ya estás inscrito en esta clase';
                }
            } else {
                $error = 'Código de clase inválido';
            }
        } else {
            $error = 'Ingresa el código de la clase';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - UET</title>
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

        .btn-cerrar-sesion {
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

        .btn-cerrar-sesion:hover {
            background-color: #c82333;
        }

        .btn-gestion-usuarios {
            background-color: #6c757d;
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

        .btn-gestion-usuarios:hover {
            background-color: #5a6268;
        }

        .seccion-crear-clase {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 2px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .seccion-crear-clase h3 {
            color: #a02222;
            font-family: "Cinzel", serif;
            margin-bottom: 15px;
        }

        .form-crear-clase {
            display: flex;
            gap: 15px;
            align-items: end;
        }

        .form-crear-clase input {
            flex: 1;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-family: "Lora", serif;
            font-size: 16px;
        }

        .form-crear-clase input:focus {
            outline: none;
            border-color: #a02222;
        }

        .btn-crear {
            background-color: #a02222;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-crear:hover {
            background-color: #570a0a;
        }

        .clases-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .clase-card {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 2px 4px 8px rgba(0, 0, 0, 0.1);
            border-left: 5px solid #a02222;
            transition: transform 0.3s ease;
        }

        .clase-card:hover {
            transform: translateY(-5px);
        }

        .clase-header {
            margin-bottom: 15px;
        }

        .clase-nombre {
            font-size: 20px;
            font-weight: bold;
            color: #a02222;
            margin-bottom: 5px;
        }

        .clase-codigo {
            color: #666;
            font-size: 14px;
            font-family: monospace;
        }

        .clase-profesor {
            color: #888;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .clase-acciones {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn-accion {
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
        }

        .btn-ver-clase {
            background-color: #007bff;
            color: white;
        }

        .btn-ver-clase:hover {
            background-color: #0056b3;
        }

        .btn-tablon {
            background-color: #28a745;
            color: white;
        }

        .btn-tablon:hover {
            background-color: #1e7e34;
        }

        .btn-editar-clase {
            background-color: #ffc107;
            color: #000;
        }

        .btn-editar-clase:hover {
            background-color: #e0a800;
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

        .sin-clases {
            text-align: center;
            padding: 40px;
            color: #666;
            font-style: italic;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 2px 4px 8px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .header-dashboard {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }

            .form-crear-clase {
                flex-direction: column;
            }

            .clases-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="contenedor-principal">
        <div class="header-dashboard">
            <h1>🏫PRINCIPAL - UET</h1>
            <div class="info-usuario">
                <div class="nombre-usuario">👤 <?php echo htmlspecialchars($nombre_usuario); ?></div>
                <div class="rol-usuario">Rol: <?php echo htmlspecialchars($rol); ?></div>
                <a href="cerrar_sesion.php" class="btn-cerrar-sesion">🚪 Cerrar Sesión</a>
                <?php if ($rol === 'administrador'): ?>
                    <a href="usuarios.php" class="btn-gestion-usuarios">👥 Gestión de Usuarios</a>
                <?php endif; ?>
            </div>
        </div> 
        <?php if (isset($mensaje)): ?>
            <div class="mensaje exito"><?php echo htmlspecialchars($mensaje); ?></div>
        <?php endif; ?>
        <?php if (isset($error)): ?>
            <div class="mensaje error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <?php if ($rol === 'estudiante'): ?>
            <div class="seccion-crear-clase">
                <h3>🔑 Unirse a una Clase</h3>
                <form class="form-crear-clase" method="POST" action="">
                    <input type="hidden" name="accion" value="unirse_codigo">
                    <input type="text" name="codigo_clase" placeholder="Código de la clase" required>
                    <button type="submit" class="btn-crear">🎓 Unirse</button>
                </form>
            </div>
        <?php endif; ?>
        <?php if ($rol === 'profesor' || $rol === 'administrador'): ?>
            <div class="seccion-crear-clase">
                <h3>➕ Crear Nueva Clase</h3>
                <form class="form-crear-clase" method="POST" action="">
                    <input type="hidden" name="accion" value="crear_clase">
                    <input type="text" name="nom_clase" placeholder="Nombre de la clase" required>
                    <button type="submit" class="btn-crear">📚 Crear Clase</button>
                </form>
            </div>
        <?php endif; ?>

        <div class="clases-container">
            <?php if (empty($clases)): ?>
                <div class="sin-clases">
                    <h3>📭 No hay clases disponibles</h3>
                    <?php if ($rol === 'estudiante'): ?>
                        <p>No estás registrado en ninguna clase aún. Contacta a tu profesor para obtener el código de acceso.</p>
                    <?php elseif ($rol === 'profesor'): ?>
                        <p>No has creado ninguna clase aún. Usa el formulario de arriba para crear tu primera clase.</p>
                    <?php else: ?>
                        <p>No hay clases en el sistema.</p>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <?php foreach ($clases as $clase): ?>
                    <div class="clase-card">
                        <div class="clase-header">
                            <div class="clase-nombre">📚 <?php echo htmlspecialchars($clase['nom_clase']); ?></div>
                            <div class="clase-codigo">Código: <?php echo htmlspecialchars($clase['codel']); ?></div>
                            <?php if ($clase['nom']): ?>
                                <div class="clase-profesor">👨‍🏫 Profesor: <?php echo htmlspecialchars($clase['nom'] . ' ' . $clase['paterno'] . ' ' . $clase['materno']); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="clase-acciones">
                            <a href="clase.php?id=<?php echo $clase['idclases']; ?>" class="btn-accion btn-ver-clase">
                                👁️ Ver Clase
                            </a>
                            <a href="publicaciones.php?clase_id=<?php echo $clase['idclases']; ?>" class="btn-accion btn-tablon">
                                📋 Tablón
                            </a>
                            <?php if (($rol === 'profesor' && $clase['cuenta_iduser'] == $usuario_id) || $rol === 'administrador'): ?>
                                <a href="editar_clase.php?id=<?php echo $clase['idclases']; ?>" class="btn-accion btn-editar-clase">
                                    ✏️ Editar
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <script>
        setTimeout(function() {
            const messages = document.querySelectorAll('.mensaje');
            messages.forEach(function(message) {
                message.style.opacity = '0';
                setTimeout(function() {
                    message.remove();
                }, 500);
            });
        }, 5000);
    </script>
</body>

</html>