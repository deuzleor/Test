<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Artículos</title>
</head>

<body class="bg-gray-100">
    <nav class="flex items-center justify-between bg-white">
        <!-- Logo -->
        <div class="flex items-center ">
            <a href="/">
                <div class="flex-shrink-0">
                    <img src="<?= base_url('uploads/logo.png') ?>" alt="Logo" class="h-12 w-full">
                </div>
            </a>
        </div>

        <!-- Enlaces del menú -->
        <div class="flex items-center space-x-4 pr-4">
            <a href="/" class="text-black hover:text-gray-300">Artículos</a>
            <a href="/juego" class="text-black hover:text-gray-300">Juego</a>
            <a href="/admin" class="text-black hover:text-gray-300">Admin</a>
        </div>
    </nav>
    <div id="Game">

    </div>

</body>

</html>