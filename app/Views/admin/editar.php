<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <title>Editar artículo</title>
</head>
<body class="bg-gray-100">

  <div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold mb-6">Editar artículo</h1>

    <!-- Formulario -->
    <form action="/articulos/editarArticulo" method="post" enctype="multipart/form-data" class="bg-white p-8 rounded-md shadow-md" >
    <input type="hidden" name="id" value="<?= $articulo['id'] ?>">
      <!-- Título del Artículo -->
      <div class="mb-4">
        <label for="title" class="block text-sm font-semibold mb-2">Título del Artículo</label>
        <input type="text" id="title" name="title" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" maxlength="150" pattern="[a-zA-Z0-9.!?¿¡ ]+" required>
      </div>

      <!-- Palabras Clave -->
      <div class="mb-4">
        <label for="keyword" class="block text-sm font-semibold mb-2">Palabras Clave</label>
        <textarea id="keyword" name="keyword" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" maxlength="200" pattern="[a-zA-Z0-9.!?¿¡/\- ]+" required></textarea>
      </div>

      <!-- Edad Mínima y Máxima -->
      <div class="grid grid-cols-2 gap-4 mb-4">
        <div>
          <label for="minage" class="block text-sm font-semibold mb-2">Edad Mínima</label>
          <input type="text" id="minage" name="minage" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" pattern="[0-9]+" required>
        </div>
        <div>
          <label for="maxage" class="block text-sm font-semibold mb-2">Edad Máxima</label>
          <input type="text" id="maxage" name="maxage" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" pattern="[0-9]+" required>
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
        <textarea id="synthesis" name="synthesis" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" maxlength="200" pattern="[a-zA-Z0-9.!?¿¡/\- ]+" required></textarea>
      </div>

      <!-- Botón de Envío -->
      <div class="text-center">
        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">Crear Artículo</button>
      </div>
    </form>
  </div>
</body>
</html>
