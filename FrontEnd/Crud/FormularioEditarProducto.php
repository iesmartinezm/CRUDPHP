<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    // Si no está autenticado, redirigir al login
    header("Location: /CRUDPHP/FrontEnd/FormularioLogin/FormularioLogin.html");
    exit();
}

// Obtén los valores de los parámetros de la URL
$id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
$name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : '';
$description = isset($_GET['description']) ? htmlspecialchars($_GET['description']) : '';
$price = isset($_GET['price']) ? htmlspecialchars($_GET['price']) : '';
$stock = isset($_GET['stock']) ? htmlspecialchars($_GET['stock']) : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="/CRUDPHP/FrontEnd/Crud/CSSCrearProducto.css">
</head>
<body>
    <h1>Editar Producto</h1>
    <form action="/CRUDPHP/BackEnd/EditarProducto.php" method="POST">
    <input type="hidden" id="id" name="id" value="<?= $id; ?>"> <!-- Este campo contiene el ID del producto -->
        
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" value="<?= $name; ?>" required>
        <br>
        
        <label for="description">Descripción:</label>
        <input type="text" id="description" name="description" value="<?= $description; ?>" required>
        <br>
        
        <label for="price">Precio:</label>
        <input type="number" id="price" name="price" value="<?= $price; ?>" step="0.01" required>
        <br>
        
        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" value="<?= $stock; ?>" required>
        <br>

        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
    </form>

    <br>
    <a href="/CRUDPHP/FrontEnd/Crud/ListadoDeProductos.php" class="btn btn-secondary">Volver al listado</a>
</body>
</html>
