<?php
session_start(); // Asegúrate de iniciar la sesión

// Verifica si el usuario está logueado
if (isset($_SESSION['nombre'])) {
    $Nombre_de_Usuario = $_SESSION['nombre'];
} else {
    $Nombre_de_Usuario = null; // Si no hay sesión, el usuario es visitante
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Objetos Perdidos - Sistema inteligente de gestión de objetos perdidos por Dolphin Telecomunicaciones">
    <title>Objetos Perdidos - Nosotros</title>
    
    <link rel="icon" href="../assets/img/logoOP.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --primary-color: #0d6efd; /* Bootstrap primary blue */
            --secondary-color: #0a58ca;
            --accent-color: #0097e6;
            --text-color: #172b4d;
            --light-bg: #f4f5f7;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            color: var(--text-color);
            line-height: 1.6;
            padding-top: 56px;
        }

        /* Mantenemos la navbar original sin modificaciones */
        .navbar {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 80px 0 60px;
            margin-bottom: 80px;
            clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
        }

        /* Content Cards */
        .content-card {
            background: white;
            border-radius: 16px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transform: translateY(0);
            transition: all 0.3s ease;
        }

        .content-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        }

        .content-card h2 {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-size: 2rem;
        }

        .content-card p {
            color: #505f79;
            font-size: 1.1rem;
            line-height: 1.8;
        }

        /* Icon Features */
        .feature-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            background: var(--light-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        .feature-icon i {
            font-size: 1.8rem;
            color: var(--primary-color);
        }

        /* Footer */
        footer {
            background: var(--text-color);
            color: white;
            padding: 4rem 0;
            margin-top: 6rem;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            margin: 0 10px;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: var(--accent-color);
            transform: translateY(-3px);
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.6s ease forwards;
        }
    </style>
</head>
<body>
    <!-- Navbar Original -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="Bienvenida.php">
                <img src="../assets/img/logoOP.png" alt="Objetos Perdidos Logo" width="30" height="30" class="me-2">
                <span class="font-weight-bold">Objetos Perdidos</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../carousel/Bienvenida.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="publicaciones.php">Publicaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../carousel/Nosotros-login.php">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../carousel/Contacto-login.php">Contacto</a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                    <a class="nav-link " href="#" id="perfilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <p><?php echo htmlspecialchars($Nombre_de_Usuario); ?></p>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="perfilDropdown">
                        <li><a class="dropdown-item" href="../Registros/editar_perfil.php">Ver perfil </a></li>
                        <li><a class="dropdown-item" href="../Registros/editar_perfil.php">Configuración</a></li>
                        <li><a class="dropdown-item" href="../Registros/ObjPerdido.php">Publicar</a></li>
                        <li><a class="dropdown-item" href="../Carousel/dashboard.php">Dashboard</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="../index.php">Cerrar sesión</a></li>
                    </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-4">Encontrar lo perdido, juntos es más fácil</h1>
            <p class="lead mb-0">Conectando personas, construyendo futuro</p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container">
        <!-- Sobre Nosotros -->
        <div class="content-card animate-fadeInUp">
            <div class="feature-icon">
                <i class="bi bi-building"></i>
            </div>
            <h2>Sobre Nosotros</h2>
            <p>Fundada en Bogotá en 2017, Dolphin Telecomunicaciones S.A.S nació con el propósito de crear la red de servicios más grande del país. Nos dedicamos a ofrecer soluciones tecnológicas innovadoras que aportan a las distancias y conectan a las personas de manera eficiente y segura.</p>
        </div>

        <!-- Misión & Visión Grid -->
        <div class="row">
            <div class="col-md-6">
                <div class="content-card h-100 animate-fadeInUp" style="animation-delay: 0.2s">
                    <div class="feature-icon">
                        <i class="bi bi-rocket-takeoff"></i>
                    </div>
                    <h2>Misión</h2>
                    <p>Desarrollamos procesos tecnológicos sostenibles que responden a las necesidades específicas de nuestros clientes. Nuestro enfoque es dinámico, innovador y eficiente, siempre gestionando con eficiencia. Trabajamos bajo los más altos estándares de calidad y ponemos énfasis en la atención al cliente.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="content-card h-100 animate-fadeInUp" style="animation-delay: 0.4s">
                    <div class="feature-icon">
                        <i class="bi bi-eye"></i>
                    </div>
                    <h2>Visión</h2>
                    <p>Aspiramos a ser reconocidos y acreditados a nivel nacional como líderes en telecomunicaciones para el año 2030. Nuestra meta es ser referentes en soluciones tecnológicas en redes y datos de manera eficiente y segura, destacando por nuestra innovación y compromiso con la excelencia.</p>
                </div>
            </div>
        </div>

        <!-- Valores Section -->
        <div class="row mt-5 g-4">
            <div class="col-md-4">
                <div class="content-card text-center animate-fadeInUp" style="animation-delay: 0.6s">
                    <div class="feature-icon mx-auto">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h3 class="h4 mb-3">Seguridad</h3>
                    <p>Protegemos la información y datos de nuestros clientes con los más altos estándares de seguridad.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="content-card text-center animate-fadeInUp" style="animation-delay: 0.8s">
                    <div class="feature-icon mx-auto">
                        <i class="bi bi-lightning-charge"></i>
                    </div>
                    <h3 class="h4 mb-3">Innovación</h3>
                    <p>Constantemente buscamos nuevas formas de mejorar y optimizar nuestros servicios.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="content-card text-center animate-fadeInUp" style="animation-delay: 1s">
                    <div class="feature-icon mx-auto">
                        <i class="bi bi-people"></i>
                    </div>
                    <h3 class="h4 mb-3">Compromiso</h3>
                    <p>Nos dedicamos a satisfacer las necesidades de nuestros clientes con excelencia.</p>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <img src="../assets/img/logoOP.png" alt="Logo" width="60" height="60" class="mb-4">
                    <h4 class="mb-4">Dolphin Telecommunication</h4>
                    <p class="mb-4">Conectando el futuro, hoy</p>
                    <div class="social-links mb-4">
                        <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" aria-label="Twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                    </div>
                    <p class="small mb-0">&copy; 2025 Dolphin Telecommunication. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
