<?php
require_once __DIR__ . "/validarsesion.php";
http_response_code(400);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 400 - Bad request</title>
</head>
<body>
    <header>
        <p>Bienvenido <?php echo $_SESSION['nombre'] ?> </p>
    </header>

    <main>
        <h1>Error 400 - Bad request</h1>
        <p>Los datos ingresados en el formulario no cumplen con las reglas de validación.</p>
        <a href="registrar.php">Regresar a registro</a>
    </main>

    <br><br><a href="cerrarsesion.php">Cerrar Sesión</a>

    
</body>
</html>