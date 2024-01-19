<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <title>Crear Nuevo Artículo</title>
</head>
<body class="bg-gray-100">

  <div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold mb-6">Crear Nuevo Artículo</h1>

    <!-- Formulario -->
    <form class="bg-white p-8 rounded-md shadow-md">
      <!-- Título del Artículo -->
      <div class="mb-4">
        <label for="titulo" class="block text-sm font-semibold mb-2">Título del Artículo</label>
        <input type="text" id="titulo" name="titulo" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" maxlength="150" pattern="[a-zA-Z0-9.!?¿¡ ]+" required>
      </div>

      <!-- Palabras Clave -->
      <div class="mb-4">
        <label for="palabras-clave" class="block text-sm font-semibold mb-2">Palabras Clave</label>
        <textarea id="palabras-clave" name="palabras-clave" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" maxlength="200" pattern="[a-zA-Z0-9.!?¿¡/\- ]+" required></textarea>
      </div>

      <!-- Edad Mínima y Máxima -->
      <div class="grid grid-cols-2 gap-4 mb-4">
        <div>
          <label for="edad-minima" class="block text-sm font-semibold mb-2">Edad Mínima</label>
          <input type="text" id="edad-minima" name="edad-minima" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" pattern="[0-9]+" required>
        </div>
        <div>
          <label for="edad-maxima" class="block text-sm font-semibold mb-2">Edad Máxima</label>
          <input type="text" id="edad-maxima" name="edad-maxima" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" pattern="[0-9]+" required>
        </div>
      </div>

      <!-- Imagen de Portada y Thumbnail -->
      <div class="grid grid-cols-2 gap-4 mb-4">
        <div>
          <label for="imagen-portada" class="block text-sm font-semibold mb-2">Imagen de Portada</label>
          <input type="file" id="imagen-portada" name="imagen-portada" accept="image/*" class="w-full">
        </div>
        <div>
          <label for="imagen-thumbnail" class="block text-sm font-semibold mb-2">Imagen Thumbnail</label>
          <input type="file" id="imagen-thumbnail" name="imagen-thumbnail" accept="image/*" class="w-full">
        </div>
      </div>

      <!-- Síntesis del Artículo -->
      <div class="mb-4">
        <label for="sintesis" class="block text-sm font-semibold mb-2">Síntesis del Artículo</label>
        <textarea id="sintesis" name="sintesis" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" maxlength="200" pattern="[a-zA-Z0-9.!?¿¡/\- ]+" required></textarea>
      </div>

      <!-- Botón de Envío -->
      <div class="text-center">
        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">Crear Artículo</button>
      </div>
    </form>
  </div>

</body>
</html>
