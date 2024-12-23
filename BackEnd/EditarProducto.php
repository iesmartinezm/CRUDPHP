<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    header("Location:/FrontEnd/FormularioLogin/FormularioLogin.html");
    exit();
}

// Conexión a la base de datos
$conn = new mysqli("db", "root", "root", "crudphp");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    // Validación de datos
    if (!is_numeric($price) || !is_numeric($stock)) {
        echo "El precio y el stock deben ser números.";
    } else {
        // Actualizar el producto en la base de datos
        $sql = "UPDATE products SET name=?, description=?, price=?, stock=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdii", $name, $description, $price, $stock, $id);

        if ($stmt->execute()) {
            // Redirigir al listado de productos
            header("Location:/FrontEnd/Crud/ListadoDeProductos.php");
            exit();
        } else {
            echo "Error al actualizar el producto: " . $conn->error;
        }
    }
}

$conn->close();
?>
