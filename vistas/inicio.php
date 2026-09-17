<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user = $_SESSION["user"] ?? null;

if ($user == null) {
   $message = "Debe iniciar sesión para acceder a esta sección.";
    require $_SERVER['DOCUMENT_ROOT'] . '/plsv/vistas/apology.php';

    exit();
}

$title = "Inicio";

ob_start();
?>

<div class="dashboard-container">
    <h1>Bienvenido, <?= htmlspecialchars($user['username']) ?> 👋</h1>
    <p>Has ingresado con el rol de: <strong><?= htmlspecialchars($user['role']) ?></strong></p>
</div>
<?php
// 3. Guardamos todo el HTML capturado arriba en la variable $content y vaciamos el buffer
$content = ob_get_clean();

// 4. Cargamos el layout base que se encargará de renderizar todo junto
require $_SERVER['DOCUMENT_ROOT'] . '/plsv/componentes/layout.php';
?>