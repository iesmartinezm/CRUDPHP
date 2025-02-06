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

// Obtener los datos del usuario para prellenar el formulario
$id = $_SESSION['user_id'];
$sql = "SELECT username, email FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($username, $email);
$stmt->fetch();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSSActualizarPerfil.css">
    <title>Actualizar Perfil</title>
</head>
<body>
    <h1>Actualizar Perfil</h1>
    <form method="POST" action="/BackEnd/ActualizarPerfil.php">
        <input type="hidden" name="id" value="<?php echo $_SESSION['user_id']; ?>"> <!-- Campo oculto para el ID -->
        
        <label for="username">Nombre de usuario:</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
        
        <label for="password">Nueva contraseña:</label>
        <input type="password" id="password" name="password">
        
        <label for="confirm_password">Confirmar contraseña:</label>
        <input type="password" id="confirm_password" name="confirm_password">
        
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
