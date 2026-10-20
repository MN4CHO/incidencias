<?php
    require_once 'validarsesion.php';
    http_response_code(201); 
?>

<html>
    <head>
    </head>
    <body>
        <h1>Incidencia Creada – 201 Created</h1>
        <h3>La incidencia ha sido creada correctamente.</h3>
        <p>Usuario que registro la incidencia: <?php echo $_SESSION['nombre'] ?> </p>

        <a href="registrar.php">Registrar otra incidencia</a> <br><br>
        <a href="listar.php">Ver todas las incidencias</a> <br><br>
        <a href="cerrarsesion.php">Cerrar Sesión</a>

    </body>
</html>