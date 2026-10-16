<?php
# iniciar el motor de sesiones
session_start();
# destruir la sesion
session_destroy();

header("Location: ../index.php");
exit;
?>