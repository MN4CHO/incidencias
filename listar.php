<?php
#iniciamos el motor de sesiones
session_start();
# usamos el archivo de consultas para validar el usuario y listar las incidencias
require_once 'consultas.php';

# Verificamos que los datos vengan por POST y de ser asi obtenemos el usuario y la clave para vlidad
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $usuario = $_POST['usuario'] ?? '';
    $clave = $_POST['clave'] ?? '';

    # Consultamos a la base de datos
    $datosUsuario = validarUsuario($usuario, $clave);

    # Si encontró al usuario, guardamos sus datos en la sesión
    if ($datosUsuario !== null) {
        $_SESSION['id_usuario'] = $datosUsuario['id'];
        $_SESSION['nombre'] = $datosUsuario['nombre'];

    } else {
        # Credenciales incorrectas: regreso al index
        header("Location: index.php");
        exit;
    }
}

# Verificamos que la sesión esté activa y si se intenta acceder con GET
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    require_once 'validarsesion.php';
}

# Consultaos las incidencias del usuario    
require_once 'consultas.php';
$incidencias = listarIncidencias($_SESSION['id_usuario']);

?>


<html>

<head></head>

<body>
    <h1>Listado de Incidencias</h1>
    <p>Bienvenido al sistema de incidencias técnicas, <?php echo $_SESSION['nombre'] ?> </p>
    <p>A continuación se muestra un listado de las incidencias que has registrado:</p><br>

    <!-- border: bordes; cellpadding: espacio interno; cellspacing: espacio entre celdas; width: ancho de la tabla -->
    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th> ID </th>
                <th> Nombre </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($incidencias as $incidencia): ?>
                <tr>
                    <td><?= $incidencia['id'] ?></td>
                    <!-- se envia por get el id de la incidencia para que detalle.php 
                    pueda mostrar la informcion de la incidencia seleccionada -->
                    <td><a href="detalle.php?id=<?= $incidencia['id'] ?>"><?= $incidencia['nombre'] ?></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br><br><a href="registrar.php">Registrar Nueva Incidencia</a>
    <br><br><a href="cerrarsesion.php">Cerrar Sesión</a>

</body>

</html>