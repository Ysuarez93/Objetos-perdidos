<!doctype html>
<html lang="en" data-bs-theme="auto">
<?php
try {
    // Conexión a la base de datos
    $pdo = new PDO('mysql:host=localhost;dbname=ObjetosPerdidos', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Inicializa variables para evitar errores de "undefined array key"
    $ID_Usuario = $Nombre_de_Usuario = $Correo = $Contraseña = $Direccion = $Fecha_de_Nacimiento = $Telefono = null;

    // Solo procesa los datos si el formulario fue enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Datos recibidos desde el formulario
        $ID_Usuario = $_POST['id'] ?? null;
        $Nombre_de_Usuario = $_POST['nombre'] ?? null;
        $Correo = $_POST['correo'] ?? null;
        $Contraseña = $_POST['contraseña'] ?? null;
        $Direccion = $_POST['direccion'] ?? null;
        $Fecha_de_Nacimiento = $_POST['fechanacimiento'] ?? null;
        $Telefono = $_POST['telefono'] ?? null;

        // Validación de campos obligatorios
        if (empty($ID_Usuario) ||empty($Nombre_de_Usuario) || empty($Correo) || empty($Contraseña)) {
            throw new Exception("Por favor, llena todos los campos obligatorios (Identificación, Nombre, Email, Contraseña).");
        }

        // Verifica que el rol 'Usuario' exista en la base de datos
        $stmtRol = $pdo->prepare("SELECT ID_rol FROM roles WHERE Nombre_rol = :nombreRol");
        $stmtRol->execute(['nombreRol' => 'Usuario']); // Rol predeterminado para nuevos usuarios
        $idRol = $stmtRol->fetchColumn();

        if (!$idRol) {
            throw new Exception("No se encontró el rol 'Usuario'. Asegúrate de que exista en la tabla roles.");
        }

        // Encriptar la contraseña
        $passwordHash = password_hash($Contraseña, PASSWORD_DEFAULT);

        //Establecer fecha de registro
        $fecha_actual = date('Y-m-d');

        // Preparar la consulta de inserción
        $stmt = $pdo->prepare(
            "INSERT INTO Usuario 
            (ID_Usuario, ID_rol, Nombre_de_Usuario, Correo, Contraseña, Direccion, Fecha_de_Nacimiento, Fecha_registro, Telefono) 
            VALUES 
            (:id, :idRol, :nombre, :email, :password, :direccion, :fechaNacimiento, :fechaactual, :telefono)"
        );

        // Ejecutar la consulta
        $stmt->execute([
            'id' => $ID_Usuario,
            'idRol' => $idRol, // ID del rol (en este caso, 'Usuario')
            'nombre' => $Nombre_de_Usuario,
            'email' => $Correo,
            'password' => $passwordHash,
            'direccion' => $Direccion,
            'fechaNacimiento' => $Fecha_de_Nacimiento,
            'fechaactual' => $fecha_actual,
            'telefono' => $Telefono,
        ]);

        echo "Usuario registrado exitosamente.";
    }
} catch (PDOException $e) {
    echo "Error en la base de datos: " . $e->getMessage();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

  <head><script src="../../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Objetos Perdidos</title>
    <link rel="icon" href="../../assets/img/logoOP.png" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel/">
    <link rel="icon" href="../../assets/img/logoOP.png" type="image/x-icon">
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
            color: var(--secondary-color);
            text-decoration: none;
            margin: 0 15px;
            font-size: 16px;
        }

        .container {
            width: 550px;
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
        input[type="date"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid var(--primary-color);
            border-radius: 5px;
            font-size: 14px;
        }

        .terms {
            display: flex;
            align-items: center;
            justify-content: left;
            font-size: 14px;
            margin-bottom: 15px;
            color: var(--primary-color);
        }

        .terms input {
            margin-right: 5px;
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
        }

        .submit-btn:hover {
            background-color: var(--primary-color);
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
        .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
  }
  .modal-content {
    text-align: justify;
    font-size: 18px; /* Tamaño de letra aumentado */
    line-height: 1.6; /* Espaciado entre líneas */
    padding: 20px; /* Espaciado interno */
    max-height: 80vh; /* Limitar altura del modal */
    overflow-y: auto; /* Habilitar scroll si el contenido es demasiado largo */
    margin: 100px auto; /* Centrar el cuadro modal verticalmente */
    width: 90%; /* Ajustar el ancho */
    max-width: 1000px; /* Ancho máximo para evitar que sea demasiado ancho */
  }
  .modal-body {
    padding: 10px 20px;
  }

  .modal-footer {
    text-align: center;
    padding-top: 15px;
  }
    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
    }

    .close:hover {
      color: black;
    }

    
  </style>    
    <!-- Custom styles for this template -->
  </head>
  <body>

    <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="../../index.php">
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
        <h2>Regístrate</h2>
        <p style="color: var(--secondary-color);">Ingresa tu información para poder ingresar</p>
        <div class="form-container">
            <form method="POST" action="../../Programas/procesarRegistro.php">
                <label for="id">Numero de Identificación:</label>
                <input type="text" id="id" name="id" placeholder="Ingresa tu Numero de identificación..." required>

                <label for="username">Nombre de usuario:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre de usuario..." required>

                <label for="email">Correo electrónico:</label>
                <input type="email" id="correo" name="correo" placeholder="Ingresa tu correo electrónico..." required>

                <label for="birthdate">Fecha de nacimiento:</label>
                <input type="date" id="fechanacimiento" name="fechanacimiento" required>

                <label for="phone">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" placeholder="Ingresa tu número de teléfono..." required>

                <label for="address">Dirección:</label>
                <input type="text" id="direccion" name="direccion" placeholder="Ingresa tu dirección..." required>

                <label for="password">Contraseña:</label>
                <input type="password" id="contraseña" name="contraseña" placeholder="Escribe una contraseña segura..." required>

                <label for="confirm-password">Confirma la contraseña:</label>
                <input type="password" id="confirmarcontraseña" name="confirm-password" placeholder="Vuelve a escribir la contraseña..." required>

                <div class="terms">
        <input type="checkbox" id="terms" name="terms">
        <label for="terms">Acepto los  <button id="openTerms">Términos y Condiciones</label></button>


    </div>
