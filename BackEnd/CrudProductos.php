<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    // Si no está autenticado, redirigir al login
    header("Location: ../FrontEnd/FormularioLogin/FormularioLogin.html");
    exit();
}

// Mostrar el CRUD de productos (solo si el usuario está autenticado)
echo "Bienvenido, " . $_SESSION['username'] . ". Aquí puedes gestionar tus productos.";
// Aquí agregas tu código para el CRUD de productos
?>

<!-- Botón para cerrar sesión -->
<br><a href="../BackEnd/logout.php" class="btn btn-danger" style="margin-top: 20px;">Cerrar sesión</a>