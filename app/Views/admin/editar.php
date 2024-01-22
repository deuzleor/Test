<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <title>Editar artículo</title>
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
    <h1 class="text-3xl font-bold mb-6">Editar artículo</h1>

    <!-- Formulario -->
      <form action="<?= base_url('articulos/actualizar/' . $articulo['id']) ?>" method="post" enctype="multipart/form-data" class="bg-white p-8 rounded-md shadow-md">

      <!-- ID del Artículo -->
      <input type="hidden" id="edit-id" name="id" value="<?= esc($articulo['id']) ?>">

      <!-- Título del Artículo -->
      <div class="mb-4">
        <label for="title" class="block text-sm font-semibold mb-2">Título del Artículo</label>
        <input type="text" id="title" name="title" value="<?= esc($articulo['title']) ?>" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" maxlength="150" pattern="[a-zA-Z0-9.!?¿¡ ]+" required>
      </div>

      <!-- Palabras Clave -->
      <div class="mb-4">
        <label for="keyword" class="block text-sm font-semibold mb-2">Palabras Clave</label>
        <textarea id="keyword" name="keyword" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" maxlength="200" pattern="[a-zA-Z0-9.!?¿¡/\- ]+" required><?= esc($articulo['keyword']) ?></textarea>
      </div>

      <!-- Edad Mínima y Máxima -->
      <div class="grid grid-cols-2 gap-4 mb-4">
        <div>
          <label for="minage" class="block text-sm font-semibold mb-2">Edad Mínima</label>
          <input type="text" id="minage" name="minage" value="<?= esc($articulo['minage']) ?>" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" pattern="[0-9]+" required>
        </div>
        <div>
          <label for="maxage" class="block text-sm font-semibold mb-2">Edad Máxima</label>
          <input type="text" id="maxage" name="maxage" value="<?= esc($articulo['maxage']) ?>" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" pattern="[0-9]+" required>
        </div>
      </div>

      <!-- Imagen de Portada y Thumbnail -->
      <div class="grid grid-cols-2 gap-4 mb-4">
        <div>
          <label for="portrait" class="block text-sm font-semibold mb-2">Imagen de Portada</label>
          <input type="file" id="portrait" name="portrait" accept="image/*" class="w-full">
        </div>
        <div>
          <label for="thumbnail" class="block text-sm font-semibold mb-2">Imagen Thumbnail</label>
          <input type="file" id="thumbnail" name="thumbnail" accept="image/*" class="w-full">
        </div>
      </div>

      <!-- Síntesis del Artículo -->
      <div class="mb-4">
        <label for="synthesis" class="block text-sm font-semibold mb-2">Síntesis del Artículo</label>
        <textarea id="synthesis" name="synthesis" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" maxlength="200" pattern="[a-zA-Z0-9.!?¿¡/\- ]+" required><?= esc($articulo['synthesis']) ?></textarea>
      </div>

      <!-- Contenido del Artículo -->
      <div class="mb-4">
        <label for="content" class="block text-sm font-semibold mb-2">Contenido del Artículo</label>
        <textarea id="content" name="content" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required><?= esc($articulo['content']) ?></textarea>
      </div>

      <!-- Botón de Envío -->
      <div class="text-center">
        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">Guardar cambios</button>
      </div>
    </form>
  </div>

</body>
</html>
