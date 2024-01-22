<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Detalles del Artículo</title>
</head>
<body class="bg-gray-100">
<nav class="flex items-center justify-between bg-white">
    <!-- Logo -->
    <div class="flex items-center ">
        <a href="/"><div class="flex-shrink-0">
            <img src="<?= base_url('uploads/logo.png') ?>" alt="Logo" class="h-12 w-full">
        </div></a>
    </div>

    <!-- Enlaces del menú -->
    <div class="flex items-center space-x-4 pr-4">
        <a href="/" class="text-black hover:text-gray-300">Artículos</a>
        <a href="/juego" class="text-black hover:text-gray-300">Juego</a>
        <a href="/admin" class="text-black hover:text-gray-300">Admin</a>
    </div>
</nav>

    <div class="container mx-auto my-8">
        <!-- Encabezado del Artículo -->
        <div class="text-center">
            <h1 class="text-3xl font-bold mb-2"><?= esc($articulo['title']) ?></h1>
            <img src="<?= base_url('uploads/' . esc($articulo['portrait'])) ?>" alt="Imagen de Thumbnail" class="mx-auto my-4 rounded-md shadow-md">
        </div>

        <!-- Información Adicional -->
        <div class="flex justify-center mb-6">
            <div class="text-center mx-4">
                <h2 class="text-lg font-semibold mb-2">Palabras Clave</h2>
                <p class="text-gray-600"><?= esc($articulo['keyword']) ?></p>
            </div>

            <div class="text-center mx-4">
                <h2 class="text-lg font-semibold mb-2">Edad Mínima</h2>
                <p class="text-gray-600"><?= esc($articulo['minage']) ?> años</p>
            </div>

            <div class="text-center mx-4">
                <h2 class="text-lg font-semibold mb-2">Edad Máxima</h2>
                <p class="text-gray-600"><?= esc($articulo['maxage']) ?> años</p>
            </div>
        </div>

        <!-- Contenido del Artículo -->
        <div class="bg-white p-6 rounded-md shadow-md">
            <h2 class="text-xl font-bold mb-4">Contenido del Artículo</h2>
            <p class="text-gray-600"><?= esc($articulo['content']) ?></p>
        </div>
    </div>

</body>
</html>
 