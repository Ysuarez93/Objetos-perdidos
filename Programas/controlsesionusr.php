<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Definir rutas base
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Objetos-Perdidos';

// Verificar autenticación
if (!isset($_SESSION['confirmado']) || $_SESSION['confirmado'] == false) {
    header("Location: $base_url/vistas/general/autenticacion.php");
    exit();
}

// Incluir conexión y verificar
require_once("../../Programas/conexion.php");
if (!isset($conexion) || !($conexion instanceof mysqli)) {
    header("Location: $base_url/vistas/general/autenticacion.php?error=db");
    exit();
}

// Consulta segura con prepared statements
$peticion = "SELECT ID_rol, Nombre_de_Usuario FROM usuario WHERE ID_Usuario = ?";
$stmt = $conexion->prepare($peticion);

if (!$stmt) {
    header("Location: $base_url/vistas/general/autenticacion.php?error=stmt");
    exit();
}

$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

// Verificar resultados
if ($result->num_rows !== 1) {
    header("Location: $base_url/vistas/general/autenticacion.php?error=auth");
    exit();
}

// Obtener datos del usuario
$fila = $result->fetch_assoc();
$rolUsuario = $fila['ID_rol'];
$_SESSION['nombre'] = $fila['Nombre_de_Usuario']; // Asegurar que el nombre esté en sesión

// Redirigir según rol
if ($rolUsuario == 1) {
    header("Location: $base_url/vistas/administrador/Dashboard.php");
    exit();
} elseif ($rolUsuario != 2) {
    header("Location: $base_url/vistas/general/autenticacion.php?error=role");
    exit();
}

// Si todo está bien, continuar sin redirección (rol 2)

?>