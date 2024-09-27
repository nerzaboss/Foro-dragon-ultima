<?php
$conexion = new mysqli('localhost', 'usuario', 'contraseña', 'base_de_datos');

$tema_id = $_POST['tema_id'];
$contenido = $_POST['contenido'];

// Insertar el comentario en la base de datos
$conexion->query("INSERT INTO comentarios (tema_id, contenido) VALUES ('$tema_id', '$contenido')");

// Redirigir de nuevo al tema
header("Location: tema.php?id=$tema_id");
?>
