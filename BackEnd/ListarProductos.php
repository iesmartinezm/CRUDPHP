<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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

// Obtener el término de búsqueda (desde GET o POST)
$search = '';
if (isset($_GET['search'])) {
    $search = $_GET['search'];
} elseif (isset($_POST['search'])) {
    $search = $_POST['search'];
}

// Mostrar el término de búsqueda (vulnerable a XSS)
echo "<h1>Resultados de búsqueda para: " . $search . "</h1>";

// Consulta para obtener los productos
$sql = "SELECT id, name, description, price, stock FROM products WHERE name LIKE ?";
$stmt = $conn->prepare($sql);
$searchTerm = "%$search%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

// Generar la tabla de productos
echo "<table border='1' style='width: 100%; text-align: center;'>";
echo "<thead><tr><th>Nombre</th><th>Descripción</th><th>Precio (EUROS)</th><th>Stock (Unidades)</th><th>Acciones</th></tr></thead>";
echo "<tbody>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['description']) . "</td>";
        echo "<td>" . htmlspecialchars($row['price']) . "</td>";
        echo "<td>" . htmlspecialchars($row['stock']) . "</td>";
        echo "<td>
        <a href='/FrontEnd/Crud/FormularioEditarProducto.php?id=" . urlencode($row['id']) . 
        "&name=" . urlencode($row['name']) . 
        "&description=" . urlencode($row['description']) . 
        "&price=" . urlencode($row['price']) . 
        "&stock=" . urlencode($row['stock']) . "'>Editar</a> | 
        <a href='#' onclick='confirmDelete(" . $row['id'] . ")'>Eliminar</a>
        </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No hay productos disponibles</td></tr>";
}

echo "</tbody>";
echo "</table>";

// Cerrar la conexión
$stmt->close();
$conn->close();

// Botón para volver al CRUD principal
echo "<br><a href='/BackEnd/CrudProductos.php' class='btn btn-secondary'>Volver al menú principal</a>";

ob_end_flush();
?>