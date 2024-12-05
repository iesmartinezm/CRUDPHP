<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    // Si no está autenticado, redirigir al login
    header("Location:/CRUDPHP/FrontEnd/FormularioLogin/FormularioLogin.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
    <link rel="stylesheet" href="/CRUDPHP/FrontEnd/Crud/CSSCrudProductos.css">
</head>
<body>
    <?php
    // Mostrar el CRUD de productos (solo si el usuario está autenticado)
    echo "<h1>Bienvenido, " . $_SESSION['username'] . ". Aquí puedes gestionar tus productos.</h1>";

    // Mostrar un enlace para listar productos
    echo "<a href='/CRUDPHP/FrontEnd/Crud/ListadoDeProductos.php' class='btn btn-primary'>Ver listado de productos</a>";

    // Agregar un enlace para la funcionalidad futura de añadir un producto
    echo "<a href='/CRUDPHP/FrontEnd/Crud/FormularioCrearProducto.php' class='btn btn-success'>Añadir producto</a>";

    // Botón para cerrar sesión
    echo "<a href='logout.php' class='btn btn-danger'>Cerrar sesión</a>";
    ?>
</body>
</html>
