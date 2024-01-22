<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Admin</title>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto my-8">
        <!-- Título de la Página -->
        <h1 class="text-4xl font-bold mb-4">Admin</h1>

        <!-- Texto Descriptivo -->
        <p class="mb-6">Listado de artículos</p>

        <!-- Listado de Artículos -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-6">
            <div class="col-span-1 md:col-span-2 lg:col-span-1">
                <div class="bg-white p-4 rounded-md shadow-md">
                    <!-- Títulos -->
                    <div class="flex justify-between mb-4">
                        <div class="w-4/5 font-bold">Título</div>
                        <div class="w-1/5 font-bold">Acciones</div>
                    </div>

                    <!-- Listado de Artículos -->
                    <ul id="articulos-list" class="list-none">
                        <!-- Aquí se cargarán los artículos dinámicamente usando JavaScript -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            
            // Realizar la solicitud al servicio REST de Articulos
            fetch('/articulos/listaArticulos')
                .then(response => response.json())
                .then(articulos => {
                    const articulosListContainer = document.getElementById('articulos-list');

                    articulos.forEach(articulo => {

                        // Crear elementos HTML para cada artículo
                        const listItem = document.createElement('li');
                        listItem.classList.add('border-b', 'py-2', 'flex', 'justify-between', 'items-center');

                        const titulo = document.createElement('div');
                        titulo.classList.add('w-4/5');
                        titulo.textContent = articulo.title;

                        const acciones = document.createElement('div');
                        acciones.classList.add('w-1/5');
                        
                        const editarLink = document.createElement('a');
                        editarLink.href = '#';
                        editarLink.classList.add('text-blue-500', 'mr-2');
                        editarLink.textContent = 'Editar';

                        const eliminarLink = document.createElement('a');
                        eliminarLink.href = '#';
                        eliminarLink.classList.add('text-red-500');
                        eliminarLink.textContent = 'Eliminar';

                        acciones.appendChild(editarLink);
                        acciones.appendChild(document.createTextNode(' | '));
                        acciones.appendChild(eliminarLink);

                        listItem.appendChild(titulo);
                        listItem.appendChild(acciones);

                        articulosListContainer.appendChild(listItem);
                    });
                })
                .catch(error => console.error('Error al obtener la lista de artículos:', error));
        });
    </script>
</body>
</html>
