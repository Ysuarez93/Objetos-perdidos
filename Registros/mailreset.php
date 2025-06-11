<?php
include 'BD.php'; // Conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Verificar si el email existe en la base de datos
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Generar token y guardarlo en la tabla
        $token = bin2hex(random_bytes(50));
        $stmt = $conn->prepare("INSERT INTO password_resets (email, token) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $token);
        $stmt->execute();

        // Enviar correo con el enlace
        $reset_link = "http://yourdomain.com/reset_password.php?token=$token";
        $subject = "Restablecimiento de contraseña";
        $message = "Haz clic en el siguiente enlace para restablecer tu contraseña: $reset_link";
        $headers = "From: no-reply@yourdomain.com";

        mail($email, $subject, $message, $headers);

        echo "Correo enviado para restablecer la contraseña.";
    } else {
        echo "El correo electrónico no está registrado.";
    }
}
?>
