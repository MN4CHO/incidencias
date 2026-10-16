<?php
# conexion a la base de datos (MariaDB / XAMPP)
# si la BD no responde, redirige a 500.php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    $conexion = new mysqli("localhost", "root", "", "incidencias_db");
    $conexion->set_charset("utf8mb4");
} catch (mysqli_sql_exception $e) {
    header("Location: 500.php");
    exit;
}
