<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$user = $_SESSION["user"] ?? null;

if ($user != null) {
  require $_SERVER['DOCUMENT_ROOT'] . '/plsv/vistas/inicio.php';

  exit();
}


$title = "Iniciar Sesión";

ob_start();
?>



<div class="w-full h-full max-w-2xl mx-auto flex flex-col justify-center max-lg:justify-between gap-4 items-center p-4">

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


  <div class="w-full flex flex-row gap-3 max-lg:flex-col justify-center">
    <div class="button-wrapper w-full">
      <a class="button w-full bg-blue-500 text-white" href="/plsv/vistas/login.php">iniciar Sesión</a>
    </div>
    <div class="button-wrapper w-full">
      <a class="button w-full bg-white text-blue-800" href="/plsv/vistas/registro.php">Crear una cuenta</a>
    </div>
  </div>
</div>



<?php
// 3. Guardamos todo el HTML capturado arriba en la variable $content y vaciamos el buffer
$content = ob_get_clean();

// 4. Cargamos el layout base que se encargará de renderizar todo junto
require $_SERVER['DOCUMENT_ROOT'] . '/plsv/componentes/layout.php';
?>