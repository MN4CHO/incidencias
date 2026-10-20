<?php
require_once "conexion.php";

# 1. devuelve el usuario si las credenciales son correctas, o null
function buscarUsuario($conexion, $usuario, $clave)
{
    $s = $conexion->prepare("SELECT id, usuario, nombre FROM usuario WHERE usuario = ? AND clave = ?");
    $s->bind_param("ss", $usuario, $clave);
    $s->execute();
    return $s->get_result()->fetch_assoc();
}

# 2. lista las incidencias (id, nombre) de un usuario
function listarPorUsuario($conexion, $idUsuario)
{
    $s = $conexion->prepare("SELECT id, nombre FROM incidencia WHERE id_usuario = ? ORDER BY id");
    $s->bind_param("i", $idUsuario);
    $s->execute();
    return $s->get_result()->fetch_all(MYSQLI_ASSOC);
}

# 3. devuelve una incidencia del usuario, o null
function obtenerIncidencia($conexion, $id, $idUsuario)
{
    $s = $conexion->prepare("SELECT id, nombre, descripcion, prioridad FROM incidencia WHERE id = ? AND id_usuario = ?");
    $s->bind_param("ii", $id, $idUsuario);
    $s->execute();
    return $s->get_result()->fetch_assoc();
}

# 4. registra una incidencia; devuelve true o false
function insertarIncidencia($conexion, $idUsuario, $nombre, $descripcion, $prioridad)
{
    $s = $conexion->prepare("INSERT INTO incidencia (nombre, descripcion, prioridad, id_usuario) VALUES (?, ?, ?, ?)");
    $s->bind_param("sssi", $nombre, $descripcion, $prioridad, $idUsuario);
    return $s->execute();
}
