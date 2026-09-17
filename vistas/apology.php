<?php
$title = "Lo sentimos - Error";

ob_start();
?>

<div>
    <h1>¡Ups! Algo salió mal</h1>
    <?= htmlspecialchars($message) ?>

    <a href="javascript:history.back()"">Volver a la página anterior</a>
</div>


<?php
// 3. Guardamos todo el HTML capturado arriba en la variable $content y vaciamos el buffer
$content = ob_get_clean();

// 4. Cargamos el layout base que se encargará de renderizar todo junto
require $_SERVER['DOCUMENT_ROOT'] . '/plsv/componentes/layout.php';
?>