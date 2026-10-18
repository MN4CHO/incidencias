<?php
require_once 'validarsesion.php';
?>

<html>
    <head></head>
    <body>
        <h1>Registrar Incidencia</h1>
        <h2>Bienvenido al sistema de incidencias técnicas, <?php echo $_SESSION['nombre'] ?> </h2>
        <form method="POST" action="">
            <filedset>
                Nombre: <br>
                <input type="text" name="nombre"><br><br>
                Descripcion: <br>
                <input type="text" name="descripcion"><br><br>
                Prioridad: <br>
                <input type="radio" name="prioridadB" value="Baja"> Baja<br>
                <input type="radio" name="prioridadM" value="Media"> Media<br>
                <input type="radio" name="prioridadA" value="Alta"> Alta<br><br>
                <input type="submit" value="Enviar"><br>
                <br><br><a href="listar.php">Cancelar registro</a>
                <br><br><a href="cerrarsesion.php">Cerrar Sesión</a>
            </filedset>
        </form>
    </body>
</html>