<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    // Si no está autenticado, redirigir al login
    header("Location:/CRUDPHP/FrontEnd/FormularioLogin/FormularioLogin.html");
    exit();
}

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "crudphp");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta para obtener los productos
$sql = "SELECT id, name, description, price, stock FROM products";
$result = $conn->query($sql);

echo "<h1>Listado de productos</h1>";

// Generar la tabla de productos
echo "<table border='1' style='width: 100%; text-align: center;'>";
echo "<thead><tr><th>Nombre</th><th>Descripción</th><th>Precio (EUROS) </th><th>Stock (Unidades)</th><th>Acciones</th></tr></thead>";
echo "<tbody>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['description']) . "</td>";
        echo "<td>" . htmlspecialchars($row['price']) . "</td>";
        echo "<td>" . htmlspecialchars($row['stock']) . "</td>";
        echo "<td>
        <a href='/CRUDPHP/FrontEnd/Crud/FormularioEditarProducto.php?id=" . urlencode($row['id']) .
        "&name=" . urlencode($row['name']) .
        "&description=" . urlencode($row['description']) .
        "&price=" . urlencode($row['price']) .
        "&stock=" . urlencode($row['stock']) . "'>Editar</a> | 
        <a href='EliminarProducto.php?id=" . htmlspecialchars($row['id']) . "'>Eliminar</a>
        </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No hay productos disponibles</td></tr>";
}

echo "</tbody>";
echo "</table>";

// Cerrar la conexión
$conn->close();

// Botón para volver al CRUD principal
echo "<br><a href='/CRUDPHP/BackEnd/CrudProductos.php' class='btn btn-secondary'>Volver al menú principal</a>";
?>
