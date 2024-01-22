<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.tiny.cloud/1/501dei7i9bvkqmt7cfqiyayqgvvyhqswfdvfkf58xifejnml/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
  <title>Crear Nuevo Artículo</title>
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

<?php if (session('errors')): ?>
    <div style="background: mistyrose;
    padding: 15px;
    border-radius: 5px;
    color: red;
    margin: 15px auto;
    max-width: 800px;">
      <p><b>Todos los campos son requeridos</b></p>
      <ul style="list-style: circle; padding-left:20px;">
        <?php foreach (session('errors') as $error): ?>
          <li>
            <?= $error ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>
  <div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold mb-6">Crear Nuevo Artículo</h1>

    <!-- Formulario -->
    <form action="/articulos/nuevoArticulo" method="post" enctype="multipart/form-data" class="bg-white p-8 rounded-md shadow-md" >
      <!-- Título del Artículo -->
      <div class="mb-4">
        <label for="title" class="block text-sm font-semibold mb-2">Título del Artículo</label>
        <input type="text" id="title" name="title" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" maxlength="150" >
      </div>

      <!-- Palabras Clave -->
      <div class="mb-4">
        <label for="keyword" class="block text-sm font-semibold mb-2">Palabras Clave</label>
        <textarea id="keyword" name="keyword" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" maxlength="200" ></textarea>
      </div>

      <!-- Edad Mínima y Máxima -->
      <div class="grid grid-cols-2 gap-4 mb-4">
        <div>
          <label for="minage" class="block text-sm font-semibold mb-2">Edad Mínima</label>
          <input type="text" id="minage" name="minage" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" pattern="[0-9]+" >
        </div>
        <div>
          <label for="maxage" class="block text-sm font-semibold mb-2">Edad Máxima</label>
          <input type="text" id="maxage" name="maxage" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" pattern="[0-9]+" >
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
        <textarea id="synthesis" name="synthesis" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" maxlength="200" ></textarea>
      </div>

      <!-- Contenido del Artículo -->
      <div class="mb-4">
      <label for="content" class="block text-sm font-semibold mb-2">Contenido del Artículo</label>
      <textarea id="content" name="content" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" ></textarea>
      </div>

      <!-- Botón de Envío -->
      <div class="text-center">
        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">Crear Artículo</button>
      </div>
    </form>
  </div>

  <script>
        tinymce.init({
            selector: '#content',
            menubar: false,  // Desactiva la barra de menú
            toolbar: 'bold italic | alignleft aligncenter alignright alignjustify | bullist numlist',
        });
  </script>
</body>
</html>
