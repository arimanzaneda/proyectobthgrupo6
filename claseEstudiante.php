<?php
session_start();
include 'universal.php';

// Variable SESSION
$_SESSION['clase_id'] = $_GET['id'];


//ver si el user esta logueado
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

//ver si tiene acceso a clase
$verificar_acceso = "SELECT COUNT(*) as acceso FROM cuenta_has_clases 
                    WHERE cuenta_iduser = ? AND clases_idclases = ?";
$stmt = $con->prepare($verificar_acceso);
$stmt->execute([$usuario_id, $clase_id]);
$resultado = $stmt->fetch();

//si no hay aceso directo ver si es profe de la clase o admin
if ($resultado['acceso'] == 0) {
    $verificar_profesor = "SELECT COUNT(*) as es_profesor FROM clases 
                          WHERE idclases = ? AND cuenta_iduser = ?";
    $stmt = $con->prepare($verificar_profesor);
    $stmt->execute([$clase_id, $usuario_id]);
    $es_profesor = $stmt->fetch();
    
    if ($es_profesor['es_profesor'] == 0 && $rol !== 'administrador') {
        header('Location: dashboard.php?error=sin_acceso');
        exit();
    }
}

//ver información d la clase
$query_clase = "SELECT c.*, i.nom, i.paterno, i.materno 
                FROM clases c 
                LEFT JOIN info i ON c.cuenta_iduser = i.cuenta_iduser 
                WHERE c.idclases = ?";
$stmt = $con->prepare($query_clase);
$stmt->execute([$clase_id]);
$clase = $stmt->fetch();

if (!$clase) {
    header('Location: dashboard.php?error=clase_no_encontrada');
    exit();
}

//obtener tareas de la clase
$query_tareas = "SELECT t.*, COUNT(e.cuenta_iduser) as entregas 
                 FROM tarea t 
                 LEFT JOIN entrega e ON t.idtarea = e.tarea_idtarea 
                 WHERE t.clases_idclases = ? 
                 GROUP BY t.idtarea 
                 ORDER BY t.idtarea DESC";
$stmt = $con->prepare($query_tareas);
$stmt->execute([$clase_id]);
$tareas = $stmt->fetchAll();

//ver estudiantes ya logueado
$query_estudiantes = "SELECT i.*, c.iduser 
                      FROM cuenta_has_clases chc 
                      INNER JOIN info i ON chc.cuenta_iduser = i.cuenta_iduser 
                      INNER JOIN cuenta c ON chc.cuenta_iduser = c.iduser 
                      WHERE chc.clases_idclases = ? AND c.rol = 'estudiante' 
                      ORDER BY i.paterno, i.materno, i.nom";
