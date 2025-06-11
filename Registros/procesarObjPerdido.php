<?php
session_start();

// Verificar sesión
if (!isset($_SESSION['nombre'])) {
    echo "No estás logueado.";
    exit();
}

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "objetosperdidos");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Validar datos del formulario
$categoria = $_POST['categoria'] ?? null;
$nombre = $_POST['nombre'] ?? null;
$color = $_POST['color'] ?? null;
$tamaño = $_POST['tamano'] ?? null;
$descripcion = $_POST['descripcion'] ?? null;
$tipo = $_POST['tipo'] ?? null;

// Obtener el máximo ID
$sql = "SELECT MAX(id) AS max_id FROM objetos_perdidos";
$resultado = $conn->query($sql);
$fila = $resultado->fetch_assoc();
$max_id = $fila['max_id'] ?? 0; // Si es NULL, asigna 0
$identificador = $max_id + 1; // Este es el nuevo ID a insertar

// Procesar imagen
$ruta_completa = null;
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $extension = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
    $ruta_destino = "../img/publicaciones/";
    $nombre_imagen = "publicacion-" . $identificador . ".$extension"; // Usar $identificador
    $ruta_completa = $ruta_destino . $nombre_imagen;
    
    if (!move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_completa)) {
        echo "Error al guardar la imagen.";
        exit();
    }
}

$fecha_registro = date('Y-m-d H:i:s');

$estado = "activo";

// Insertar (usando $identificador como ID)
$sql = "INSERT INTO objetos_perdidos (id, categoria, nombre, color, tamaño, descripcion, imagen_ruta, fecha_registro, tipo, estado) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Asume que id es INT. Si no, ajusta el primer parámetro de bind_param.
$stmt->bind_param("isssssssss", $identificador, $categoria, $nombre, $color, $tamaño, $descripcion, $ruta_completa, $fecha_registro, $tipo, $estado);

if ($stmt->execute()) {
    // Registro exitoso - redirigir
    header("Location: ../carousel/publicaciones.php");
    exit(); // Asegura que el script se detenga después de la redirección
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>