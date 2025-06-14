<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Objetos Perdidos</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel/">
    <link rel="icon" href="../../assets/img/logoOP.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

  /*style de registros*/
  :root {
            --primary-color: #2f4f7f;
            --secondary-color: #f7f7f7;
            --terciary-color: #45a0e6;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--secondary-color);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
        }

        .header {
            width: 100%;
            background-color: var(--primary-color);
            padding: 10px 0;
            color: var(--secondary-color);
            text-align: center;
        }

        .header img {
            width: 40px;
            vertical-align: middle;
            margin-right: 10px;
        }

        .header a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 16px;
        }

        .container {
            width: 400px;
            background-color: var(--terciary-color);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            margin-top: 20px;
        }

        .form-container {
            background-color: var(--secondary-color);
            padding: 20px;
            border-radius: 10px;
        }

        h2 {
            color: var(--secondary-color);
            background-color: var(--primary-color);
            padding: 10px;
            border-radius: 25px;
            margin: -40px auto 20px;
            width: 70%;
            font-size: 18px;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            color: var(--primary-color);
            font-size: 14px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid var(--primary-color);
            border-radius: 5px;
            font-size: 14px;
        }

        .forgot-password {
            text-align: left;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .forgot-password a {
            color: var(--terciary-color);
            text-decoration: none;
        }

        .submit-btn {
            background-color: var(--terciary-color);
            color: var(--secondary-color);
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
        }

        .submit-btn:hover {
            background-color: var(--primary-color);
        }

        .login-options {
            font-size: 14px;
            color: var(--primary-color);
            margin: 10px 0;
        }

        .social-login {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 10px;
        }

        .social-login img {
            width: 40px;
            cursor: pointer;
        }

        .footer {
            margin-top: 20px;
            color: var(--primary-color);
            font-size: 14px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .footer a {
            color: var(--primary-color);
            text-decoration: none;
        }
</style>

    
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>
   

    
    <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="index.php">
          <img src="../../assets/img/logoOP.png" alt="" style="width: 30px; height: 30px; margin-right: 10px;">
          <span class="font-weight-bold">Objetos Perdidos</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../../index.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Nosotros.php">Nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Contacto.php">Contacto</a>
            </li>
            
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
               <li class="nav-item">
              <a class="nav-link " href="login.php">Iniciar sesión</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Registrate</a>
            </li>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
<hr class="featurette-divider">
<hr class="featurette-divider">
<hr class="featurette-divider">


<body>

    
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <p style="color: var(--secondary-color);">¿Es tu primera vez? <a href="register.php" style="color: rgba(61, 0, 141, 0.862);">Regístrate</a></p>
        <div class="form-container">
        <form action="../../Programas/verificarLogin.php" method="POST">
    <label for="email">Correo electrónico:</label>
    <input type="email" id="email" name="correo" placeholder="Ingresa tu correo electrónico..." required>

    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="contraseña" placeholder="Ingresa tu contraseña..." required>

    <div class="forgot-password">
        <a href="ForwardPasss.php">¿Olvidaste tu contraseña? Recuperar contraseña</a>
    </div>

    <button type="submit" class="submit-btn">Iniciar Sesión</button>
                <div class="login-options">
                    O ingresa con
                </div>
                <div class="social-login">
                <a href="/register-facebook" class="btn btn-outline-primary d-flex align-items-center gap-2"><i class="bi bi-facebook"></i>Facebook</a>
                <a href="/register-google" class="btn btn-outline-danger d-flex align-items-center gap-2"><i class="bi bi-google"></i>Google</a>
              </div>
            </form>
        </div>
       
    </div>
</body>
    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <div class="footer">
            <a href="#">X</a>
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
            <a href="#">LinkedIn</a>
        </div>
</main>
<script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
