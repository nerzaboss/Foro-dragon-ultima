<?php
$conexion = new mysqli('localhost', 'usuario', 'contraseña', 'base_de_datos');

// Obtener el ID del tema desde la URL
$tema_id = $_GET['id'];

// Consulta para obtener los datos del tema
$tema = $conexion->query("SELECT * FROM temas WHERE id = $tema_id")->fetch_assoc();

// Mostrar el tema
echo "<h1>" . $tema['titulo'] . "</h1>";
echo "<p>" . $tema['contenido'] . "</p>";

// Formulario para agregar comentarios
?>
<h2>Comentarios</h2>
<form action="crear_comentario.php" method="POST">
    <input type="hidden" name="tema_id" value="<?php echo $tema_id; ?>">
    <textarea name="contenido" placeholder="Escribe tu comentario" required></textarea>
    <button type="submit">Publicar comentario</button>
</form>

<?php
// Mostrar los comentarios relacionados con el tema
$comentarios = $conexion->query("SELECT * FROM comentarios WHERE tema_id = $tema_id");

while ($comentario = $comentarios->fetch_assoc()) {
    echo "<p><strong>Comentario:</strong> " . $comentario['contenido'] . "</p>";
}
?>
