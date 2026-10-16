<?php
# validar la sesion y llamar al fuchero de consultas
require_once 'validarsesion.php';
require_once 'consultas.php';

# Obtenemos el ID que viene por la URL (GET)
$id = $_GET['id'] ?? null;

# Si no enviaron ningún ID, lo regresamos a listar
if (!$id) {
    header("Location: listar.php");
    exit;
}

# Consultamos la incidencia en la BD usando el ID de la URL y el del usuario en sesión
$incidencia = obtenerIncidencia($id, $_SESSION['id_usuario']);

# Si la incidencia no existe o no le pertenece a este usuario, regresamos al listado
if (!$incidencia) {
    header("Location: listar.php");
    exit;
}
?>


<html>

<head></head>

<body>
    <h1>Detalle de la Incidencia</h1>
    <p>Usuario: <?php echo $_SESSION['nombre'] ?> </p>
    <p>ID de la incidencia: <?= $incidencia['id'] ?> </p>
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
                <td><?= $incidencia['id'] ?></td>
                <td><?= $incidencia['nombre'] ?></td>
                <td><?= $incidencia['descripcion'] ?></td>
                <td><?= $incidencia['prioridad'] ?></td>
            </tr>
        </tbody>
    </table>

    <br><br><a href="listar.php">Regresar al listado</a>
    <br><br><a href="cerrarsesion.php">Cerrar Sesión</a>

</body>

</html>