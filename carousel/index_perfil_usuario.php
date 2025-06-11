<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="stylos_perfil_usuario.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <img src="imagenes_pu/logo.png" alt="Logo" class="logo">
            <img src="imagenes_pu/usuario.png" alt="Perfil">
            <h2>Henry Carvajal</h2>

            <!-- Botones con menú desplegable -->
            <div class="dropdown">
                <label for="found-objects">Objetos encontrados</label>
                <select id="found-objects" onchange="fetchObjectDetails(this.value, 'found')">
                    <option value="">Selecciona un objeto</option>
                    <?php foreach ($foundObjects as $object): ?>
                        <option value="<?= $object['id'] ?>"><?= $object['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="dropdown">
                <label for="lost-objects">Objetos perdidos</label>
                <select id="lost-objects" onchange="fetchObjectDetails(this.value, 'lost')">
                    <option value="">Selecciona un objeto</option>
                    <?php foreach ($lostObjects as $object): ?>
                        <option value="<?= $object['id'] ?>"><?= $object['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="user-info">
                <p><strong>Nombre:</strong> Henry Carvajal</p>
                <p><strong>Edad:</strong> 27 años</p>
                <p><strong>Ciudad y país:</strong> Colombia Bogotá D.C</p>
                <p><strong>Correo electrónico:</strong> henrycarvaj@gmail.com</p>
            </div>
            <!-- Contenedor de relación de aspecto -->
            <div class="image-container">
                <img id="dynamic-image" src="imagenes/found1.jpg" alt="Imagen dinámica">
            </div>

            <!-- Sección para mostrar detalles del objeto (ahora dentro de main-content) -->
            <div class="object-details" id="object-details" style="margin-top: 20px;">
                <h3>Detalles del Objeto</h3>
                <p>Seleccione un objeto para ver más detalles.</p>
            </div>
        </div>
    </div>

    <script>
        function fetchObjectDetails(id, type) {
            if (!id) {
                document.getElementById('object-details').innerHTML = '<h3>Detalles del Objeto</h3><p>Seleccione un objeto para ver más detalles.</p>';
                document.getElementById('dynamic-image').src = 'imagenes/default.jpg';
                return;
            }

            fetch(`fetch_object_details.php?id=${id}&type=${type}`)
                .then(response => response.json())
                .then(data => {
                    // Mostrar detalles del objeto
                    document.getElementById('object-details').innerHTML = `
                        <h3>Detalles del Objeto</h3>
                        <p><strong>Categoría:</strong> ${data.categoria}</p>
                        <p><strong>Nombre:</strong> ${data.nombre}</p>
                        <p><strong>Color:</strong> ${data.color}</p>
                        <p><strong>Tamaño:</strong> ${data.tamaño}</p>
                        <p><strong>Descripción:</strong> ${data.descripcion}</p>
                    `;
                    // Cambiar imagen dinámica
                    document.getElementById('dynamic-image').src = data.imagen || 'imagenes/default.jpg';
                })
                .catch(error => console.error('Error al obtener los detalles:', error));
        }
    </script>
</body>
</html>
