<?php

require_once "conexion.php";

// Recibir datos del formulario
$nombres = $_POST["nombres"];
$direction = $_POST["direction"];
$correo = $_POST["correo"];
$comentario = $_POST["comentario"];

// Preparar consulta
$sql = "INSERT INTO datos (nombres, direction, correo, comentario)
        VALUES (?, ?, ?, ?)";

$stmt = mysqli_prepare($conexion, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "ssss",
    $nombres,
    $direction,
    $correo,
    $comentario
);

// Ejecutar consulta
if (mysqli_stmt_execute($stmt)) {

    echo "<script>
        alert('Datos enviados correctamente');
        window.location.href='index.html';
    </script>";

} else {

    echo "<script>
        alert('Problemas al enviar los datos');
        window.location.href='index.html';
    </script>";

}

mysqli_stmt_close($stmt);
mysqli_close($conexion);

?>
