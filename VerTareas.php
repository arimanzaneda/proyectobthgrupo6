<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gestión de Tareas</title>
<style>
    body {
        font-family: "Lora", serif;
        background: #570a0a;
        margin: 0;
        padding: 20px;
    }
    .card {
        background: #f7ebdd;
        border-radius: 12px;
        padding: 20px;
        max-width: 650px;
        margin: auto;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    h1 {
        font-size: 1.5rem;
        margin-bottom: 10px;
        text-align: center;
        color: #3b1515;
    }
    .tabs {
        display: flex;
        justify-content: center;
        margin-bottom: 15px;
    }
    .tab {
        padding: 10px 20px;
        background: #a59797;
        border-radius: 8px;
        margin: 0 5px;
        cursor: pointer;
        font-weight: bold;
        color: #570a0a;
    }
    .tab.active {
        background: #570a0a;
        color: #f7ebdd;
    }
    .top-bar {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        font-size: 0.9rem;
        color: #800000;
    }
    .switch input {
        width: 20px;
        height: 20px;
        cursor: pointer;
    }
    .student-list {
        margin-top: 10px;
        border-top: 1px solid #f7ebdd;
        padding-top: 10px;
        color: #800000;
    }
    .student-item {
        display: flex;
        justify-content: space-between;
        padding: 8px 0;
        border-bottom: 1px solid #f7ebdd;
    }
    h3 {
        color: #b30000;
        margin-top: 15px;
    }
    .thumbnails {
        display: flex;
        gap: 15px;
        margin-top: 15px;
        flex-wrap: wrap;
        justify-content: center;
    }
    .file-card {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .thumb-btn {
        background: #570a0a;
        color: #f7ebdd;
        border: none;
        border-radius: 8px;
        padding: 15px;
        width: 100px;
        height: 100px;
        cursor: pointer;
        font-weight: bold;
        transition: background 0.3s;
    }
    .thumb-btn:hover {
        background: #800000;
    }
    .student-name {
        margin-top: 8px;
        font-size: 0.9rem;
        color: #800000;
        font-weight: bold;
        text-align: center;
    }
</style>
</head>
<body>
<div class="card">
    <h1>Ver Tareas Entregadas</h1>

    <div class="tabs">
        <div class="tab active" onclick="switchTab(this)">Instrucciones</div>
        <div class="tab" onclick="switchTab(this)">Trabajo de los alumnos</div>
    </div>

    <div class="top-bar">
        <div>Puntos: <strong>100</strong></div>
        <div class="switch">
            <label>Aceptar entregas</label>
            <input type="checkbox" checked>
        </div>
    </div>

    <p><strong>Examen Sesiones:</strong> 34 Entregadas | 3 Asignadas | 1 Evaluada</p>

    <div class="student-list">
        <div class="student-item"><span>MANZANEDA NUÑEZ VALENTINA</span><span>100/100</span></div>
        <div class="student-item"><span>POZO RIVERA MARIANA HELEN</span><span>100/100</span></div>
        <div class="student-item"><span>QUIROGA SAAVEDRA CRISTIANY JHOELMA</span><span>100/100</span></div>
    </div>

    <h3>Archivos</h3>
    <div class="thumbnails">
        <div class="file-card">
            <button class="thumb-btn" onclick="openFile('Archivo 1')">Archivo 1</button>
            <div class="student-name">NOMBRE</div>
        </div>
        <div class="file-card">
            <button class="thumb-btn" onclick="openFile('Archivo 2')">Archivo 2</button>
            <div class="student-name">NOMBRE</div>
        </div>
        <div class="file-card">
            <button class="thumb-btn" onclick="openFile('Archivo 3')">Archivo 3</button>
            <div class="student-name">NOMBRE</div>
        </div>
        <div class="file-card">
            <button class="thumb-btn" onclick="openFile('Archivo 4')">Archivo 4</button>
            <div class="student-name">NOMBRE</div>
        </div>
    </div>
</div>

<script>
function openFile(name) {
    alert("Abriendo " + name);
}
function switchTab(tab) {
    document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
    tab.classList.add('active');
}
</script>
</body>
</html>