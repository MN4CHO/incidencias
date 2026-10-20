<?php
require_once __DIR__ . "/validarsesion.php";
http_response_code(400);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Error 400 - Bad request</title>
</head>
<body>
    <header>
        <p>
            Bienvenido <?php echo htmlspecialchars($_SESSION['nombre']); ?> |
            <a href="cerrarsesion.php">Cerrar sesión</a>
        </p>
    </header>

    <main>
        <h1>Error 400 - Bad request</h1>
        <p>Los datos ingresados en el formulario no cumplen con las reglas de validación.</p>
        <a href="registrar.php">Regresar</a>
    </main>
</body>
</html>