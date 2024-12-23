<?php
session_start(); // Verificar sesión

if (!isset($_SESSION['user_id'])) {
    header("Location: /FrontEnd/FormularioLogin/FormularioLogin.html");
    exit();
}

// Conexión a la base de datos
$conn = new mysqli("db", "root", "root", "crudphp");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recibir y validar datos del formulario
$name = trim($_POST['name']);
$description = trim($_POST['description']);
$price = filter_var($_POST['price'], FILTER_VALIDATE_FLOAT);
$stock = filter_var($_POST['stock'], FILTER_VALIDATE_INT);

if (!$price || !$stock || empty($name) || empty($description)) {
    echo "Datos inválidos. Por favor, verifica los campos.";
    echo "<a href='/FrontEnd/Crud/FormularioCrearProducto.php'>Volver</a>";
    exit();
}

// Insertar producto en la base de datos
$sql = "INSERT INTO products (name, description, price, stock) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdi", $name, $description, $price, $stock);

if ($stmt->execute()) {
    header("Location: /FrontEnd/Crud/ListadoDeProductos.php");
    exit();
} else {
    echo "Error al crear el producto: " . $stmt->error;
    echo "<a href='/FrontEnd/Crud/FormularioCrearProducto.php'>Volver</a>";
}

$stmt->close();
$conn->close();
?>