<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . "/plsv/conexion/conexion.php";

try {
    // Obtenemos la conexión PDO desde tu Singleton
    $db = Database::getInstance()->getConnection();

    // Capturamos los datos
    $full_name = $_POST['full_name'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $password_confirmation = $_POST['password_confirmation'] ?? '';
    $role_id = 2;

    // 1. Validar que ningún campo esté vacío
    if (empty($username) || empty($password) || empty($password_confirmation) || empty($role_id)) {
        $message = "Todos los campos son obligatorios para el registro.";
        require $_SERVER['DOCUMENT_ROOT'] . '/plsv/vistas/apology.php';

        exit();
    }

    // 2. Validar que las contraseñas coincidan
    if ($password !== $password_confirmation) {
        $message = "Las contraseñas ingresadas no coinciden. Por favor, verifícalas.";
        require $_SERVER['DOCUMENT_ROOT'] . '/plsv/vistas/apology.php';

        exit();
    }

    // 3. Verificar si el usuario ya existe (Usando marcadores nombrados de PDO)
    $stmt_check = $db->prepare("SELECT user_id FROM users WHERE username = :username");
    $stmt_check->execute(['username' => $username]); // Pasamos el array directo aquí

    // En PDO, para saber si hay resultados, usamos fetch() o rowCount()
    if ($stmt_check->fetch()) {
        $message = "El nombre de usuario '$username' ya se encuentra registrado.";
        require $_SERVER['DOCUMENT_ROOT'] . '/plsv/vistas/apology.php';

        exit();
    }

    // 4. Insertar el nuevo usuario de forma segura
    $stmt_user = $db->prepare("INSERT INTO users (full_name,username, password, role_id) VALUES (:full_name,:username, :password, :role_id)");

    // Ejecutamos pasando todas las variables de golpe sin bind_param
    $stmt_user->execute([
        'full_name' => $full_name,
        'username' => $username,
        'password'   => $password, // Nota: considera usar password_hash() en el futuro por seguridad
        'role_id'     => $role_id
    ]);

    // Si todo salió bien, confirmamos el registro
    echo "<script>alert('Usuario registrado correctamente'); window.location = '../vistas/login.php';</script>";
} catch (PDOException $e) {
    $message = "Error en la base de datos: " . $e->getMessage();
    require $_SERVER['DOCUMENT_ROOT'] . '/plsv/vistas/apology.php';

    exit();
}
