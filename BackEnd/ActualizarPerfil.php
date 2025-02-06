<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    header("Location:/FrontEnd/FormularioLogin/FormularioLogin.html");
    exit();
}

// Conectar a la base de datos
$host = "db";
$user = "root";
$password = "root";
$database = "crudphp";
$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$id = isset($_POST['id']) ? $_POST['id'] : null;
$username = isset($_POST['username']) ? $_POST['username'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : null;

// Validar que los campos requeridos no estén vacíos
if (empty($username) || empty($email)) {
    echo "Todos los campos son obligatorios.";
    exit;
}

// Validar que las contraseñas coincidan
if (!empty($password) && $password !== $confirm_password) {
    echo "Las contraseñas no coinciden.";
    exit;
}

// Preparar la consulta SQL
if (!empty($password)) {
    // Si se ingresa una nueva contraseña
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET username=?, email=?, password_hash=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $username, $email, $password_hash, $id);
} else {
    // Si no se ingresa una nueva contraseña
    $sql = "UPDATE users SET username=?, email=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $username, $email, $id);
}

// Ejecutar la consulta y verificar si fue exitosa
if ($stmt->execute()) {
    // Redirigir después de actualizar
    header("Location: /FrontEnd/FormularioLogin/FormularioLogin.html");
    exit;
} else {
    echo "Error al actualizar el perfil.";
}

$stmt->close();
$conn->close();
?>
