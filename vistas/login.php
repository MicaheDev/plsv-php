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
<div class="w-full h-full flex flex-col justify-center items-center max-w-2xl mx-auto p-4">
  <form class="w-full h-full flex flex-col justify-center max-lg:justify-between gap-4" action="/plsv/controladores/validar_usuario.php" method="POST">

    <div class="flex flex-col gap-4">
      <h2 class="text-3xl font-black text-center">Iniciar Sesión</h2>

      <p class="text-gray-700 text-center">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea, non?</p>

    <div class="flex flex-col gap-2">
      <label class="font-black" for="usuario">Nombre Usuario</label>
      <input
        class="input"
        type="text"
        id="username"
        name="username"
        required
        minlength="4"
        placeholder="Ej: Usuario1234" />
    </div>

    <div class="flex flex-col gap-2">
      <label class="font-black" for="contraseña">Contraseña:</label>
      <input
        class="input"
        type="password"
        id="password"
        name="password"
        required
        minlength="4"
        placeholder="Ej: 1234" />
    </div>
    </div>


    <div class="w-full flex flex-row-reverse gap-3 max-lg:flex-col justify-center">
        <div class="button-wrapper w-full">
          <button class="button bg-blue-500 text-white w-full" type="submit">Ingresar</button>
        </div>

        <div class="button-wrapper w-full">
          <a class="button bg-white text-blue-800 w-full" href="/plsv/vistas/registro.php">Crear una cuenta</a>
        </div>
    </div>
  </form>
</div>
<?php
// 3. Guardamos todo el HTML capturado arriba en la variable $content y vaciamos el buffer
$content = ob_get_clean();

// 4. Cargamos el layout base que se encargará de renderizar todo junto
require $_SERVER['DOCUMENT_ROOT'] . '/plsv/componentes/layout.php';
?>