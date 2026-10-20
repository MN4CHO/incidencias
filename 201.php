<?php
    require_once __DIR__ . "/validarsesion.php";
    http_response_code(201); 
?>

<html>
    <head>
    </head>
    <body>
        <p> Usuario: <?php echo $_SESSION['nombre']; ?></p>
        <h1>Incidencia Creada – 201 Created</h1>
        <p>La incidencia ha sido creada correctamente.</p>
        <a href="registrar.php">Registrar otra incidencia</a> <br><br>
        <a href="listar.php">Ver todas las incidencias</a><br><br>
        <a href="index.php">Cerrar sesión</a>
    </body>
</html>