<?php

session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . "/plsv/conexion/conexion.php";
try {
    $db = Database::getInstance()->getConnection();

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $message = "Por favor, introduce tu usuario y contraseña.";
        require $_SERVER['DOCUMENT_ROOT'] . '/plsv/vistas/apology.php';
        exit();
    }

    $sql = "SELECT u.user_id, u.username, u.password, r.role_name 
            FROM users u 
            INNER JOIN roles r ON u.role_id = r.role_id 
            WHERE u.username = :username AND u.password = :password";

    $stmt = $db->prepare($sql);
    $stmt->execute([
        'username' => $username,
        'password' => $password // Nota: si luego usas password_hash, aquí solo buscarías por username y verificarías con password_verify
    ]);

    $result = $stmt->fetch();
    if ($result) {

        $_SESSION["user"] = [
            'id'       => $result['user_id'],
            'username' => $result['username'],
            'role'     => $result['role_name'] // Guardamos el nombre del rol ('USER', 'ADMIN', etc.)
        ];

        echo "<script>window.location = '../vistas/inicio.php';</script>";
        exit();
    } else {

        $message = "El nombre de usuario o la contraseña son incorrectos.";
        require $_SERVER['DOCUMENT_ROOT'] . '/plsv/vistas/apology.php';
        exit();
    }
} catch (PDOException $e) {
    $message = "Error crítico en el sistema: " . $e->getMessage();
    require $_SERVER['DOCUMENT_ROOT'] . '/plsv/vistas/apology.php';
    exit();
}
