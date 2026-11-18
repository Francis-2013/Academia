<?php

$host = getenv("MYSQLHOST");
$port = getenv("MYSQLPORT");
$user = getenv("MYSQLUSER");
$password = getenv("MYSQLPASSWORD");
$database = getenv("MYSQLDATABASE");

// Verificar variables de entorno
if (!$host || !$port || !$user || !$database) {
    die("Error: Faltan configurar las variables de conexión a MySQL.");
}

// Conectar a MySQL
$conexion = mysqli_connect(
    $host,
    $user,
    $password,
    $database,
    (int)$port
);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

?>
