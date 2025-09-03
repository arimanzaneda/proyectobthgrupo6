<?php
//uso del sistema
//cm integrar el sistema de publicaciones

session_start();
include 'universal.php';
include 'verificar_sesion.php';

function obtenerPublicacionesClase($clase_id, $conexion) {
    $query = "SELECT p.*, i.nom, i.paterno, i.materno 
              FROM publicaciones p 
              LEFT JOIN info i ON p.autor_id = i.cuenta_iduser 
              WHERE p.clases_idclases = ? AND p.activo = 1 
              ORDER BY p.f_crea DESC";
    $stmt = $conexion->prepare($query);
    $stmt->execute([$clase_id]);
    return $stmt->fetchAll();
}

//crear una nueva publicación
function crearPublicacion($contenido, $autor_id, $clase_id, $conexion) {
    $query = "INSERT INTO publicaciones (contenido, f_crea, autor_id, clases_idclases) 
              VALUES (?, NOW(), ?, ?)";
    $stmt = $conexion->prepare($query);
    return $stmt->execute([$contenido, $autor_id, $clase_id]);
}

// pa poder editar una publicación :3
function editarPublicacion($publicacion_id, $contenido, $conexion) {
    $query = "UPDATE publicaciones SET contenido = ?, f_edit = NOW() 
              WHERE idpublicaciones = ?";
    $stmt = $conexion->prepare($query);
    return $stmt->execute([$contenido, $publicacion_id]);
}

//eliminar una publicación
function eliminarPublicacion($publicacion_id, $conexion) {
    $query = "UPDATE publicaciones SET activo = 0 WHERE idpublicaciones = ?";
    $stmt = $conexion->prepare($query);
    return $stmt->execute([$publicacion_id]);
}

// Ejemplo de uso:
/*
// Obtener publicaciones de la clase 1
$publicaciones = obtenerPublicacionesClase(1, $con);

// Crear una nueva publicación
$resultado = crearPublicacion("Hola, esta es mi primera publicación", $_SESSION['usuario_id'], 1, $con);

// Editar una publicación existente
$resultado = editarPublicacion(1, "Contenido editado", $con);

// Eliminar una publicación
$resultado = eliminarPublicacion(1, $con);
*/
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejemplo de uso para lo de publicaciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .ejemplo {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .codigo {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 4px;
            border-left: 4px solid #007bff;
            font-family: monospace;
            white-space: pre-wrap;
        }
        h1, h2 {
            color: #333;
        }
    </style>
</head>
<body>
    <h1>📚 Ejemplo de Uso del Sistema de Publicaciones</h1>
    
    <div class="ejemplo">
        <h2>🔧 Funciones Disponibles</h2>
        <p>El sistema incluye las siguientes funciones para manejar publicaciones:</p>
        
        <h3>1. Obtener Publicaciones de una Clase</h3>
        <div class="codigo">$publicaciones = obtenerPublicacionesClase($clase_id, $conexion);</div>
        
        <h3>2. Crear Nueva Publicación</h3>
        <div class="codigo">$resultado = crearPublicacion($contenido, $autor_id, $clase_id, $conexion);</div>
        
        <h3>3. Editar Publicación Existente</h3>
        <div class="codigo">$resultado = editarPublicacion($publicacion_id, $contenido, $conexion);</div>
        
        <h3>4. Eliminar Publicación</h3>
        <div class="codigo">$resultado = eliminarPublicacion($publicacion_id, $conexion);</div>
    </div>
    
    <div class="ejemplo">
        <h2>🎯 Características Implementadas</h2>
        <ul>
            <li>✅ Sistema de publicaciones completo</li>
            <li>✅ Control de acceso por roles</li>
            <li>✅ Autenticación y sesiones</li>
            <li>✅ Interfaz responsive</li>
            <li>✅ Validación de formularios</li>
            <li>✅ Mensajes de error/éxito</li>
            <li>✅ Estilos consistentes con la marca</li>
        </ul>
    </div>
    
    <div class="ejemplo">
        <h2>🚀 Cómo Usar el Sistema</h2>
        <ol>
            <li><strong>Registro/Login</strong>: Los usuarios deben registrarse e iniciar sesión</li>
            <li><strong>Crear Clases</strong>: Los profesores pueden crear clases con códigos únicos</li>
            <li><strong>Unirse a Clases</strong>: Los estudiantes se unen usando el código de la clase</li>
            <li><strong>Publicar</strong>: Todos los usuarios pueden crear publicaciones en el tablón</li>
            <li><strong>Moderar</strong>: Los profesores pueden editar/eliminar cualquier publicación</li>
        </ol>
    </div>
    
    <div class="ejemplo">
        <h2>🔒 Restricciones de Seguridad</h2>
        <ul>
            <li>Los estudiantes no pueden crear clases</li>
            <li>Los estudiantes no pueden ver clases sin estar registrados</li>
            <li>Solo el autor puede editar sus publicaciones</li>
            <li>Solo los profesores pueden eliminar publicaciones</li>
            <li>Todas las páginas requieren autenticación</li>
        </ul>
    </div>
    
    <p><a href="dashboard.php">← Volver al Dashboard</a></p>
</body>
</html>
