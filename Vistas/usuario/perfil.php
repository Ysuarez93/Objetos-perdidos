<?php
session_start();

// Verifica si el usuario ha iniciado sesión
include("../../Programas/controlsesionusr.php");

$Nombre_de_Usuario = $_SESSION['nombre']; 
$usuario_id = $_SESSION['user_id'];

// Obtén la información del usuario desde la sesión
$nombre = $_SESSION['nombre'];
$correo = $_SESSION['correo'];
$telefono = $_SESSION['telefono'];
$direccion = $_SESSION['direccion'];
// Agrega más campos según lo que tengas almacenado en la sesión
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Perfil de Usuario</h1>
        
        <!-- Información del perfil -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Información Personal</h5>
                <p><strong>Nombre:</strong> <?php echo htmlspecialchars($nombre); ?></p>
                <p><strong>Correo:</strong> <?php echo htmlspecialchars($correo); ?></p>
                <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($telefono); ?></p>
                <p><strong>Dirección:</strong> <?php echo htmlspecialchars($direccion); ?></p>
                <!-- Agrega otros detalles que desees mostrar -->
                
                <a href="editar_perfil.php" class="btn btn-primary mt-3">Editar Perfil</a>
                <a href="/Registros/logout.php" class="btn btn-danger mt-3">Cerrar Sesión</a>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
