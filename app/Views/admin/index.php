<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Admin</title>
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
        <h1 class="text-4xl font-bold mb-4">Admin</h1>

        <div class="text-right mb-4">
        <a href="/admin/nuevo" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">Crear nuevo artículo</a>
    </div>

        <p class="mb-6">Listado de artículos</p>

        <!-- Listado de Artículos -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-6">
            <div class="col-span-1 md:col-span-2 lg:col-span-1">
                <div class="bg-white p-4 rounded-md shadow-md">
                    <div class="flex justify-between mb-4">
                        <div class="w-4/5 font-bold">Título</div>
                        <div class="w-1/5 font-bold">Acciones</div>
                    </div>


                    <ul id="articulos-list" class="list-none">
                        <!-- Aquí se cargarán los artículos dinámicamente usando JavaScript -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
document.addEventListener('DOMContentLoaded', function () {
    const articulosListContainer = document.getElementById('articulos-list');

        // Verificar si se hizo clic en un enlace de "Eliminar"
        articulosListContainer.addEventListener('click', function (event) {
            const target = event.target;

            if (target.tagName === 'A' && target.classList.contains('text-red-500')) {
                event.preventDefault();

                // Obtener el ID del artículo desde el atributo de datos del elemento padre (li)
                const id = target.closest('li').dataset.articuloId;

                // Confirmar antes de eliminar
                if (confirm('¿Seguro que quieres eliminar este artículo?')) {
                    // Realizar la solicitud para eliminar el artículo
                    fetch(`/articulos/eliminarArticulo/${id}`, {
                        method: 'DELETE',
                    })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                // Eliminar el elemento de la lista si la eliminación fue exitosa
                                target.closest('li').remove();
                            } else {
                                console.error('Error al eliminar el artículo:', result.message);
                            }
                        })
                        .catch(error => console.error('Error al realizar la solicitud de eliminación:', error));
                }
            }
        });

        

        // Realizar la solicitud al servicio REST de Articulos
        fetch('/articulos/listaArticulos')
            .then(response => response.json())
            .then(articulos => {
                articulos.forEach(articulo => {
                    // Crear elementos HTML para cada artículo
                    const listItem = document.createElement('li');
                    listItem.classList.add('border-b', 'py-2', 'flex', 'justify-between', 'items-center');
                    listItem.dataset.articuloId = articulo.id;

                    const titulo = document.createElement('div');
                    titulo.classList.add('w-4/5');
                    titulo.textContent = articulo.title;

                    const acciones = document.createElement('div');
                    acciones.classList.add('w-1/5');

                    const editarLink = document.createElement('a');
                    editarLink.href = `articulos/editar/${articulo.id}`;
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
