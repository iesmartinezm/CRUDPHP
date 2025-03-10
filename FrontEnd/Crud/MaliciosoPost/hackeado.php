<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    header("Location:/FrontEnd/FormularioLogin/FormularioLogin.html");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Has sido Hackeado</title>
</head>
<body>
    <h1>No Debiste Hacer Click en ese enlace</h1>
    <p>Te he robado la cookie de sesion</p>
</body>
</html>