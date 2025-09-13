<?php 
    session_start();
    include 'universal.php';
    // echo $_GET['id_clase'];

    // echo $_POST['titulo'];
    // echo $_POST['instrucciones'];
    $conexion = mysqli_connect("localhost", "root", "", "bd_vicmac");


    $consultaSql = "INSERT INTO tarea (titulo, `desc`, tema, nota, clases_idclases) VALUES ('" . $_POST['titulo'] . "', '" . $_POST['instrucciones'] . "', '" . $_POST['tema'] . "', " . $_POST['puntos'] . ", " . $_GET['id_clase'] . ");";
    
    $resultado = mysqli_query($conexion, $consultaSql);
    if($resultado){
        header("Location: clase.php?id=".$_GET['id_clase']);
    }else{
        echo mysqli_error($conn);
    }
    echo $consultaSql;
?>