<!-- Modal de Términos -->
<div id="termsModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    
  <h2>Términos y Condiciones de Uso de "Objetos-Perdidos"</h2>

<h3>1. Aceptación de los Términos</h3>
<p>Al acceder y utilizar la plataforma <strong>"Objetos-Perdidos"</strong> (en adelante, "la plataforma"), el usuario acepta y está de acuerdo en cumplir con los presentes Términos y Condiciones. Si no está de acuerdo con ellos, debe abstenerse de usar la plataforma.</p>

<h3>2. Descripción del Servicio</h3>
<p><strong>"Objetos-Perdidos"</strong> es una plataforma diseñada para facilitar la publicación y búsqueda de anuncios relacionados con objetos perdidos y encontrados. El servicio tiene como objetivo conectar a los usuarios para que puedan recuperar o devolver pertenencias de manera segura y efectiva.</p>

<h3>3. Registro y Uso de la Plataforma</h3>
<ul>
  <li><strong>Registro:</strong> Algunos servicios de la plataforma están disponibles solo para usuarios registrados. El registro requiere información válida y actualizada.</li>
  <li><strong>Responsabilidad del Usuario:</strong> Los usuarios son responsables de la veracidad de la información publicada y deben abstenerse de publicar contenido falso, engañoso o fraudulento.</li>
  <li><strong>Restricciones:</strong> Está prohibido el uso de la plataforma para actividades ilegales, ofensivas o que incumplan estos términos.</li>
</ul>

<h3>4. Publicación de Anuncios</h3>
<ul>
  <li><strong>Contenido:</strong> Los anuncios deben describir con precisión los objetos perdidos o encontrados y proporcionar detalles útiles.</li>
  <li><strong>Prohibiciones:</strong> No se permite publicar contenido que sea ofensivo, difamatorio, discriminatorio o que infrinja derechos de terceros.</li>
  <li><strong>Responsabilidad:</strong> La plataforma no garantiza la exactitud de los anuncios ni se hace responsable de la veracidad del contenido publicado por los usuarios.</li>
</ul>

<h3>5. Privacidad y Datos Personales</h3>
<ul>
  <li><strong>Recolección de Datos:</strong> La plataforma recopila información personal según lo establecido en nuestra <a href="#">Política de Privacidad</a>.</li>
  <li><strong>Uso de Datos:</strong> La información proporcionada será utilizada únicamente para los fines descritos en la plataforma.</li>
  <li><strong>Confidencialidad:</strong> La plataforma no compartirá información personal sin el consentimiento del usuario, salvo en los casos requeridos por la ley.</li>
