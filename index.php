<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Bienvenido a LinguSeñas</title>

  <script src="/plsv/public/lib/browser@4.js"></script>

  <style type="text/tailwindcss">
    @font-face {
      font-family: "Montserrat";
      src: url("/plsv/public/fonts/Montserrat.ttf") format("truetype-variations");
      font-weight: 100 900;
      font-style: normal;
    }

    @theme {
      --font-sans: "Montserrat", sans-serif;
    }

    @utility button {
     @apply  border-2 border-blue-800 inline-flex items-center justify-center -translate-y-1 hover:translate-y-0 active:translate-y-0 transition-transform text-nowrap px-4 py-2 uppercase font-bold rounded-2xl;
    }

    @utility button-wrapper {
      @apply bg-blue-800 w-fit rounded-2xl;
    }
    </style>

</head>

<body class="w-full h-svh overflow-hidden flex flex-col ">

  <header class="h-[60px] w-full shrink-0">

    <div class="w-full h-full max-w-2xl mx-auto bg-white px-4 flex items-center max-lg:justify-center">

      <div class="inline-flex items-center  gap-2">
        <img class="h-10" src="/plsv/public/logo.png" />
        <h1 class="text-base font-black">LinguSeñas</h1>
      </div>
    </div>
  </header>

  <main class="w-full h-svh max-w-2xl mx-auto flex flex-col justify-center max-lg:justify-between gap-4  items-center p-4">

    <div class="flex items-center max-lg:flex-col max-lg:justify-between gap-8 max-lg:gap-2">
      <div class="w-full flex flex-col gap-2">
        <h2 class="text-3xl text-center font-black">Bienvenidos a LinguSeñas</h2>
        <p class="text-gray-700 max-lg:hidden text-justify">
          LinguSeñas es un proyecto socio-tecnológico contextualizado en la U.E. Bartolomé Salom en Puerto Cabello, concebido para reducir las barreras de comunicación entre la comunidad sorda y los oyentes mediante herramientas digitales interactivas.
          Su propósito principal es facilitar el aprendizaje, práctica y difusión de la Lengua de Señas Venezolana (LSV) en el entorno escolar, integrando a estudiantes, docentes y representantes en un espacio inclusivo.
        </p>
      </div>

      <div class="w-full grid grid-cols-2 gap-2 p-2 max-w-xl mx-auto">
        <!-- Primera imagen: ocupa las 2 columnas de la fila 1 -->
        <img
          src="/plsv/public/img/1.png"
          class="col-span-2 aspect-square max-lg:aspect-video object-cover object-top w-full rounded-lg" />

        <!-- Segunda imagen: columna 1, fila 2 -->
        <img
          src="/plsv/public/img/2.png"
          class="aspect-square object-cover w-full rounded-lg" />

        <!-- Tercera imagen: columna 2, fila 2 -->
        <img
          src="/plsv/public/img/3.png"
          class="aspect-square object-cover w-full rounded-lg" />
      </div>
    </div>


    <div class="w-full flex flex-row gap-2 max-lg:flex-col justify-center">
      <div class="button-wrapper w-full">
        <a class="button w-full bg-blue-500 text-white" href="/plsv/vistas/login.php">iniciar Sesión</a>
      </div>
      <div class="button-wrapper w-full">
        <a class="button w-full bg-white text-blue-800" href="/plsv/vistas/registro.php">Crear una cuenta</a>
      </div>
    </div>
  </main>


</body>

</html>