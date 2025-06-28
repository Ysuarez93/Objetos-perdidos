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
    <title>Dashboard</title>
    <link rel="icon" href="../../assets/img/logoOP.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../assets/dist/css/styless.css">
    
</head>
<body>
    <header class="navbar">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="dashboard.php">
          <img src="../../assets/img/logoOP.png" alt="" style="width: 30px; height: 30px; margin-right: 10px;">
          <span class="font-weight-bold">Objetos Perdidos</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="dashboard.php"></a>
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
                <li><a class="dropdown-item" href="../Registros/perfil.php"> Ver Perfil</a></li>
                <li><a class="dropdown-item" href="../Registros/editar_perfil.php">Configuración</a></li>
                <li><a class="dropdown-item" href="../Registros/ObjPerdido.php">Publicar</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../index.php">Cerrar sesión</a></li>

              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    </header>

    <!-- Barra lateral -->
    <aside class="sidebar">
        <input type="text" placeholder="Buscar Objetos...">
        <nav class="menu">
            <a href="#">Dashboard</a>
            <a href="#">Items</a>
    
            <!-- Menú desplegable de Reports -->
            <style>
                /* Ocultar los menús por defecto */
                .dropdown-content, .submenu-content {
                    display: none;
                }
                
                /* Mostrar cuando se hace hover o se activa */
                .dropdown:hover .dropdown-content,
                .submenu:hover .submenu-content {
                    display: block;
                }
            </style>

            <div class="dropdown">
                <button class="dropdown-btn">Reportes</button>
                <div class="dropdown-content">
                    <!-- Subcategoría Objetos Perdidos -->
                    <div class="submenu">
                        <button class="submenu-btn">Objetos Perdidos</button>
                        <div class="submenu-content">
                            <a href="#">Categoría 1</a>
                            <a href="#">Categoría 2</a>
                            <a href="#">Categoría 3</a>
                        </div>
                    </div>
                    <!-- Subcategoría Objetos Encontrados -->
                    <div class="submenu">
                        <button class="submenu-btn">Objetos Encontrados</button>
                        <div class="submenu-content">
                            <a href="#">Categoría A</a>
                            <a href="#">Categoría B</a>
                            <a href="#">Categoría C</a>
                        </div>
                    </div>
                </div>
            </div>
    
            <a href="#">Settings</a>
        </nav>
    </aside>


    <!-- Contenido principal -->
    <main class="content">
        <!-- Tarjetas de estadísticas -->
        <section class="cards">
            <div class="card blue">
                <p>Objetos Perdidos</p>
                <button>Ver más</button>
            </div>
            <div class="card red">
                <p>Objetos Encontrados</p>
                <button>Ver más</button>
            </div>
            <div class="card green">
                <p>Gestión de Usuarios</p>
                <a href="../Registros/Gestion_Usuarios.php" class="green">Ver más</a>
            </div>

            <div class="card orange">
                <p>Publicaciones</p>
                <a href="../carousel/Publicaciones.php" class="orange">Ver más</a>
            </div>
            <div class="card teal">
                <p>Mensajes</p>
                <button>Ver más</button>
            </div>
            <div class="card green">
                <p>Gestión de Objetos</p>
                <a href="../Registros/gestion_objetos.php" class="green">Ver más</a>
            </div>
        </section>

        <!-- Gráficas y estadísticas -->
        <section class="charts">
            <div class="chart">
                <h3>Objetos perdidos en los últimos meses</h3>
                <div class="chart-container">
                    <canvas id="graficoObjetosPerdidos" width="400" height="200"></canvas>
                </div>
                <script>
                    // Configuración inicial del gráfico
                    const ctx1 = document.getElementById('graficoObjetosPerdidos').getContext('2d');
                    let chart1 = new Chart(ctx1, {
                        type: 'line',
                        data: {
                            labels: [], // Se actualizarán dinámicamente
                            datasets: [{
                                label: 'Objetos perdidos en los últimos meses',
                                data: [],
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                    
                    // Función para actualizar los datos del gráfico
                    async function actualizarGrafico() {
                        const response = await fetch('/api/objetos-perdidos'); // Llama a tu API backend
                        const data = await response.json();
                        
                        // Actualizar los datos y etiquetas del gráfico
                        chart.data.labels = data.labels;
                        chart.data.datasets[0].data = data.values;
                        chart.update();
                    }
                    
                    // Llama a la función al cargar la página y cada cierto tiempo
                    actualizarGrafico();
                    setInterval(actualizarGrafico, 30000); // Actualiza cada 30 segundos
                </script>
            </div>
            <div class="info-boxes">
                <div class="info-box">Estadísticas 1</div>
                <div class="info-box">Estadísticas 2</div>
                <div class="info-box">Estadísticas 3</div>
                <div class="info-box">Estadísticas 4</div>
            </div>
            <div class="chart">
                <h3>Objetos encontrados en los últimos meses</h3>
                <div class="chart-container">
                    <canvas id="graficoObjetosPerdidos2" width="400" height="200"></canvas>
                </div>
                <script>
                    // Configuración inicial del gráfico
                    const ctx2 = document.getElementById('graficoObjetosPerdidos2').getContext('2d');
                    let chart2 = new Chart(ctx2, {
                        type: 'line',
                        data: {
                            labels: [], // Se actualizarán dinámicamente
                            datasets: [{
                                label: 'Objetos Encontrados en los últimos meses',
                                data: [],
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                    
                    // Función para actualizar los datos del gráfico
                    async function actualizarGrafico() {
                        const response = await fetch('/api/objetos-perdidos'); // Llama a tu API backend
                        const data = await response.json();
                        
                        // Actualizar los datos y etiquetas del gráfico
                        chart.data.labels = data.labels;
                        chart.data.datasets[0].data = data.values;
                        chart.update();
                    }
                    
                    // Llama a la función al cargar la página y cada cierto tiempo
                    actualizarGrafico();
                    setInterval(actualizarGrafico, 30000); // Actualiza cada 30 segundos
                    </script>

            </div>
            <div class="info-boxes">
                <div class="info-box">Estadísticas 5</div>
                <div class="info-box">Estadísticas 6</div>
                <div class="info-box">Estadísticas 7</div>
                <div class="info-box">Estadísticas 8</div>
            </div>
        </section>
    </main>

 <!-- Pie de página -->
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

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/script.js"></script>  
   
</body>

</html>