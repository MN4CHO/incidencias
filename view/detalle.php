<?php
#iniciar el motor de sesiones
session_start();

# si la sesion no esta activa entonces lo regresamos al index
if ($_SESSION == null) {
    header("Location: ../index.php");
    exit;
}

?>


<html>

<head></head>

<body>
    <h1>Detalle de la Incidencia</h1>
    <p>Usuario: <?php echo $_SESSION['usuario'] ?> </p>
    <p>ID de la incidencia: numero </p>
    <p>Este es el detalle de la incidencia seleccionada.</p> <br>

    <!-- border: bordes; cellpadding: espacio interno; cellspacing: espacio entre celdas; width: ancho de la tabla -->
    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th> ID </th>
                <th> Nombre </th>
                <th> Descripción </th>
                <th> Prioridad</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Calculos Incorrectos </a></td>
                <td>La aplicación muestra resultados incorrectos en los cálculos financieros.</td>
                <td>Alta</td>
            </tr>
        </tbody>
    </table>

    <br><br><a href="../view/listar.php">Regresar al listado</a>
    <br><br><a href="../includes/cerrarsesion.php">Cerrar Sesión</a>

</body>

</html>