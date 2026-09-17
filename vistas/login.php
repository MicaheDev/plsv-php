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
<div class="w-full flex flex-col max-w-2xl mx-auto">
  <form class="flex flex-col" action="/plsv/controladores/validar_usuario.php" method="POST">

    <h2 class="titulo-login">Iniciar Sesión</h2>

    <div class="contenedor-campo">
      <label for="usuario">Nombre Usuario</label>
      <input
        class="input"
        type="text"
        id="username"
        name="username"
        required
        minlength="4"
        placeholder="Ej: Usuario1234" />
    </div>

    <div class="contenedor-campo">
      <label for="contraseña">Contraseña:</label>
      <input
        class="input"
        type="password"
        id="password"
        name="password"
        required
        minlength="4"
        placeholder="Ej: 1234" />
    </div>


    <div class="w-full flex flex-row gap-2 max-lg:flex-col justify-center">

      <div class="flex flex-col gap-2">
        <div class="button-wrapper w-full">
          <button class="button bg-blue-500 text-white w-full" type="submit">Ingresar</button>
        </div>

        <div class="button-wrapper w-full">
          <a class="button bg-white text-blue-800 w-full" href="/plsv/vistas/registro.php">Crear una cuenta</a>
        </div>
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