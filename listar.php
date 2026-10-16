<?php
#iniciar el motor de sesiones
session_start();

# obtener los datos enviados
# suponemos que el unico que puede entrar es el usuario prueba c: prueba123

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (
        $_POST['usuario'] == "prueba" &&
        $_POST['clave'] == "prueba123"
    ) {
        # si todo va bien entonces se crea la sesion y le dejamos entrar a listar
        $_SESSION['usuario'] = $_POST['usuario'];
        $_SESSION['clave'] = $_POST['clave'];
    }
    # caso contrari lo regresamos al index (login)
    else {
        header("Location: index.php");
        exit;
    }
}

# si el metodo es GET entonces verificamos que la sesion este activa, si no lo esta 
# lo regresamos al index
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if ($_SESSION == null) {
        header("Location: index.php");
        exit;
    }
}
?>


<html>

<head></head>

<body>
    <h1>Listado de Incidencias</h1>
    <p>Bienvenido al sistema de incidencias técnicas, <?php echo $_SESSION['usuario'] ?> </p>
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
            <tr>
                <td>1</td>
                <td> <a href="detalle.php">Calculos Incorrectos </a></td>
            </tr>
            <tr>
                <td>2</td>
                <td> <a href="detalle.php">Problemas de Conectividad</a> </td>
            </tr>
        </tbody>
    </table>

    <br><br><a href="registrar.php">Registrar Nueva Incidencia</a>
    <br><br><a href="cerrarsesion.php">Cerrar Sesión</a>

</body>

</html>