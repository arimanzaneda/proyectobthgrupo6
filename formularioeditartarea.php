<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        form {
            display: flex;
            flex-direction: column;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <form action="terminareditadotarea.php?id_tarea=<?php echo $_GET['id_tarea']?>" method="POST">
        <?php
            $conexion = mysqli_connect("localhost", "root", "", "bd_vicmac");
            $id_tarea = $_GET['id_tarea'];
            
            $consultaTarea = "SELECT * FROM tarea WHERE idtarea = $id_tarea ;";
            $resultadoTarea = mysqli_query($conexion, $consultaTarea);
            $filaTarea = mysqli_fetch_assoc($resultadoTarea);

        ?>
        <label for="titulo">Título de la tarea</label>
        <input type="text" id="titulo" name="titulo" value=" <?php echo $filaTarea['titulo'] ?> ">

        <label for="descripcion">Descripción</label>
        <textarea id="descripcion" name="descripcion"><?php echo $filaTarea['desc']?></textarea>
        <label for="tema">Tema</label>
        <input type="text" id="titulo" name="tema" value="<?php echo $filaTarea['tema'] ?>">

        <label for="puntos">Puntos</label>
        <input type="number" id="puntos" name="puntos" value="<?php echo $filaTarea['nota'] ?>">

        <button type="submit">Guardar cambios</button>
    </form>
</body>
</html>