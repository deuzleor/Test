<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <title>Artículos</title>
  <style>
    .articulo-container {
      transition: transform 0.3s;
    }

    .articulo-container:hover {
      transform: scale(1.05);
    }
  </style>
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
  <div class="container mx-auto my-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- La lista de artículos se mostrará aquí -->
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {

      // Realizar la solicitud al servicio REST de Articulos

      fetch('/articulos/listaArticulosPortada')
        .then(response => response.json())
        .then(articulos => {

          // Actualizar la interfaz con los últimos artículos

          const articulosContainer = document.querySelector('.container');

          articulos.forEach(articulo => {

            // Crear elementos HTML para cada artículo

            const enlaceDetalle = document.createElement('a');
            enlaceDetalle.href = `/articulo/${articulo.id}`;
            enlaceDetalle.style.textDecoration = 'none';

            const articuloDiv = document.createElement('div');
            articuloDiv.classList.add('articulo-container', 'bg-white', 'p-6', 'rounded-md', 'shadow-md', 'mb-4');

            const imagenThumbnail = document.createElement('img');
            imagenThumbnail.classList.add('w-full', 'h-48', 'object-cover', 'mb-4');
            imagenThumbnail.src = `/uploads/${articulo.thumbnail}`;
            imagenThumbnail.alt = articulo.title;

            const titulo = document.createElement('h2');
            titulo.classList.add('text-xl', 'font-bold', 'mb-2');
            titulo.textContent = articulo.title;

            const palabrasClave = document.createElement('p');
            palabrasClave.classList.add('text-gray-600');
            palabrasClave.textContent = `Palabras clave: ${articulo.keyword}`;

            const edad = document.createElement('p');
            edad.classList.add('text-gray-600');
            edad.textContent = `Edad: ${articulo.minage} - ${articulo.maxage} años`;

            const sintesis = document.createElement('p');
            sintesis.classList.add('text-gray-800', 'mb-4');
            sintesis.textContent = articulo.synthesis;

            // Agregar elementos al contenedor principal

            enlaceDetalle.appendChild(imagenThumbnail);
            enlaceDetalle.appendChild(titulo);
            enlaceDetalle.appendChild(edad);
            enlaceDetalle.appendChild(sintesis);
            enlaceDetalle.appendChild(palabrasClave);

            articuloDiv.appendChild(enlaceDetalle);
            articulosContainer.appendChild(articuloDiv);
          });
        })
        .catch(error => console.error('Error al obtener los últimos artículos:', error));
    });
  </script>
</body>

</html>