<?php
require_once 'validarsesion.php';
?>


Aqui va el registar :D

<html>

<head></head>

<body>
    <p>Usuario: <?php echo $_SESSION['nombre'] ?> </p>

    <br><br><a href="listar.php">Cancelar registro</a>
    <br><br><a href="cerrarsesion.php">Cerrar Sesión</a>

</body>

</html>