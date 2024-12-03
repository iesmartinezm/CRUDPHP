<?php
session_start(); // Inicia la sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $conn = new mysqli("localhost", "root", "", "crudphp");

    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }


    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $errores = [];


    // Validar campos
    if (empty($email)) {
        $errores[] = "El correo electrónico es obligatorio.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "Formato de correo electrónico inválido.";
    }


    if (empty($password)) {
        $errores[] = "La contraseña es obligatoria.";
    }

    if (!empty($errores)) {
        foreach ($errores as $error) {
            echo "<p>$error</p>";
        }
        exit;
    }

    // Consultar el usuario en la base de datos
    $stmt = $conn->prepare("SELECT id, username, password_hash FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "<p>Correo electrónico o contraseña incorrectos.</p>";
        exit;
    }


    $user = $result->fetch_assoc();

    // Verificar la contraseña
    if (password_verify($password, $user['password_hash'])) {
        // Credenciales válidas, iniciar sesión
        $_SESSION['user_id'] = $user['id']; // Guardar el ID del usuario en la sesión
        $_SESSION['username'] = $user['username']; // Guardar el nombre de usuario

        // Redirigir al usuario al CRUD de productos o a la página de bienvenida
        header("Location: ../BackEnd/CrudProductos.php"); // Cambiar esta URL según sea necesario
        exit;
    } else {
        echo "<p>Correo electrónico o contraseña incorrectos.</p>";
    }


    // Cerrar conexiones
    $stmt->close();
    $conn->close();
} else {
    echo "<p>Método no permitido.</p>";
}
?>






















