</ul>

<h3>6. Limitación de Responsabilidad</h3>
<ul>
  <li><strong>Intermediación:</strong> La plataforma actúa como intermediario entre los usuarios y no garantiza la devolución de los objetos.</li>
  <li><strong>Exclusión de Garantías:</strong> No nos hacemos responsables de daños, pérdidas o conflictos derivados del uso de la plataforma.</li>
</ul>

<h3>7. Conducta de los Usuarios</h3>
<ul>
  <li><strong>Buen Uso:</strong> Los usuarios deben utilizar la plataforma de manera respetuosa y acorde con las leyes aplicables.</li>
  <li><strong>Sanciones:</strong> El incumplimiento de estos términos puede resultar en la suspensión o eliminación de la cuenta del usuario.</li>
</ul>

<h3>8. Modificaciones de los Términos</h3>
<p>Nos reservamos el derecho de modificar estos términos en cualquier momento. Las actualizaciones serán notificadas a los usuarios y el uso continuado de la plataforma implicará su aceptación.</p>

<h3>9. Legislación Aplicable</h3>
<p>Estos términos se rigen por las leyes de Colombia. Cualquier disputa será resuelta en los tribunales competentes de Bogotá.</p>

<h3>10. Contacto</h3>
<p>Para consultas o soporte, puede comunicarse con nosotros a través del correo: <a href="mailto:soporte@objetos-perdidos.com">soporte@objetos-perdidos.com</a>.</p>

<!-- Políticas de Privacidad -->

      <br><br>
        <h2>Políticas de Privacidad</h2>
        <p>En <strong>Objetos-Perdidos</strong>, valoramos su privacidad. Estas políticas describen cómo recopilamos, usamos y protegemos su información personal.</p>
        
        <h4>1. Información que Recopilamos</h4>
        <p>Podemos recopilar información personal, como nombre, correo electrónico, y detalles de los objetos que publique en nuestra plataforma.</p>
        
        <h4>2. Uso de la Información</h4>
        <ul>
          <li>Para ofrecerle nuestros servicios de publicación de anuncios.</li>
          <li>Para mejorar nuestra plataforma y ofrecerle una mejor experiencia.</li>
          <li>Para cumplir con requisitos legales.</li>
        </ul>
        
        <h4>3. Protección de la Información</h4>
        <p>Implementamos medidas de seguridad adecuadas para proteger sus datos personales contra accesos no autorizados.</p>
        
        <h4>4. Compartir Información</h4>
        <p>No compartiremos su información con terceros sin su consentimiento, salvo cuando sea necesario por ley.</p>
        
        <h4>5. Sus Derechos</h4>
        <p>Usted tiene derecho a acceder, modificar o eliminar su información personal almacenada en nuestra plataforma. Para ejercer estos derechos, contáctenos en: <a href="mailto:soporte@objetos-perdidos.com">soporte@objetos-perdidos.com</a>.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
      </div>
    </div>  <button type="submit" class="submit-btn">Registrarse</button>
      </form>
  </div>
</div>

  </div>
</div>
              
        </div>
    </div>
  </div>
</body>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="text-center text-white py-4" ">
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
</main>
<script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>
<!-- JavaScript para el Modal -->
<script>
  const modal = document.getElementById("termsModal");
  const btn = document.getElementById("openTerms");
  const span = document.querySelector(".close");
  const acceptBtn = document.querySelector(".modal-footer .btn-primary");

  btn.onclick = function() {
    modal.style.display = "block";
  };

  span.onclick = function() {
    modal.style.display = "none";
  };

  // Agregar evento para el botón Aceptar
  acceptBtn.onclick = function() {
    modal.style.display = "none";
  };

  window.onclick = function(event) {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  };
</script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const termsModal = document.getElementById("termsModal");
    const privacyModal = document.getElementById("privacyPolicyModal");

    if (termsModal && privacyModal) {
      // Al cerrar el modal de términos y condiciones, abrir el de políticas de privacidad
      termsModal.addEventListener("hidden.bs.modal", function () {
        new bootstrap.Modal(privacyModal).show();
      });
    }
  });
</script>
    </body>
</html>
