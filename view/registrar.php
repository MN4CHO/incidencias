<?php
#iniciar el motor de sesiones
session_start();

# si la sesion no esta activa entonces lo regresamos al index
if ($_SESSION == null) {
    header("Location: ../index.php");
    exit;
}

?>


Aqui va el registar :D

<html>

<head></head>

<body>
    <p>Usuario: <?php echo $_SESSION['usuario'] ?> </p>

    <br><br><a href="../view/listar.php">Cancelar registro</a>
    <br><br><a href="../includes/cerrarsesion.php">Cerrar Sesión</a>

</body>

</html>