<?php
require_once 'validarsesion.php';
$nombre = $descripcion = $prioridad = "";


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $nombre = $_POST['nombre'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $prioridad = $_POST['prioridad'] ?? '';

    if (validarEntradas($nombre, $descripcion, $prioridad)) {
        require_once 'conexion.php';

        $sql = "INSERT INTO incidencia (nombre, descripcion, prioridad, id_usuario) VALUES (?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssi", $nombre, $descripcion, $prioridad, $_SESSION['id_usuario']);

        if ($stmt->execute()) {
            header("Location: 201.php");
            exit;
        } else {
            header("Location: 500.php");
            exit;
        }
    } else {
        // si falla la validación, va a 400.php
        header("Location: 400.php");
        exit;
    }
}
function validarEntradas($nombre, $descripcion, $prioridad)
{
    if (
        trim($nombre) === "" ||
        trim($descripcion) === "" ||
        !isset($prioridad) ||
        strpbrk($nombre, '$\\=') !== false ||
        strpbrk($descripcion, '$[]\\=') !== false ||
        !in_array($prioridad, ['alta', 'media', 'baja'], true)
    ) {
        return false;
    }

    return true;
}


?>

<html>

<head></head>

<body>
    <h1>Registrar Incidencia</h1>
    <h2>Bienvenido al sistema de incidencias técnicas, <?php echo $_SESSION['nombre'] ?> </h2>
    <form method="POST" action="registrar.php">
        <fieldset>
            Nombre: <br>
            <input type="text" name="nombre" size="60"><br><br>
            Descripcion: <br>
            <input type="text" name="descripcion" size="60"><br><br>
            Prioridad: <br>
            <input type="radio" name="prioridad" value="baja"> Baja<br>
            <input type="radio" name="prioridad" value="media"> Media<br>
            <input type="radio" name="prioridad" value="alta"> Alta<br><br>
            <input type="submit" value="Guardar"><br>
        </fieldset>

        <br><br><a href="listar.php">Cancelar registro</a>
        <br><br><a href="cerrarsesion.php">Cerrar Sesión</a>
    </form>
</body>

</html>