<?php
session_start(); // Asegúrate de iniciar la sesión

// Verifica si el usuario está logueado
if (isset($_SESSION['nombre'])) {
    $Nombre_de_Usuario = $_SESSION['nombre'];
} else {
    $Nombre_de_Usuario = null; // Si no hay sesión, el usuario es visitante
}
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Objetos Perdidos</title>

    <link rel="icon" href="../assets/img/logoOP.png" type="image/x-icon">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
  .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
  }

  @media (min-width: 768px) {
      .bd-placeholder-img-lg {
          font-size: 3.5rem;
      }
  }

  .b-example-divider {
      width: 100%;
      height: 3rem;
      background-color: var(--primary-color, rgba(0, 0, 0, .1));
      border: solid var(--primary-color, rgba(0, 0, 0, .15));
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em var(--primary-color, rgba(0, 0, 0, .1)), inset 0 .125em .5em var(--primary-color, rgba(0, 0, 0, .15));
  }

  .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
  }

  .bi {
      vertical-align: -.125em;
      fill: var(--primary-color);
  }

  .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
  }

  .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
  }

  .btn-bd-primary {
      --bd-violet-bg: var(--primary-color);
      --bd-violet-rgb: 47, 79, 127;

      --bs-btn-font-weight: 600;
      --bs-btn-color: var(--secondary-color);
      --bs-btn-bg: var(--primary-color);
      --bs-btn-border-color: var(--primary-color);
      --bs-btn-hover-color: var(--secondary-color);
      --bs-btn-hover-bg: var(--terciary-color);
      --bs-btn-hover-border-color: var(--terciary-color);
      --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
      --bs-btn-active-color: var(--secondary-color);
      --bs-btn-active-bg: var(--primary-color);
      --bs-btn-active-border-color: var(--primary-color);
  }

  .bd-mode-toggle {
      z-index: 1500;
  }

  .bd-mode-toggle .dropdown-menu .active .bi {
      display: block !important;
  }
</style>
</head>
<body>
<header>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="Bienvenida.php">
          <img src="../assets/img/logoOP.png" alt="" style="width: 30px; height: 30px; margin-right: 10px;">
          <span class="font-weight-bold">Objetos Perdidos</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../carousel/Bienvenida.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="publicaciones.php">Publicaciones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../carousel/Nosotros-login.php">Nosotros</a>
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
  </header>
<main>
</body>

</body>
<!-- Contact Form -->
<hr class="featurette-divider">
<hr class="featurette-divider">
<hr class="featurette-divider">
<div class="container mt-5">
        <h2>Formulario de Contacto</h2>
        <form id="contactForm">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" required>
                <div class="invalid-feedback">
                    Por favor ingresa tu nombre.
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" required>
                <div class="invalid-feedback">
                    Por favor ingresa un correo válido.
                </div>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Mensaje</label>
                <textarea class="form-control" id="message" rows="3" required></textarea>
                <div class="invalid-feedback">
                    Por favor ingresa tu mensaje.
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <hr class="featurette-divider">
        <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d218386.75416033797!2d-74.27262326179653!3d4.648620639769177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9bfd2da6cb29%3A0x239d635520a33914!2zQm9nb3TDoQ!5e1!3m2!1ses-419!2sco!4v1730418677850!5m2!1ses-419!2sco" 
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-6">
                <h3>Información de Contacto</h3>
                <p><i class="bi bi-telephone"></i> +57 123 456 7890</p>
                <p><i class="bi bi-envelope"></i> contacto@ejemplo.com</p>
                <p><i class="bi bi-geo-alt"></i> Avenida Jaguares, 37-24</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <hr class="featurette-divider">
  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end">
      <a href="#">
          <img src="/assets/img/arriba.png" alt="Ir Arriba" style="width: 30px; height: 30px;">
      </a>
  </p>
    <p>&copy;2025 Objetos Perdidos, Inc. &middot; <a href="#">Privacidad</a> &middot; <a href="#">Terminos</a></p>
  </footer>
</main>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script>
        // Ejemplo de validación del formulario
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })();
    </script>
    </body>
</html>
