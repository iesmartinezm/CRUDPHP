<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <link rel="stylesheet" href="CSSProductos.css">

</head>
<body>
    
    <div class="table-container">
        <!-- Aquí se incluirá la tabla desde ListarProductos.php -->
        <?php include("../../BackEnd/ListarProductos.php"); ?>
    </div>
    <div class="actions">
        <a href="../../BackEnd/logout.php">Cerrar sesión</a>
    </div>
</body>