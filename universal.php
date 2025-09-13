<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "bd_vicmac";
$port = "3306";

try {       // Manejo de excepciones
    $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";
    $con = new PDO($dsn, $user, $pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
