<?php
# conexion a la base de datos (MariaDB / XAMPP)
function obtenerConexion()
{
    $conexion = new mysqli("localhost", "root", "", "incidencias_db");
    $conexion->set_charset("utf8mb4");
    return $conexion;
}
