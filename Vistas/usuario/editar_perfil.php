<?php
session_start(); // Asegúrate de iniciar la sesión

include("../../Programas/controlsesionusr.php");

$Nombre_de_Usuario = $_SESSION['nombre']; 
$usuario_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración de Perfil</title>
    <link rel="stylesheet" href="../../assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/dist/css/stylespu.css">
    <link rel="icon" href="../../assets/img/logoOP.png" type="image/x-icon">
    <style>
        body {
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 20px;
            max-width: 500px;
            margin-bottom: 100px;

        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            height: 205%;
            width: 100%;
        }

        .profile-pic {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-pic img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ccc;
        }

        .btn-upload {
            margin-top: 10px;
        }

        .form-control {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="Bienvenida.php">
                <img src="../../assets/img/logoOP.png" alt="" style="width: 30px; height: 30px; margin-right: 10px;">
                Objetos Perdidos
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="Bienvenida.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="Nosotros-login.php">Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="Contacto-login.php">Contacto</a></li>
            </ul>
        </div>
    </div>
</nav>

    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h3>Configuración de Perfil</h3>

                <?php
                include '../../Programas/conexion.php';

                
                ?>
            </div>
            <div class="card-body">
                <div class="profile-pic">
                    <img id="profile-image" src="../imagenes_pu/usuario.png" alt="Imagen de Perfil">
                    <form action="upload_image.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="profile_image" class="form-control btn-upload" accept="image/*">
                        <button type="submit" class="btn btn-primary btn-sm mt-2">Actualizar Imagen</button>
                    </form>
                </div>
                <form action="update_profile.php" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingresa tu nombre" value="">
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo Electrónico</label>
                        <input type="email" class="form-control" name="correo" id="correo" placeholder="Ingresa tu correo" value="">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Nueva contraseña">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirmar Contraseña</label>
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirma tu contraseña">
                    </div>
                    <div class="form-group">
                        <label for="Dirección">Dirección</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Nueva dirección">
                    </div>
                    <div class="form-group">
                        <label for="Fecha de Nacimiento">Fecha de Nacimiento</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Nueva Fecha de Nacimiento">
                    </div>
                    <div class="form-group">
                        <label for="Teléfono">Teléfono</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Nuevo Teléfono">
                    </div>
                    <button type="submit" class="btn btn-success w-100">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-4">
        &copy; 2025 Dolphin Telecommunication. Todos los derechos reservados.
    </footer>
    <script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
