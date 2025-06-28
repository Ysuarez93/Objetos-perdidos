<?php
session_start();
include 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Procesando Login</title>
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .swal2-popup {
            border-radius: 15px !important;
            font-family: Arial, sans-serif !important;
        }
        .swal2-title {
            font-size: 1.8em !important;
            font-weight: 600 !important;
        }
        .swal2-confirm {
            padding: 12px 25px !important;
            font-size: 1.1em !important;
            border-radius: 8px !important;
        }
    </style>
</head>
<body>
<?php
$Correo = $_POST['correo'];
$Contrasena = $_POST['contraseña'];

$sql = "SELECT * FROM usuario WHERE correo = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $Correo);
$stmt->execute();
$result = $stmt->get_result();

$_SESSION['confirmado'] = false;

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if ($user['estado'] !== 'activo') {
        ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Acceso Restringido',
                html: `<div style="font-size: 1.1em;">
                        Tu cuenta está <b>inactiva</b>.<br>
                        Por favor, contacta al administrador para más información.
                       </div>`,
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#d33',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                },
                background: '#fff',
                backdrop: `rgba(220,53,69,0.1) left top no-repeat`,
                showCloseButton: true,
                focusConfirm: false,
                allowOutsideClick: false
            }).then(() => {
                window.location.href = 'login.php';
            });
        </script>
        <?php
        exit();
    }

    if ($Contrasena == $user['Contraseña']) {
        $_SESSION['nombre'] = $user['Nombre_de_Usuario'];
        $_SESSION['correo'] = $user['Correo'];
        $_SESSION["user_id"] = $user["ID_usuario"];
        $_SESSION["user_rol"] = $user["ID_rol"];
        $_SESSION['confirmado'] = true;

        $redirect_url = ($_SESSION["user_rol"] == 2) ? '../vistas/usuario/Bienvenida.php' : '../vistas/administrador/Dashboard.php';
        ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Bienvenido!',
                html: `<div style="font-size: 1.2em; margin-top: 10px;">
                        Hola <b><?php echo $user['Nombre_de_Usuario']; ?></b><br>
                        Has iniciado sesión correctamente
                      </div>`,
                iconColor: '#4CAF50',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                background: '#fff',
                backdrop: `rgba(0,123,255,0.1) left top no-repeat`,
                customClass: {
                    popup: 'animated zoomIn'
                },
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            }).then(() => {
                window.location.href = '<?php echo $redirect_url; ?>';
            });
        </script>
        <?php
    } else {
        ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Acceso Denegado',
                html: '<div style="font-size: 1.1em;">La contraseña ingresada es incorrecta</div>',
                confirmButtonText: 'Intentar nuevamente',
                confirmButtonColor: '#3085d6',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                },
                background: '#fff',
                backdrop: `rgba(220,53,69,0.1) left top no-repeat`,
                showCloseButton: true,
                focusConfirm: false,
                allowOutsideClick: false
            }).then(() => {
                window.location.href = 'login.php';
            });
        </script>
        <?php
    }
} else {
    ?>
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Usuario no encontrado',
            html: `<div style="font-size: 1.1em;">
                    El correo <b><?php echo htmlspecialchars($Correo); ?></b><br>
                    no está registrado en nuestro sistema
                   </div>`,
            confirmButtonText: 'Intentar nuevamente',
            confirmButtonColor: '#ffc107',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            },
            background: '#fff',
            backdrop: `rgba(255,193,7,0.1) left top no-repeat`,
            showCloseButton: true,
            focusConfirm: false,
            allowOutsideClick: false
        }).then(() => {
            window.location.href = 'login.php';
        });
    </script>
    <?php
}

$stmt->close();
$conexion->close();
?>
</body>
</html>
