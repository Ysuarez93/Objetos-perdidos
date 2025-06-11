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
// Configuración de conexión a la base de datos
$host = 'localhost';
$db = 'objetosperdidos';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}

// Consulta para obtener los objetos
$sql = "SELECT id, categoria, nombre, color, tamaño, descripcion, fecha_registro FROM objetos_perdidos";
$statement = $pdo->prepare($sql);
$statement->execute();
$objetos = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Objetos Perdidos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<header>
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
<br>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Gestión de Objetos Perdidos</h1>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Categoría</th>
                    <th>Nombre</th>
                    <th>Color</th>
                    <th>Tamaño</th>
                    <th>Descripción</th>
                    <th>Fecha de Registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($objetos)): ?>
                    <?php foreach ($objetos as $objeto): ?>
                        <tr>
                            <td><?= htmlspecialchars($objeto['categoria']) ?></td>
                            <td><?= htmlspecialchars($objeto['nombre']) ?></td>
                            <td><?= htmlspecialchars($objeto['color']) ?></td>
                            <td><?= htmlspecialchars($objeto['tamaño']) ?></td>
                            <td><?= htmlspecialchars($objeto['descripcion']) ?></td>
                            <td><?= htmlspecialchars($objeto['fecha_registro']) ?></td>
                            <td>
                                <a href="editar_objeto.php?id=<?= $objeto['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="eliminar_objeto.php?id=<?= $objeto['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este objeto?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">No hay objetos registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
