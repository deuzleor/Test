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

        .btn{
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
        .btn-volver{
            background-color: #000;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #juego {
            width: 80%;
            height: 80%;
            position: relative;
            border: 1px solid #000;
            background-color: #fff;
        }

        .contenedor {
            width: 100px;
            height: 100px;
            border: 2px dashed #333;
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #cronometro {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #ddd;
            padding: 10px;
            border-radius: 5px;
        }

        /* Estilos específicos para cada contenedor */
        #contenedor1 {
            top: 0;
            left: 0;
        }

        #contenedor2 {
            top: 0;
            right: 0;
        }

        #contenedor3 {
            bottom: 0;
            left: 0;
        }

        #contenedor4 {
            bottom: 0;
            right: 0;
        }

        #area-objetos {
            width: 50%;
            display: flex;
            flex-wrap: wrap;
            position: absolute;
            top: 40%;
            left: 0;
            right: 0;
            margin: 0 auto;
        }

        .objeto {
            width: 50px;
            height: 50px;
            margin: 10px;
            background-color: #ddd;
            border: 1px solid #333;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: grab;
        }

        /* Estilos para las diferentes categorías de objetos */
        .categoria-0 {
            background-color: red;
        }

        .categoria-1 {
            background-color: green;
        }

        .categoria-2 {
            background-color: blue;
        }

        .categoria-3 {
            background-color: yellow;
        }

        .popup, #popup-final {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border: 1px solid #000;
            z-index: 1000;
        }

        #panel-puntuacion {
            position: fixed;
            top: 10px;
            left: 10px;
            background-color: #ddd;
            padding: 10px;
            border-radius: 5px;
        }

        /* Estilos para dispositivos móviles */
        @media (max-width: 600px) {
            #juego {
                width: 95%;
                height: 95%;
            }

            .contenedor {
                width: 80px;
                height: 80px;
            }

            .objeto {
                width: 40px;
                height: 40px;
            }
        }
    </style>
</head>

<body class="bg-gray-100">
    <div id="popup-instrucciones" class="popup">
        <p>Arrastra los objetos a su contenedor correspondiente. Evita fallar ya que te restarán puntos. Termina antes
            del tiempo para pasar al siguiente nivel</p>
        <a class="btn-volver" href="/">Volver</a>
        <button class="btn" onclick="iniciarJuego()">Comenzar Juego</button>
    </div>

    <div id="popup-final" class="popup" style="display: none;">
        <p id="mensaje-final">¡Juego terminado! Tu puntuación es: <span id="puntuacion-final"></span></p>
        <a class="btn-volver" href="/">Volver</a>
        <button class="btn" onclick="reiniciarJuego()">Jugar de Nuevo</button>
    </div>

    <div id="juego">
        <!-- Contenedores para las categorías -->
        <div id="contenedor1" class="contenedor categoria-0"></div>
        <div id="contenedor2" class="contenedor categoria-1"></div>
        <div id="contenedor3" class="contenedor categoria-2"></div>
        <div id="contenedor4" class="contenedor categoria-3"></div>

        <!-- Área de juego donde se colocarán los objetos -->
        <div id="area-objetos">
            <!-- Los objetos se generarán dinámicamente aquí -->
        </div>
    </div>

    <div id="panel-puntuacion">
        Puntuación: <span id="puntuacion">0</span>
    </div>
    <div id="cronometro">
        Tiempo restante: <span id="tiempo">40</span> segundos
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            iniciarJuego();
        });

        function iniciarJuego() {
            mostrarPopupInstrucciones();
            // Puedes añadir más lógica de inicialización aquí
        }

        function mostrarPopupInstrucciones() {
            var popup = document.getElementById('popup-instrucciones');
            popup.style.display = 'block';

            document.querySelector('#popup-instrucciones button').addEventListener('click', function () {
                popup.style.display = 'none';
                comenzarJuego();
            });
        }

        function comenzarJuego() {
            generarObjetos();
            configurarContenedores();
            iniciarCronometro();
        }

        function generarObjetos() {
            var areaObjetos = document.getElementById('area-objetos');
            areaObjetos.innerHTML = '';
            for (var i = 0; i < 6; i++) {
                var objeto = document.createElement('div');
                objeto.className = 'objeto categoria-' + (i % 4);
                objeto.draggable = true;
                objeto.ondragstart = function (event) {
                    drag(event);
                };
                areaObjetos.appendChild(objeto);
            }
        }

        function iniciarCronometro() {
            var tiempoRestante =10; // segundos para el nivel 1
            document.getElementById('tiempo').innerText = tiempoRestante;
            var cronometro = setInterval(function () {
                tiempoRestante--;
                document.getElementById('tiempo').innerText = tiempoRestante;

                if (tiempoRestante <= 0) {
                    clearInterval(cronometro);
                    finalizarJuego();
                }
            }, 1000);
        }

        function drag(event) {
            //console.log(event.target.className)
            event.dataTransfer.setData("text", event.target.className);
        }

        function configurarContenedores() {
            var contenedores = document.querySelectorAll('.contenedor');
            contenedores.forEach(function (contenedor) {
                console.log('Configurando contenedor');
                contenedor.ondragover = permitirSoltar;
                contenedor.ondrop = soltar;
            });
        }

        function permitirSoltar(event) {
            event.preventDefault();
        }

        function soltar(event) {
            event.preventDefault();
            var data = event.dataTransfer.getData("text");
            var categoriaObjeto = data.split(' ').find(clase => clase.startsWith('categoria-'));

            // Obtenemos el objeto arrastrado buscando por la clase categoria en el área de objetos
            var objetoArrastrado = document.getElementById('area-objetos').querySelector('.' + categoriaObjeto);

            var contenedor = event.target.closest('.contenedor');
            var categoriaContenedor = contenedor.className.split(' ').find(clase => clase.startsWith('categoria-'));

            if (objetoArrastrado && categoriaObjeto && categoriaContenedor && categoriaObjeto === categoriaContenedor) {
                contenedor.appendChild(objetoArrastrado);
                actualizarPuntuacion(5);
            } else {
                actualizarPuntuacion(-5);
            }
        }


        function actualizarPuntuacion(puntos) {
            var puntuacionActual = parseInt(document.getElementById('puntuacion').innerText);
            document.getElementById('puntuacion').innerText = puntuacionActual + puntos;
        }



        function finalizarJuego() {
            var puntuacion = parseInt(document.getElementById('puntuacion').innerText);
            document.getElementById('puntuacion-final').innerText = puntuacion;
            document.getElementById('popup-final').style.display = 'block';
        }

        function reiniciarJuego() {
            document.getElementById('popup-final').style.display = 'none';
            document.getElementById('puntuacion').innerText = '0';
            comenzarJuego();
        }

        // Inicializar contenedores para el drag and drop al comenzar el juego
        iniciarJuego();
    </script>
</body>

</html>