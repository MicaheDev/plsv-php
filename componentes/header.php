<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user = $_SESSION["user"] ?? null;
?>

<header class="h-[60px] w-full shrink-0 flex">

    <div class="w-full h-full max-w-2xl mx-auto bg-white px-4 flex items-center max-lg:justify-center">

      <div class="inline-flex items-center  gap-2">
        <img class="h-10" src="/plsv/public/logo.png" />
        <h1 class="text-base font-black">LinguSeñas</h1>
      </div>

         <nav">
            <?php if ($user): ?>
                <a href="/plsv/vistas/inicio.php">Inicio</a>

                <span>
                    <strong><?= htmlspecialchars($user['username']) ?></strong>
                    (<small><?= htmlspecialchars($user['role']) ?></small>)
                </span>
                <a href="/plsv/controladores/cerrar_sesion.php">Cerrar Sesión</a>


            <?php endif; ?>

        </nav>
    </div>
  </header>