$stmt = $con->prepare($query_estudiantes);
$stmt->execute([$clase_id]);
$estudiantes = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';
    
    if ($accion === 'unirse_clase') {
        $codigo = trim($_POST['codigo'] ?? '');
        if ($codigo === $clase['codel']) {
            //si ya está registrado.......
            $verificar_registro = "SELECT COUNT(*) as ya_registrado FROM cuenta_has_clases 
                                  WHERE cuenta_iduser = ? AND clases_idclases = ?";
            $stmt = $con->prepare($verificar_registro);
            $stmt->execute([$usuario_id, $clase_id]);
            $ya_registrado = $stmt->fetch();
            
            if ($ya_registrado['ya_registrado'] == 0) {
                $query_unirse = "INSERT INTO cuenta_has_clases (cuenta_iduser, clases_idclases) VALUES (?, ?)";
                $stmt = $con->prepare($query_unirse);
                if ($stmt->execute([$usuario_id, $clase_id])) {
                    $mensaje = "Te has unido a la clase exitosamente";
                    header('Location: clase.php?id=' . $clase_id . '&success=unido');
                    exit();
                } else {
                    $error = "Error al unirse a la clase";
                }
            } else {
                $error = "Ya estás registrado en esta clase";
            }
        } else {
            $error = "Código de clase incorrecto";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($clase['nom_clase']); ?> - UET</title>
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
        
        .header-clase {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #a02222;
        }
        
        .header-clase h1 {
            color: #a02222;
            font-family: "Cinzel", serif;
            font-size: 36px;
            margin-bottom: 10px;
        }
        
        .info-clase {
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
        
        .seccion-unirse {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 2px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        
        .seccion-unirse h3 {
            color: #a02222;
            font-family: "Cinzel", serif;
            margin-bottom: 15px;
        }
        
        .form-unirse {
            display: flex;
            gap: 15px;
            justify-content: center;
            align-items: end;
        }
        
        .form-unirse input {
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-family: "Lora", serif;
            font-size: 16px;
            width: 200px;
        }
        
        .form-unirse input:focus {
            outline: none;
            border-color: #a02222;
        }
        
        .btn-unirse {
            background-color: #28a745;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .btn-unirse:hover {
            background-color: #1e7e34;
        }
        
        .secciones-clase {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }
        
        .seccion {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 2px 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .seccion h3 {
            color: #a02222;
            font-family: "Cinzel", serif;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #a02222;
        }
        
        .tarea-item {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            border-left: 4px solid #a02222;
        }
        
        .tarea-titulo {
            font-weight: bold;
            color: #a02222;
            margin-bottom: 5px;
        }
        
        .tarea-descripcion {
            color: #666;
            margin-bottom: 10px;
        }
        
        .tarea-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            color: #888;
        }
        
        .estudiante-item {
            background-color: #f8f9fa;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .estudiante-nombre {
            font-weight: bold;
            color: #333;
        }
        
        .estudiante-ci {
            color: #666;
            font-size: 14px;
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
        
        .sin-contenido {
            text-align: center;
            color: #666;
            font-style: italic;
            padding: 20px;
        }
        
        @media (max-width: 768px) {
            .secciones-clase {
                grid-template-columns: 1fr;
            }
            
            .form-unirse {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <div class="contenedor-principal">
        <div class="header-clase">
            <h1>📚 <?php echo htmlspecialchars($clase['nom_clase']); ?></h1>
            <div class="info-clase">
                Código: <strong><?php echo htmlspecialchars($clase['codel']); ?></strong>
                <?php if ($clase['nom']): ?>
                    | Profesor: <?php echo htmlspecialchars($clase['nom'] . ' ' . $clase['paterno'] . ' ' . $clase['materno']); ?>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="navegacion">
            <a href="dashboard.php" class="btn-navegacion">← Volver al Dashboard</a>
            <a href="publicaciones.php?clase_id=<?php echo $clase_id; ?>" class="btn-navegacion">📋 Ver Tablón</a>
            
        </div>
        
        <?php if (isset($mensaje)): ?>
            <div class="mensaje exito"><?php echo htmlspecialchars($mensaje); ?></div>
        <?php endif; ?>
        
        <?php if (isset($error)): ?>
            <div class="mensaje error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        
        <?php if (isset($_GET['success']) && $_GET['success'] === 'unido'): ?>
            <div class="mensaje exito">✅ Te has unido a la clase exitosamente</div>
        <?php endif; ?>
        
        <?php if ($rol === 'estudiante'): ?>
            <?php
            //si el estud ya está en la clase
            $verificar_estudiante = "SELECT COUNT(*) as en_clase FROM cuenta_has_clases 
                                    WHERE cuenta_iduser = ? AND clases_idclases = ?";
            $stmt = $con->prepare($verificar_estudiante);
            $stmt->execute([$usuario_id, $clase_id]);
            $en_clase = $stmt->fetch();
            ?>
            
            <?php if ($en_clase['en_clase'] == 0): ?>
                <div class="seccion-unirse">
                    <h3>🔑 Unirse a la Clase</h3>
                    <p>Ingresa el código de la clase para unirte:</p>
                    <form class="form-unirse" method="POST" action="">
                        <input type="hidden" name="accion" value="unirse_clase">
                        <input type="text" name="codigo" placeholder="Código de la clase" required>
                        <button type="submit" class="btn-unirse">🎓 Unirse</button>
                    </form>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        
        <div class="secciones-clase">
            <div class="seccion">
                <h3>📝 Tareas</h3>
                <?php if (empty($tareas)): ?>
                    <div class="sin-contenido">
                        📭 No hay tareas en esta clase
                    </div>
                <?php else: ?>
                    <?php foreach ($tareas as $tarea): ?>
                        <div class="tarea-item">
                            <div class="tarea-titulo"><?php echo htmlspecialchars($tarea['titulo']); ?></div>
                            <div class="tarea-descripcion"><?php echo htmlspecialchars($tarea['desc']); ?></div>
                            <div class="tarea-info">
                                <span>Tema: <?php echo htmlspecialchars($tarea['tema']); ?></span>
                                <span>Entregas: <?php echo $tarea['entregas']; ?></span>
                                <?php
                                    $conexion = mysqli_connect("localhost", "root", "", "bd_vicmac");
                                    $verificar_entrega = "SELECT * FROM entrega WHERE tarea_idtarea =" .$tarea['idtarea']." AND cuenta_iduser = ".$_SESSION['usuario_id'].";";
                                    $resultado_verificar = mysqli_query($conexion, $verificar_entrega);
                                    if(mysqli_num_rows($resultado_verificar) > 0){
                                        echo "<a href='editarEntregaEstudiante.php?idTarea=".$tarea['idtarea']."'>Modificar Tarea</a>";
                                    }else{
                                        echo "<a href='subirEntrega.php?idTarea=".$tarea['idtarea']."'>Entregar tarea</a>";
                                    }
                                ?>
                                
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            
            <div class="seccion">
                <h3>👥 Estudiantes (<?php echo count($estudiantes); ?>)</h3>
                <?php if (empty($estudiantes)): ?>
                    <div class="sin-contenido">
                        📭 No hay estudiantes registrados
                    </div>
                <?php else: ?>
                    <?php foreach ($estudiantes as $estudiante): ?>
                        <div class="estudiante-item">
                            <div>
                                <div class="estudiante-nombre">
                                    <?php echo htmlspecialchars($estudiante['nom'] . ' ' . $estudiante['paterno'] . ' ' . $estudiante['materno']); ?>
                                </div>
                                <div class="estudiante-ci">CI: <?php echo htmlspecialchars($estudiante['ci']); ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
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
