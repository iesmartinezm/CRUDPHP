<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    // Si no está autenticado, redirigir al login
    header("Location:/CRUDPHP/FrontEnd/FormularioLogin/FormularioLogin.html");
    exit();
}

// Mostrar el CRUD de productos (solo si el usuario está autenticado)
echo "<h1>Bienvenido, " . $_SESSION['username'] . ". Aquí puedes gestionar tus productos.</h1>";

// Mostrar un enlace para listar productos
echo "<a href='/CRUDPHP/FrontEnd/Crud/ListadoDeProductos.php' class='btn btn-primary'>Ver listado de productos</a>";

// Agregar un enlace para la funcionalidad futura de añadir un producto
echo "<br><a href='AgregarProducto.php' class='btn btn-success'>Añadir producto</a>";

// Botón para cerrar sesión
echo "<br><a href='logout.php' class='btn btn-danger' style='margin-top: 20px;'>Cerrar sesión</a>";
?>