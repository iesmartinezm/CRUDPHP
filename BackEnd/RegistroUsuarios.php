<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $conn = new mysqli("localhost", "root", "", "crudphp");

    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }


    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];


    // Validar los campos
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        die("Todos los campos son obligatorios.");
    }


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("El correo electrónico no es válido.");
    }


    if ($password !== $confirm_password) {
        die("Las contraseñas no coinciden.");
    }


    // Hash de la contraseña
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);


    // Verificar si el usuario o correo ya existen
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        die("El nombre de usuario o el correo ya están registrados.");
    }


    // Insertar el nuevo usuario en la base de datos
    $stmt = $conn->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "Registro exitoso. Ahora puedes iniciar sesión.";
        // Redirigir al login después de un registro exitoso
        header("Location: ../FrontEnd/FormularioLogin/FormularioLogin.html"); // Cambiar la URL según sea necesario
        exit;
    } else {
        echo "Error al registrar el usuario: " . $stmt->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
} else {
    die("Método no permitido.");
}
?>









