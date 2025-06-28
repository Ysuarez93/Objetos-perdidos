<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmtRol = $conexion->prepare("SELECT ID_rol FROM roles WHERE Nombre_rol = 'Usuario'");
    $stmtRol->execute();
    $stmtRol->bind_result($ID_rol);
    $stmtRol->fetch();
    $stmtRol->close();

    // Recibir y validar los datos del formulario
    $ID_Usuario = trim($_POST['id']);
    $Nombre_de_Usuario = trim($_POST['nombre']);
    $Correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
    $Contraseña = $_POST['contraseña'];
    $Direccion = isset($_POST['direccion']) ? trim($_POST['direccion']) : null;
    $fecha_de_Nacimiento = isset($_POST['fechanacimiento']) ? $_POST['fechanacimiento'] : null;
    $fecha_registro = date('Y-m-d H:i:s');
    $Telefono = isset($_POST['telefono']) ? trim($_POST['telefono']) : null;
    
    // Validar correo electrónico
    if (!filter_var($Correo, FILTER_VALIDATE_EMAIL)) {
        echo "El correo electrónico no es válido.";
        exit;
    }

    // Verificar si el ID ya existe
    $sql_check_id = "SELECT COUNT(*) FROM Usuario WHERE ID_Usuario = ?";
    if ($stmt_id_check = $conexion->prepare($sql_check_id)) {
        $stmt_id_check->bind_param("i", $ID_Usuario);
        $stmt_id_check->execute();
        $stmt_id_check->bind_result($id_count);
        $stmt_id_check->fetch();
        $stmt_id_check->close();

        if ($id_count > 0) {
            die("El número de identificación ya está registrado");
        }
    }

    // Verificar si el correo ya está registrado
    $sql_check_email = "SELECT COUNT(*) FROM Usuario WHERE Correo = ?";
    if ($stmt_email_check = $conexion->prepare($sql_check_email)) {
        $stmt_email_check->bind_param("s", $Correo);
        $stmt_email_check->execute();
        $stmt_email_check->bind_result($email_count);
        $stmt_email_check->fetch();
        $stmt_email_check->close();

        if ($email_count > 0) {
            die("El correo electrónico ya está registrado.");
        }
    }

    // Verificar si el nombre de usuario ya existe
    $sql_check_username = "SELECT COUNT(*) FROM Usuario WHERE Nombre_de_Usuario = ?";
    if ($stmt_username_check = $conexion->prepare($sql_check_username)) {
        $stmt_username_check->bind_param("s", $Nombre_de_Usuario);
        $stmt_username_check->execute();
        $stmt_username_check->bind_result($username_count);
        $stmt_username_check->fetch();
        $stmt_username_check->close();

        if ($username_count > 0) {
            die("El nombre de usuario ya está en uso. Por favor elige otro.");
        }
    }

    // Verificar si el ID_rol existe
    $sql_check_role = "SELECT COUNT(*) FROM roles WHERE ID_rol = ?";
    if ($stmt_role_check = $conexion->prepare($sql_check_role)) {
        $stmt_role_check->bind_param("i", $ID_rol);
        $stmt_role_check->execute();
        $stmt_role_check->bind_result($role_count);
        $stmt_role_check->fetch();
        $stmt_role_check->close();

        if ($role_count == 0) {
            echo "El ID de rol no existe.";
            exit;
        }
    }

    $imagen_perfil = "../../img/perfil/predeterminado.jpg";

    // Preparar la consulta SQL para insertar el nuevo usuario
    $sql = "INSERT INTO Usuario (ID_Usuario, ID_rol, Nombre_de_Usuario, Correo, Contraseña, Direccion, Fecha_de_Nacimiento, Fecha_registro, Telefono, imagen_perfil) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conexion->prepare($sql)) {
        // Vincular los parámetros
        $stmt->bind_param("iissssssss", $ID_Usuario, $ID_rol, $Nombre_de_Usuario, $Correo, $Contraseña, $Direccion, $fecha_de_Nacimiento, $fecha_registro, $Telefono, $imagen_perfil);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "<script>
                    alert('¡Registro exitoso! Ahora serás redirigido al inicio de sesión.');
                    window.location.href = '../vistas/general/login.php';
                  </script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conexion->error;
    }

    $conexion->close();
}
?>