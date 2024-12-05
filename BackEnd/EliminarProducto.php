<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    header("Location:/CRUDPHP/FrontEnd/FormularioLogin/FormularioLogin.html");
    exit();
}

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "crudphp");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si el ID fue proporcionado a través de GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Validar que el ID es un número
    if (is_numeric($id)) {
        // Eliminar el producto de la base de datos
        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // Redirigir al listado de productos después de eliminar
            header("Location: /CRUDPHP/FrontEnd/Crud/ListadoDeProductos.php");
            exit();
        } else {
            echo "Error al eliminar el producto: " . $conn->error;
        }
    } else {
        echo "ID no válido.";
    }
} else {
    echo "No se proporcionó un ID válido.";
}

// Cerrar la conexión
$conn->close();
?>
