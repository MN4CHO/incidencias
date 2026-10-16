<?php
# Inicia la sesión solo si no está iniciada previamente
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

# Si no existe la variable de sesión o está vacía, expulsar al login
if (!isset($_SESSION['nombre']) || empty($_SESSION['nombre'])) {
    header("Location: index.php");
    exit;
}