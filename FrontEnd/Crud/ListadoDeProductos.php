<?php ob_start(); ?> <!-- Inicia el almacenamiento en búfer de salida -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <link rel="stylesheet" href="CSSProductos.css">

    <script type="text/javascript">
    function confirmDelete(productId) {
        // Pedir confirmación antes de eliminar
        var result = confirm("¿Estás seguro de que quieres eliminar este producto?");
        if (result) {
            // Redirigir a EliminarProducto.php si el usuario confirma
            window.location.href = '/BackEnd/EliminarProducto.php?id=' + productId;
        }
    }
    </script>

</head>
<body>

    <!-- Formulario de búsqueda con GET -->
    <h2>Buscar productos (GET)</h2>
    <form action="/FrontEnd/Crud/ListadoDeProductos.php" method="GET">
        <label for="search_get">Buscar producto:</label>
        <input type="text" id="search_get" name="search" placeholder="Nombre del producto">
        <button type="submit">Buscar (GET)</button>
    </form>

    <!-- Formulario de búsqueda con POST -->
    <h2>Buscar productos (POST)</h2>
    <form action="/FrontEnd/Crud/ListadoDeProductos.php" method="POST">
        <label for="search_post">Buscar producto:</label>
        <input type="text" id="search_post" name="search" placeholder="Nombre del producto">
        <button type="submit">Buscar (POST)</button>
    </form>

    
    <div class="table-container">
        <!-- Aquí se incluirá la tabla desde ListarProductos.php -->
        <?php include("../../BackEnd/ListarProductos.php"); ?>
    </div>



    <div class="actions">
        <a href="/BackEnd/logout.php">Cerrar sesión</a>
    </div>
</body>
</html>
<?php ob_end_flush(); ?> <!-- Finaliza y envía el contenido al navegador -->
