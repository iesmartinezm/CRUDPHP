<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    // Si no está autenticado, redirigir al login
    header("Location: /FrontEnd/FormularioLogin/FormularioLogin.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <link rel="stylesheet" href="CSSCrearProducto.css">
</head>
<body>
    <h1>Crear Producto</h1>
    <form action="/BackEnd/CrearProducto.php" method="POST">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="description">Descripción:</label>
        <textarea id="description" name="description" required></textarea><br>

        <label for="price">Precio (EUROS):</label>
        <input type="number" step="0.01" id="price" name="price" required><br>

        <label for="stock">Stock (Unidades):</label>
        <input type="number" id="stock" name="stock" required><br>

        <button type="submit">Crear Producto</button>
    </form>
    <a href="ListadoDeProductos.php" class="btn">Volver al Listado</a>
</body>
</html>