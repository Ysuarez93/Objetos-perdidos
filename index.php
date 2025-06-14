<!DOCTYPE html>
<html lang="es" data-bs-theme="auto">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Objetos Perdidos">
  <title>Objetos Perdidos</title>
  <link rel="icon" href="assets/img/logoOP.png" type="image/x-icon">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      color: #333;
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
        <a class="navbar-brand d-flex align-items-center" href="index.php">
          <img src="assets/img/logoOP.png" alt="" style="width: 30px; height: 30px; margin-right: 10px;">
          <span class="font-weight-bold">Objetos Perdidos</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="vistas/general/Nosotros.php">Nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="vistas/general/Contacto.php">Contacto</a>
            </li>
            
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
               <li class="nav-item">
              <a class="nav-link " href="vistas/general/login.php">Iniciar sesión</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="vistas/general/register.php/register.php">Registrate</a>
            </li>
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
          <img src="assets/img/img13.jpg" alt="Imagen 1" class="d-block w-100" style="height: 500px; object-fit: cover;">
          <div class="container">
            <div class="carousel-caption text-start" style="bottom: 150px;">
              <h1 class="display-4 fw-bold">¡BIENVENIDO!</h1>
              <p class="lead">¿Buscas algo perdido o encontraste algo ajeno? Estás en el lugar correcto.</p>
              <p><a class="btn btn-lg btn-primary" href="vistas/general/register.php">Regístrese Hoy</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="assets/img/img20.jpg" alt="Imagen 2" class="d-block w-100" style="height: 500px; object-fit: cover;">
          <div class="container">
            <div class="carousel-caption text-white" style="top: 10%; left: 50%; transform: translateX(-10%);">
              <h1 class="fw-bold" style="font-size: 2.5rem;">Miles de objetos perdidos han vuelto a sus dueños</h1>
              <p class="lead" style="font-size: 1rem;">Cada día, personas como tú se reencuentran con sus objetos perdidos gracias a nuestra plataforma</p>
              <p><a class="btn btn-lg btn-primary" href="#photoCarousel">Compruébalo Aquí</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="assets/img/img12.jpg" alt="Imagen 3" class="d-block w-100" style="height: 500px; object-fit: cover;">
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
    <br>
    <div class="container marketing">
      <div class="row">
        <div class="col-lg-4 text-center">
          <img src="assets/img/proteger.png" alt="Imagen 1" class="" style="width: 100px; height: 100px; object-fit: cover;">
          <h2 class="fw-bold">Seguridad y Confidencialidad</h2>
          <p>La plataforma permite una recuperación de objetos segura, resguardando la privacidad y verificando la identidad de quienes reclaman pertenencias.</p>
        </div>
        <div class="col-lg-4 text-center">
          <img src="assets/img/aumento.png" alt="Imagen 2" class="" style="width: 100px; height: 100px; object-fit: cover;">
          <h2 class="fw-bold">Aumento de Posibilidades de Recuperación</h2>
          <p>Con una comunidad activa, tienes mayores probabilidades de que alguien vea tu anuncio y te ayude a recuperar tu objeto perdido.</p>
        </div>
        <div class="col-lg-4 text-center">
          <img src="assets/img/promocion.png" alt="Imagen 3" class="" style="width: 100px; height: 100px; object-fit: cover;">
          <h2 class="fw-bold">Facilidad de Comunicación</h2>
          <p>Facilita el contacto seguro entre quienes encuentran y pierden objetos, evitando intermediarios y mejorando la eficiencia del proceso.</p>
        </div>
      </div>
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
            <img src="assets/img/dinero.png" alt="Reportar Objeto" class="img-fluid" style="max-width: 80px;">
          </div>
          <h3 class="card-title mb-3">Reportar Objeto Perdido</h3>
          <p class="card-text text-muted mb-4">Ayuda a otros a reencontrar sus pertenencias.</p>
          <a href="vistas/general/register.php" class="btn btn-primary btn-lg d-flex align-items-center justify-content-center px-4 py-3" style="font-size: 1rem; font-weight: bold; border-radius: 8px;">
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
            <img src="assets/img/lupa.png" alt="Publicar Objeto" class="img-fluid" style="max-width: 80px;">
          </div>
          <h3 class="card-title mb-3">Publicar Objeto Encontrado</h3>
          <p class="card-text text-muted mb-4">Ayuda a otros a reencontrar sus pertenencias.</p>
          <a href="vistas/general/register.php" class="btn btn-primary btn-lg d-flex align-items-center justify-content-center px-4 py-3" style="font-size: 1rem; font-weight: bold; border-radius: 8px;">
            <i class="bi bi-box-seam me-2 fs-5"></i>
            Publicar
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

  <div class="container marketing py-5">
    <div class="row featurette align-items-center">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-bold mb-4">¿Cómo Funciona?</h2>
        <p class="lead mb-4">Nuestra plataforma hace fácil y rápido el proceso de reencuentro con tus objetos perdidos en solo tres pasos:</p>
        
        <ul class="list-unstyled">
          <li class="mb-3">
            <h4 class="fw-bold mb-1">1. Regístrate</h4>
            <p>Abre tu cuenta para acceder a todas nuestras herramientas de búsqueda y publicación.</p>
          </li>
          <li class="mb-3">
            <h4 class="fw-bold mb-1">2. Publica o Busca</h4>
            <p>Utiliza nuestra plataforma para registrar o buscar objetos extraviados fácilmente.</p>
          </li>
          <li class="mb-3">
            <h4 class="fw-bold mb-1">3. Recupera tu objeto</h4>
            <p>¡Conéctate con quien encontró tu objeto y recupéralo sin complicaciones!</p>
          </li>
        </ul>

        <p class="mt-4"><a class="btn btn-lg btn-primary" href="#">Comienza ahora</a></p>
      </div>

      <div class="col-md-5">
        <img src="assets/img/img10.jpg" alt="Proceso de recuperación de objetos" 
            class="featurette-image img-fluid mx-auto rounded-3 shadow-sm" 
            style="width: 100%; max-width: 450px; height: auto; object-fit: cover;">
      </div>
    </div>
  </div>

  <br>


    <div class="container my-5">
      <h2 class="text-center mb-4 fw-bold" style="color: #333;">Calificaciones De Nuestros Usuarios</h2>
      <div id="photoCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-4">
                <img src="assets/img/a.png" class="d-block w-100 rounded-3 shadow-sm" style="height: 350px; object-fit: cover;" alt="Foto 1">
              </div>
              <div class="col-4">
                <img src="assets/img/b.png" class="d-block w-100 rounded-3 shadow-sm" style="height: 350px; object-fit: cover;" alt="Foto 2">
              </div>
              <div class="col-4">
                <img src="assets/img/c.png" class="d-block w-100 rounded-3 shadow-sm" style="height: 350px; object-fit: cover;" alt="Foto 3">
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-4">
                <img src="assets/img/d.png" class="d-block w-100 rounded-3 shadow-sm" style="height: 350px; object-fit: cover;" alt="Foto 4">
              </div>
              <div class="col-4">
                <img src="assets/img/e.png" class="d-block w-100 rounded-3 shadow-sm" style="height: 350px; object-fit: cover;" alt="Foto 5">
              </div>
              <div class="col-4">
                <img src="assets/img/f.png" class="d-block w-100
                rounded-3 shadow-sm" style="height: 350px; object-fit: cover;" alt="Foto 6">
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#photoCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#photoCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </main>

  <footer class="text-center text-white py-4" style="background-color: #333;">
    <div class="container">
      <p class="mb-0">&copy; 2025 Desarrollado Por Dolphin Telecommunication. Todos los derechos reservados.</p>
      <p class="mb-0">Síguenos en:</p>
      <div>
        <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
        <a href="#" class="text-white me-3"><i class="bi bi-twitter"></i></a>
        <a href="#" class="text-white"><i class="bi bi-instagram"></i></a>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

