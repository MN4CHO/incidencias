<?php
require_once __DIR__ . "/validarsesion.php";

http_response_code(500);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Error 500 - Internal Server Error</title>
</head>
<body>
    <header>
              <p>Bienvenido <?php echo $_SESSION['nombre'] ?> </p>
    </header>

    <main>
        <h1>Error 500 - Internal Server Error</h1>
        <p>Ha ocurrido un problema al comunicarse con la base de datos.</p>
        <a href="cerrarsesion.php">Ir al login</a>
    </main>

    <br><br><a href="cerrarsesion.php">Cerrar Sesión</a>
</body>
</html>