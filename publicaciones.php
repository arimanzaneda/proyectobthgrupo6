<?php
session_start();
include 'universal.php';

//si el usuario está logueado
if (!isset($_SESSION['usuario_id']) || !isset($_SESSION['rol'])) {
    header('Location: logueo.php');
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$rol = $_SESSION['rol'];
$clase_id = isset($_GET['clase_id']) ? (int)$_GET['clase_id'] : 0;

//usuario tenga acceso a esta clase
if ($clase_id > 0) {
    if ($rol === 'administrador') {
        //admin puede ver cualquier tablón
    } elseif ($rol === 'profesor') {
        //profesor sea dueño de clase
        $verificar_profesor = "SELECT COUNT(*) as es_profesor FROM clases WHERE idclases = ? AND cuenta_iduser = ?";
        $stmt = $con->prepare($verificar_profesor);
        $stmt->execute([$clase_id, $usuario_id]);
        $es_profesor = $stmt->fetch();
        if ($es_profesor['es_profesor'] == 0) {
            header('Location: dashboard.php?error=sin_acceso');
            exit();
        }
    } else {
        //verificar matrícula en la clase del estud
        $verificar_acceso = "SELECT COUNT(*) as acceso FROM cuenta_has_clases 
                        WHERE cuenta_iduser = ? AND clases_idclases = ?";
        $stmt = $con->prepare($verificar_acceso);
        $stmt->execute([$usuario_id, $clase_id]);
        $resultado = $stmt->fetch();
        if ($resultado['acceso'] == 0) {
            header('Location: dashboard.php?error=sin_acceso');
            exit();
        }
    }
}

//info clase
$info_clase = null;
if ($clase_id > 0) {
    $query_clase = "SELECT c.nom_clase, c.codel, i.nom, i.paterno, i.materno 
                    FROM clases c 
                    LEFT JOIN info i ON c.cuenta_iduser = i.cuenta_iduser 
                    WHERE c.idclases = ?";
    $stmt = $con->prepare($query_clase);
    $stmt->execute([$clase_id]);
    $info_clase = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';

    switch ($accion) {
        case 'crear':
            if ($clase_id > 0) {
                $contenido = trim($_POST['contenido']);
                if (!empty($contenido)) {
                    $query = "INSERT INTO publicaciones (contenido, f_crea, autor_id, clases_idclases) 
                              VALUES (?, NOW(), ?, ?)";
                    $stmt = $con->prepare($query);
                    if ($stmt->execute([$contenido, $usuario_id, $clase_id])) {
                        $mensaje = "Publicación creada exitosamente";
                    } else {
                        $error = "Error al crear la publicación";
                    }
                } else {
                    $error = "El contenido no puede estar vacío";
                }
            }
            break;

        case 'editar':
            $publicacion_id = (int)$_POST['publicacion_id'];
            $contenido = trim($_POST['contenido']);

            //ver que el usuario sea el autor o profesor/administrador
            $verificar_autor = "SELECT autor_id FROM publicaciones WHERE idpublicaciones = ?";
            $stmt = $con->prepare($verificar_autor);
            $stmt->execute([$publicacion_id]);
            $autor = $stmt->fetch();

            if ($autor && ($autor['autor_id'] == $usuario_id || $rol === 'profesor' || $rol === 'administrador')) {
                if (!empty($contenido)) {
                    $query = "UPDATE publicaciones SET contenido = ?, f_edit = NOW() 
                              WHERE idpublicaciones = ?";
                    $stmt = $con->prepare($query);
                    if ($stmt->execute([$contenido, $publicacion_id])) {
                        $mensaje = "Publicación editada exitosamente";
                    } else {
                        $error = "Error al editar la publicación";
                    }
                } else {
                    $error = "El contenido no puede estar vacío";
                }
            } else {
                $error = "No tienes permisos para editar esta publicación";
            }
            break;

        case 'eliminar':
            $publicacion_id = (int)$_POST['publicacion_id'];

            //SOLAMENTE profes y adminis pueden eliminar
            if ($rol === 'profesor' || $rol === 'administrador') {
                $query = "UPDATE publicaciones SET activo = 0 WHERE idpublicaciones = ?";
                $stmt = $con->prepare($query);
                if ($stmt->execute([$publicacion_id])) {
                    $mensaje = "Publicación eliminada exitosamente";
                } else {
                    $error = "Error al eliminar la publicación";
                }
            } else {
                $error = "No tienes permisos para eliminar publicaciones";
            }
            break;
    }
}

$publicaciones = [];
if ($clase_id > 0) {
    $query_publicaciones = "SELECT p.*, i.nom, i.paterno, i.materno 
                           FROM publicaciones p 
                           LEFT JOIN info i ON p.autor_id = i.cuenta_iduser 
                           WHERE p.clases_idclases = ? AND p.activo = 1 
                           ORDER BY p.f_crea DESC";
    $stmt = $con->prepare($query_publicaciones);
    $stmt->execute([$clase_id]);
    $publicaciones = $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablón de Publicaciones - <?php echo htmlspecialchars($info_clase['nom_clase'] ?? 'Clase'); ?></title>
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

        .header-tablon {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #a02222;
        }

        .header-tablon h1 {
            color: #a02222;
            font-family: "Cinzel", serif;
            font-size: 36px;
            margin-bottom: 10px;
        }

        .header-tablon .info-clase {
            color: #666;
            font-size: 18px;
            font-style: italic;
        }

        .navegacion {
            margin-bottom: 20px;
        }

        .btn-navegacion {
            background-color: #570a0a;
            color: #f7ebdd;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            margin-right: 10px;
            transition: background-color 0.3s;
        }

        .btn-navegacion:hover {
            background-color: #a02222;
        }

        .formulario-publicacion {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 2px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .formulario-publicacion h3 {
            color: #a02222;
            font-family: "Cinzel", serif;
            margin-bottom: 15px;
        }

        .formulario-publicacion textarea {
            width: 100%;
            min-height: 100px;
            padding: 15px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-family: "Lora", serif;
            font-size: 16px;
            resize: vertical;
            box-sizing: border-box;
        }

        .formulario-publicacion textarea:focus {
            outline: none;
            border-color: #a02222;
        }

        .btn-publicar {
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

        .btn-publicar:hover {
            background-color: #570a0a;
        }

        .publicaciones-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .publicacion {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 2px 4px 8px rgba(0, 0, 0, 0.1);
            border-left: 5px solid #a02222;
        }

        .publicacion-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .autor-info {
            display: flex;
            flex-direction: column;
        }

        .autor-nombre {
            font-weight: bold;
            color: #a02222;
            font-size: 18px;
        }

        .fecha-publicacion {
            color: #666;
            font-size: 14px;
        }

        .fecha-edicion {
            color: #888;
            font-size: 12px;
            font-style: italic;
        }

        .acciones-publicacion {
            display: flex;
            gap: 10px;
        }

        .btn-accion {
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 12px;
            font-weight: bold;
            transition: all 0.3s;
        }

        .btn-editar {
            background-color: #ffc107;
            color: #000;
        }

        .btn-editar:hover {
            background-color: #e0a800;
        }

        .btn-eliminar {
            background-color: #dc3545;
            color: white;
        }

        .btn-eliminar:hover {
            background-color: #c82333;
        }

        .contenido-publicacion {
            font-size: 16px;
            line-height: 1.6;
            color: #333;
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

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-contenido {
            background-color: #f7ebdd;
            margin: 5% auto;
            padding: 30px;
            border-radius: 15px;
            width: 80%;
            max-width: 600px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.3);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #a02222;
        }

        .modal-header h3 {
            color: #a02222;
            font-family: "Cinzel", serif;
            margin: 0;
        }

        .cerrar-modal {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #a02222;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }

        .btn-cancelar {
            background-color: #6c757d;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .btn-guardar {
            background-color: #a02222;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .contenedor-principal {
                padding: 15px;
            }

            .publicacion-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .acciones-publicacion {
                align-self: flex-end;
            }
        }
    </style>
</head>

<body>
    <div class="contenedor-principal">
        <div class="header-tablon">
            <h1>📋 Tablón de Publicaciones</h1>
            <?php if ($info_clase): ?>
                <div class="info-clase">
                    Clase: <strong><?php echo htmlspecialchars($info_clase['nom_clase']); ?></strong>
                    <?php if ($info_clase['nom']): ?>
                        | Profesor: <?php echo htmlspecialchars($info_clase['nom'] . ' ' . $info_clase['paterno'] . ' ' . $info_clase['materno']); ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="navegacion">
            <a href="dashboard.php" class="btn-navegacion">← Volver al Dashboard</a>
            <?php if ($clase_id > 0): ?>
                <a href="clase.php?id=<?php echo $clase_id; ?>" class="btn-navegacion">Ver Clase</a>
            <?php endif; ?>
        </div>

        <?php if (isset($mensaje)): ?>
            <div class="mensaje exito"><?php echo htmlspecialchars($mensaje); ?></div>
        <?php endif; ?>

        <?php if (isset($error)): ?>
            <div class="mensaje error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <?php if ($clase_id > 0): ?>
            <div class="formulario-publicacion">
                <h3>✍️ Nueva Publicación</h3>
                <form method="POST" action="">
                    <input type="hidden" name="accion" value="crear">
                    <textarea name="contenido" placeholder="Escribe tu publicación aquí..." required></textarea>
                    <br><br>
                    <button type="submit" class="btn-publicar">📝 Publicar</button>
                </form>
            </div>
        <?php endif; ?>

        <div class="publicaciones-container">
            <?php if (empty($publicaciones)): ?>
                <div class="publicacion">
                    <div class="contenido-publicacion" style="text-align: center; color: #666; font-style: italic;">
                        📭 No hay publicaciones en este tablón aún. ¡Sé el primero en publicar algo!
                    </div>
                </div>
            <?php else: ?>
                <?php foreach ($publicaciones as $publicacion): ?>
                    <div class="publicacion" id="publicacion-<?php echo $publicacion['idpublicaciones']; ?>">
                        <div class="publicacion-header">
                            <div class="autor-info">
                                <div class="autor-nombre">
                                    👤 <?php echo htmlspecialchars($publicacion['nom'] . ' ' . $publicacion['paterno'] . ' ' . $publicacion['materno']); ?>
                                </div>
                                <div class="fecha-publicacion">
                                    📅 Publicado: <?php echo date('d/m/Y H:i', strtotime($publicacion['f_crea'])); ?>
                                </div>
                                <?php if ($publicacion['f_edit']): ?>
                                    <div class="fecha-edicion">
                                        ✏️ Editado: <?php echo date('d/m/Y H:i', strtotime($publicacion['f_edit'])); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="acciones-publicacion">
                                <?php if ($publicacion['autor_id'] == $usuario_id): ?>
                                    <button class="btn-accion btn-editar" onclick="editarPublicacion(<?php echo $publicacion['idpublicaciones']; ?>, '<?php echo htmlspecialchars($publicacion['contenido'], ENT_QUOTES); ?>')">
                                        ✏️ Editar
                                    </button>
                                <?php endif; ?>
                                <?php if ($rol === 'profesor' || $rol === 'administrador'): ?>
                                    <button class="btn-accion btn-eliminar" onclick="eliminarPublicacion(<?php echo $publicacion['idpublicaciones']; ?>)">
                                        🗑️ Eliminar
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="contenido-publicacion">
                            <?php echo nl2br(htmlspecialchars($publicacion['contenido'])); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <div id="modalEditar" class="modal">
        <div class="modal-contenido">
            <div class="modal-header">
                <h3>✏️ Editar Publicación</h3>
                <button class="cerrar-modal" onclick="cerrarModal()">&times;</button>
            </div>
            <form id="formEditar" method="POST" action="">
                <input type="hidden" name="accion" value="editar">
                <input type="hidden" name="publicacion_id" id="publicacion_id_editar">
                <textarea name="contenido" id="contenido_editar" required></textarea>
                <div class="modal-footer">
                    <button type="button" class="btn-cancelar" onclick="cerrarModal()">Cancelar</button>
                    <button type="submit" class="btn-guardar">💾 Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modalEliminar" class="modal">
        <div class="modal-contenido">
            <div class="modal-header">
                <h3>🗑️ Confirmar Eliminación</h3>
                <button class="cerrar-modal" onclick="cerrarModal()">&times;</button>
            </div>
            <p>¿Estás seguro de que deseas eliminar esta publicación? Esta acción no se puede deshacer.</p>
            <form id="formEliminar" method="POST" action="">
                <input type="hidden" name="accion" value="eliminar">
                <input type="hidden" name="publicacion_id" id="publicacion_id_eliminar">
                <div class="modal-footer">
                    <button type="button" class="btn-cancelar" onclick="cerrarModal()">Cancelar</button>
                    <button type="submit" class="btn-eliminar">🗑️ Eliminar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function editarPublicacion(id, contenido) {
            document.getElementById('publicacion_id_editar').value = id;
            document.getElementById('contenido_editar').value = contenido;
            document.getElementById('modalEditar').style.display = 'block';
        }

        function eliminarPublicacion(id) {
            document.getElementById('publicacion_id_eliminar').value = id;
            document.getElementById('modalEliminar').style.display = 'block';
        }

        function cerrarModal() {
            document.getElementById('modalEditar').style.display = 'none';
            document.getElementById('modalEliminar').style.display = 'none';
        }

        window.onclick = function(event) {
            const modalEditar = document.getElementById('modalEditar');
            const modalEliminar = document.getElementById('modalEliminar');
            if (event.target === modalEditar) {
                modalEditar.style.display = 'none';
            }
            if (event.target === modalEliminar) {
                modalEliminar.style.display = 'none';
            }
        }

        document.querySelectorAll('textarea').forEach(textarea => {
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = this.scrollHeight + 'px';
            });
        });
    </script>
</body>

</html>