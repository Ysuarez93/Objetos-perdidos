<?php
session_start(); // Asegúrate de iniciar la sesión

// Verifica si el usuario está logueado
if (isset($_SESSION['nombre'])) {
    $Nombre_de_Usuario = $_SESSION['nombre'];
} else {
    $Nombre_de_Usuario = null; // Si no hay sesión, el usuario es visitante
}
?>

<?php
include 'BD.php';

// CRUD: Crear, Actualizar, Borrar
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $id_usuario = $_POST['id_usuario'] ?? null;
    $nombre = $_POST['nombre'] ?? null;
    $correo = $_POST['correo'] ?? null;
    $contraseña = $_POST['contraseña'] ?? null;
    $rol = $_POST['rol'] ?? null;
    $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? null;
    $direccion = $_POST['direccion'] ?? null;
    $telefono = $_POST['telefono'] ?? null;

    if ($action == 'add') {
        $sql = "INSERT INTO usuario (Nombre_de_Usuario, Correo, Contraseña, ID_rol, Fecha_de_Nacimiento, Direccion, Telefono) 
                VALUES ('$nombre', '$correo', '$contraseña', $rol, '$fecha_nacimiento', '$direccion', '$telefono')";
    } elseif ($action == 'edit') {
        $sql = "UPDATE usuario 
                SET Nombre_de_Usuario='$nombre', Correo='$correo', Contraseña='$contraseña', ID_rol=$rol, 
                    Fecha_de_Nacimiento='$fecha_nacimiento', Direccion='$direccion', Telefono='$telefono' 
                WHERE ID_usuario=$id_usuario";
    } elseif ($action == 'delete') {
        $sql = "DELETE FROM usuario WHERE ID_usuario=$id_usuario";
    }

    if ($conexion->query($sql) === TRUE) {
        $msg = "Acción realizada con éxito.";
    } else {
        $msg = "Error: " . $conexion->error;
    }
}
// Obtener usuarios
$sql = "SELECT * FROM usuario";
$result = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Usuarios</title>
    <link rel="icon" href="../assets/img/logoOP.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/dist/css/gustyles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"></style>
   
</head>

<body>

<header class="navbar">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="index.php">
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
              <a class="nav-link" href="../carousel/publicaciones.php">publicaciones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../carousel/dashboard.php">Dashboard</a>
            </li>
            
          </ul>
          <form class="d-flex me-3" role="search">
            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
            <button class="btn btn-outline-light" type="submit">Buscar</button>
          </form>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link " href="#" id="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <p><?php echo htmlspecialchars($Nombre_de_Usuario); ?></p> <!-- Mostrar el nombre del usuario -->
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="perfilDropdown">
                <li><a class="dropdown-item" href="/Registros/perfil.php"> Ver Perfil</a></li>
                <li><a class="dropdown-item" href="/Registros/editar_perfil.php">Configuración</a></li>
                <li><a class="dropdown-item" href="/Registros/ObjPerdido.php">Publicar</a></li>
                <li><a class="dropdown-item" href="/Carousel/dashboard.php">Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../Carousel/index.php">Cerrar sesión</a></li>

              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
</header>


<h1>Gestión de Usuarios</h1>
    <?php if (isset($msg)) {
        echo "<p>$msg</p>";
    } ?>

  <form class="form1" method="post" action="">
    
        <input type="hidden" name="id_usuario" id="id_usuario">
        <label>Nombre: <input type="text" name="nombre" id="nombre" required></label>
        <label>Correo: <input type="email" name="correo" id="correo" required></label>
        <label>Contraseña: <input type="password" name="contraseña" id="contraseña"></label>
        <label>Rol:
            <select name="rol" id="rol">
                <option value="1">Administrador</option>
                <option value="2">Usuario Registrado</option>
            </select>
        </label>
        <label>Fecha de Nacimiento: <input type="date" name="fecha_nacimiento" id="fecha_nacimiento"></label>
        <label>Dirección: <input type="text" name="direccion" id="direccion"></label>
        <label>Teléfono: <input type="text" name="telefono" id="telefono"></label>
        <button type="submit" name="action" value="add">Agregar</button>
        <button type="submit" name="action" value="edit">Actualizar</button>
  </form>


    <h2>Lista de Usuarios</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Fecha de Nacimiento</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Acciones</th>
                <th colspan="2" style="text-align: center;">Estado</th>

            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['ID_usuario']; ?></td>
                    <td><?php echo $row['Nombre_de_Usuario']; ?></td>
                    <td><?php echo $row['Correo']; ?></td>
                    <td><?php echo $row['ID_rol'] == 1 ? 'Administrador' : 'Usuario Registrado'; ?></td>
                    <td><?php echo $row['Fecha_de_Nacimiento']; ?></td>
                    <td><?php echo $row['Direccion']; ?></td>
                    <td><?php echo $row['Telefono']; ?></td>
                    <td>
                        <button onclick="editarUsuario(
                        <?php echo $row['ID_usuario']; ?>, 
                        '<?php echo $row['Nombre_de_Usuario']; ?>', 
                        '<?php echo $row['Correo']; ?>',
                        '<?php echo $row['Contraseña']; ?>',
                        <?php echo $row['ID_rol']; ?>,
                        '<?php echo $row['Fecha_de_Nacimiento']; ?>',
                        '<?php echo $row['Direccion']; ?>',
                        '<?php echo $row['Telefono']; ?>'
                    )">Editar</button>
                        <form method="post" class="Boton" action="" style="display:inline;">
                            <input type="hidden" name="id_usuario" value="<?php echo $row['ID_usuario']; ?>">
                            <button type="submit" name="action" value="delete">Eliminar</button>
                        </form>
                        <td>
                        <span style="color: <?php echo $row['estado'] === 'activo' ? 'green' : 'red'; ?>">
                          <?php echo ucfirst($row['estado']); ?>
                        </span>
                    </td>
                    <td>
                    <form action="Cambiar_Estado.php" method="POST" style="display: inline;">
                    <input type="hidden" name="ID_usuario" value="<?php echo $row['ID_usuario']; ?>">
                    <input type="hidden" name="nuevo_estado" value="<?php echo $row['estado'] === 'activo' ? 'inactivo' : 'activo'; ?>">
                    <button type="submit">
                        <?php echo $row['estado'] === 'activo' ? 'Desactivar' : 'Activar'; ?>
                    </button>
                    </form>
                    </td>
                </tr>
                
            <?php endwhile; ?>
        </tbody>
    </table>



    
    <footer class="text-center text-white py-4" style="background-color: #333;">
    <div class="container">
      <p class="mb-0">&copy; 2024 Dolphin Telecommunication. Todos los derechos reservados.</p>
      <p class="mb-0">Síguenos en:</p>
      <div>
        <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
        <a href="#" class="text-white me-3"><i class="bi bi-twitter"></i></a>
        <a href="#" class="text-white"><i class="bi bi-instagram"></i></a>
      </div>
    </div>
  </footer>

  


    <script>
        function editarUsuario(id, nombre, correo, contraseña, rol, fecha_nacimiento, direccion, telefono) {
            document.getElementById('id_usuario').value = id;
            document.getElementById('nombre').value = nombre;
            document.getElementById('correo').value = correo;
            document.getElementById('contraseña').value = contraseña;
            document.getElementById('rol').value = rol;
            document.getElementById('fecha_nacimiento').value = fecha_nacimiento;
            document.getElementById('direccion').value = direccion;
            document.getElementById('telefono').value = telefono;
        }
    </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>