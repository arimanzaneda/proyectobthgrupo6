<?php
include('db.php');
session_start();
$nombre=$_SESSION['nombre'];
$contenido=$_POST['contenido'];
$idclase=$_POST['idclase'];

$fecha=date("D/M/Y");
$sql="INSERT INTO publicaciones(contenido,f_crea,nombre,clases_idclases) VALUES ('$contenido','$fecha','$nombre', '$idclase')";
$if($conn->query($sql)==TRUE); {
    echo "publicacion registrada";
    header("location:tablondemateria.php?id=$idclase");
}
?>