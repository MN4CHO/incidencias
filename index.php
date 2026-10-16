<?php
#inciamos el motor de sesiones
session_start();

# si la sesion esta activa entonces lo regresamos al listado
if ($_SESSION != null) {
    header("Location: listar.php");
    exit;
}

?>


<!DOCTYPE html>
<html>

<head></head>


<body>
    <h1>Bienvenido al Sistema de Incidencias Técnicas</h1>
    <h3>Este sistema permite a los usuarios reportar y gestionar incidencias técnicas de manera eficiente.</h3><br>

    <p> Ingrese sus credenciales para acceder al sistema:</p>

    <form action="listar.php" method="POST">

        <fieldset>
            Usuario: <input type="text" name="usuario"> <br><br>
            Contraseña: <input type="password" name="clave"> <br><br>
            <input type="submit" value="Iniciar Sesión">

        </fieldset>


    </form>


</body>

</html>