<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="../assets/dist/css/stylespu.css">
    <link rel="stylesheet" href="../assets/dist/css/styless.css">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../assets/img/logoOP.png" type="image/x-icon">
    <style>
        :root {
            --primary-color: #2f4f7f;
            --secondary-color: #f7f7f7;
            --terciary-color: #45a0e6;
            --button-hover: #3a89c9;
        }

        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            background-color: var(--secondary-color);
        }

        /* Navbar */
        .navbar {
            background-color: var(--terciary-color);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 20px;
        }

        /* Contenedor principal */
        .container {
            display: flex;
            flex-direction: row;
            padding-top: 70px; /* Espacio para la navbar */
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            background-color: var(--primary-color);
            color: var(--secondary-color);
            width: 250px;
            height: calc(100vh - 70px);
            padding: 20px;
            position: fixed;
            top: 70px;
            overflow-y: auto;
        }

        .sidebar img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .sidebar h2 {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .dropdown {
            margin-bottom: 20px;
        }

        /* Main Content */
        .main-content {
            margin-left: 270px;
            padding: 20px;
            flex: 1;
        }

        .user-info {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        .image-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .object-details {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Footer */
        footer {
            background-color: var(--primary-color);
            color: var(--secondary-color);
            padding: 10px;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="../assets/img/logoOP.png" alt="" style="width: 30px; height: 30px; margin-right: 10px;">
                Objetos Perdidos
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="../carousel/index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="../carousel/Nosotros.php">Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="../carousel/Contacto.php">Contacto</a></li>
                </ul>
                <form class="d-flex me-3">
                    <input class="form-control me-2" type="search" placeholder="Buscar">
                    <button class="btn btn-outline-light">Buscar</button>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="perfilDropdown" data-bs-toggle="dropdown">Perfil</a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="/Registros/editar_perfil.php">Ver perfil</a></li>
                            <li><a class="dropdown-item" href="/Registros/editar_perfil.php">Configuración</a></li>
                            <li><a class="dropdown-item" href="/Registros/ObjPerdido.php">Publicar</a></li>
                            <li><a class="dropdown-item" href="/Registros/logout.php">Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar y Contenido Principal -->
    <div class="container">
        <div class="sidebar">
            <img src="../imagenes_pu/usuario.png" alt="Perfil">
            <h2>Henry Carvajal</h2>
            <div class="dropdown">
                <label>Objetos encontrados</label>
                <select onchange="fetchObjectDetails(this.value, 'found')">
                    <option>Selecciona un objeto</option>
                </select>
            </div>
            <div class="dropdown">
                <label>Objetos perdidos</label>
                <select onchange="fetchObjectDetails(this.value, 'lost')">
                    <option>Selecciona un objeto</option>
                </select>
            </div>
        </div>

        <div class="main-content">
            <div class="user-info">
                <p><strong>Nombre:</strong> Henry Carvajal</p>
                <p><strong>Edad:</strong> 27 años</p>
                <p><strong>Correo:</strong> henrycarvajal@gmail.com</p>
            </div>
            <div class="image-container">
                <img id="dynamic-image" src="imagenes/found1.jpg">
            </div>
            <div id="object-details" class="object-details">
                <h3>Detalles del Objeto</h3>
                <p>Seleccione un objeto para ver detalles.</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>&copy; 2024 Dolphin Telecommunication. Todos los derechos reservados.</footer>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

