<?php
include 'BD.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario = $_POST['ID_usuario'];
    $nuevo_estado = $_POST['nuevo_estado'];

    $query = "UPDATE usuario SET estado = '$nuevo_estado' WHERE ID_usuario = $id_usuario";
    if (mysqli_query($conexion, $query)) {
        header('Location: Gestion_Usuarios.php?mensaje=estado_actualizado');
    } else {
        echo "Error al actualizar el estado: " . mysqli_error($conexion);
    }
}
?>
