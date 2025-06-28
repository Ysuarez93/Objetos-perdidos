<?php
session_start(); // Asegúrate de iniciar la sesión

include("../../Programas/controlsesionusr.php");

$Nombre_de_Usuario = $_SESSION['nombre']; 
$usuario_id = $_SESSION['user_id'];

?>
<!DOCTYPE html>
<html lang="es" data-bs-theme="auto">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Objetos Perdidos">
  <title>Objetos Perdidos</title>
  <link rel="icon" href="../../assets/img/logoOP.png" type="image/x-icon">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root {
        --primary-color: #0d6efd; /* Bootstrap primary blue */
        --secondary-color: #0a58ca;
        --accent-color: #0097e6;
        --text-color: #172b4d;
        --light-bg: #f4f5f7;
    }

    body {
        font-family: 'Roboto', sans-serif;
        color: #333;
        padding-top: 56px;
    }
    
    /* Estilo para la navbar */
    .navbar {
        padding-left: 1rem;
        padding-right: 1rem;
    }

    h1, h2, h3, h4, h5, h6 {
        font-family: 'Montserrat', sans-serif;
        font-weight: 800;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004a9b;
    }
    .carousel-caption {
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
    }
    .featurette-image {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="Bienvenida.php">
          <img src="../../assets/img/logoOP.png" alt="" style="width: 30px; height: 30px; margin-right: 10px;">
          <span class="font-weight-bold">Objetos Perdidos</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
            
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="Bienvenida.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="publicaciones.php">Publicaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Nosotros-login.php">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Contacto-login.php">Contacto</a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="perfilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo htmlspecialchars($Nombre_de_Usuario); ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="perfilDropdown">
                        <li><a class="dropdown-item" href="editar_perfil.php">Ver perfil</a></li>
                        <li><a class="dropdown-item" href="editar_perfil.php">Configuración</a></li>
                        <li><a class="dropdown-item" href="ObjPerdido.php">Publicar</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="../../programas/logout.php">Cerrar sesión</a></li>
                    </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
  </header>

  <main>
    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel" style="height: 500px; overflow: hidden;">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../../assets/img/img17.jpg" alt="Imagen 1" class="d-block w-100" style="height: 500px; object-fit: cover;">
          <div class="container">
            <div class="carousel-caption text-start" style="bottom: 150px;">
            <h1 class="display-4 fw-bold" style="display: inline; font-family: inherit;">
                  ¡BIENVENIDO <span style="font-family: inherit;"><?php echo htmlspecialchars($Nombre_de_Usuario); ?>!</span>
            </h1>
              <p class="lead">¿Estas listo para encontrar tus pertenencias? Publica ya, tus objetos te estan esperando.</p>       
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="../../assets/img/img6.jpg" alt="Imagen 2" class="d-block w-100" style="height: 500px; object-fit: cover;">
          <div class="container">
            <div class="carousel-caption text-white" style="top: 10%; left: 50%; transform: translateX(-10%);">
              <h1 class="fw-bold" style="font-size: 2.5rem;">Miles de objetos perdidos estan buscando su dueño</h1>
              <p class="lead" style="font-size: 1rem;">Ingresa a nuestra seccion de publicaciones para ver si alguien ya encontro tu objeto</p>
              <p><a class="btn btn-lg btn-primary" href="publicaciones.php">Busca Aqui</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="../../assets/img/img12.jpg" alt="Imagen 3" class="d-block w-100" style="height: 500px; object-fit: cover;">
          <div class="container">
            <div class="carousel-caption text-center" style="top: 40%; left: 50%; transform: translateX(-50%);">
              <h1 class="display-4 fw-bold">¡No dejes pasar la oportunidad!</h1>
              <p class="lead">Muchos objetos esperan a sus dueños, y el tuyo podría estar entre ellos. Es el momento de reclamarlos.</p>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="container my-5 py-5">
  <div class="row justify-content-center text-center">
    <div class="col-12 mb-4">
      <h2 class="display-5 fw-bold text-primary">¿Perdiste o encontraste algo?</h2>
      <p class="lead fw-normal text-muted">Únete a miles de personas que han logrado reencontrarse con sus objetos o ayudar a otros a hacerlo.</p>
    </div>
    <div class="col-12 col-md-6 col-lg-5 mb-4 mb-md-0">
      <div class="card bg-light border-0 shadow-sm h-100">
        <div class="card-body d-flex flex-column align-items-center justify-content-center py-5">
          <div class="mb-4">
            <img src="../../assets/img/dinero.png" alt="Reportar Objeto" class="img-fluid" style="max-width: 80px;">
          </div>
          <h3 class="card-title mb-3">Reportar Objeto Perdido</h3>
          <p class="card-text text-muted mb-4">Ayuda a otros a reencontrar sus pertenencias.</p>
          <a href="ObjPerdido.php" class="btn btn-primary btn-lg d-flex align-items-center justify-content-center px-4 py-3" style="font-size: 1rem; font-weight: bold; border-radius: 8px;">
            <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
            Reportar
          </a>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-5">
      <div class="card bg-light border-0 shadow-sm h-100">
        <div class="card-body d-flex flex-column align-items-center justify-content-center py-5">
          <div class="mb-4">
            <img src="../../assets/img/lupa.png" alt="Publicar Objeto" class="img-fluid" style="max-width: 80px;">
          </div>
          <h3 class="card-title mb-3">Publicar Objeto Encontrado</h3>
          <p class="card-text text-muted mb-4">Ayuda a otros a reencontrar sus pertenencias.</p>
          <a href="ObjPerdido.php" class="btn btn-primary btn-lg d-flex align-items-center justify-content-center px-4 py-3" style="font-size: 1rem; font-weight: bold; border-radius: 8px;">
            <i class="bi bi-box-seam me-2 fs-5"></i>
            Publicar
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

  </main>

  <footer class="text-center text-white py-4" style="background-color: #333;">
    <div class="container">
      <p class="mb-0">&copy; 2025 Dolphin Telecommunication. Todos los derechos reservados.</p>
      <p class="mb-0">Síguenos en:</p>
      <div>
        <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
        <a href="#" class="text-white me-3"><i class="bi bi-twitter"></i></a>
        <a href="#" class="text-white"><i class="bi bi-instagram"></i></a>
      </div>
    </div>
  </footer>

  <script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>