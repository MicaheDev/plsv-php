<?php
$title = "Registrarse";

ob_start();
?>

    <form class="formulario" action="/plsv/controladores/registrar_usuario.php" method="POST">


        <h2 class="titulo-login">Registrarse</h2>

        <div class="contenedor-campo">
            <label for="full_name">Nombre Completo</label>
            <br />
            <input
                type="text"
                id="full_name"
                name="full_name"
                required
                minlength="4"
                placeholder="Ej: Juan Alberto Gutierrez" />
        </div>

        <div class="contenedor-campo">
            <label for="username">Nombre Usuario</label>
            <br />
            <input
                type="text"
                id="username"
                name="username"
                required
                minlength="4"
                placeholder="Ej: Usuario1234" />
        </div>

        <div class="contenedor-campo">
            <label for="password">Contraseña:</label>
            <br />
            <input
                type="password"
                id="password"
                name="password"
                required
                minlength="4"
                placeholder="Ej: 1234" />
        </div>

        <div class="contenedor-campo">
            <label for="password_confirmation">Confirmar Contraseña:</label>
            <br />
            <input
                class="campo"
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                required
                minlength=" 4"
                placeholder="Ej: 1234" />
        </div>

        <br>

        <button type="submit">Crear cuenta</button>

        <a class="enlace" href="/plsv/vistas/login.php">Iniciar Sesión</a>
    </form>
<?php
// 3. Guardamos todo el HTML capturado arriba en la variable $content y vaciamos el buffer
$content = ob_get_clean();

// 4. Cargamos el layout base que se encargará de renderizar todo junto
require $_SERVER['DOCUMENT_ROOT'] . '/plsv/componentes/layout.php';
?>