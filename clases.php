<?php
require "universal.php";
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clases</title>
    <style>
        body {
            font-family: Georgia, serif;
            background: #f6eaea;
        }
        h1 {
            color: #5b0000;
            text-align: center;
            margin-top: 40px;
        }
        table {
            margin: 40px auto;
            border-collapse: collapse;
            width: 80%;
            background: #fff;
            box-shadow: 0 2px 10px #0001;
        }
        th, td {
            border: 1px solid #800000;
            padding: 12px 20px;
            text-align: center;
        }
        th {
            background: #5e0d0d;
            color: white;
            font-size: 18px;
        }
        td {
            font-size: 16px;
        }
        a {
            color: #5e0d0d;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        .nuevo {
            display: block;
            width: 180px;
            margin: 20px auto;
            padding: 12px;
            background: #5e0d0d;
            color: white;
            text-align: center;
            border-radius: 8px;
            font-size: 18px;
            text-decoration: none;
        }
        .nuevo:hover {
            background: #7a1a1a;
        }
    </style>
</head>
<body>
    <h1>Listado de Clases</h1>
    <a class="nuevo" href="form.crearclase.html">Crear nueva clase</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Materia</th>
            <th>Aula</th>
            <th>Código</th>
            <th>Acciones</th>
        </tr>
        <?php
       $resultado = $con->query("SELECT * FROM clases");
        while ($fila = $resultado->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row["idclases"]."</td>";
    echo "<td>".$row["nom_clase"]."</td>";
    echo "<td>".$row["codel"]."</td>"; 
    echo "<td><a href='tablondemateria.php?id=".$row["idclases"]."'>Ver clase</a></td>";
    echo "</tr>";
}
?>
    </table>
</body>
</html>