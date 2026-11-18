<?php

require_once "conexion.php";

$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$asunto = $_POST["asunto"];
$mensaje = $_POST["mensaje"];

$sql = "INSERT INTO contactos
(nombre, correo, telefono, asunto, mensaje)
VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conexion, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "sssss",
    $nombre,
    $correo,
    $telefono,
    $asunto,
    $mensaje
);

if (mysqli_stmt_execute($stmt)) {

    echo "<script>
        alert('Mensaje enviado correctamente');
        window.location.href='contacto.html';
    </script>";

} else {

    echo "Error al enviar el mensaje: " . mysqli_error($conexion);

}

mysqli_stmt_close($stmt);
mysqli_close($conexion);

?>
