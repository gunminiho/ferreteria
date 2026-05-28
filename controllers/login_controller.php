<?php

declare(strict_types=1);

function login_index(): void
{
    $error = $_SESSION['login_error'] ?? null;
    unset($_SESSION['login_error']);

    require __DIR__ . '/../views/login.php';
}

function login_store(): void
{
    $correo   = trim($_POST['correo'] ?? '');
    $password = $_POST['password'] ?? '';

    $usuario = usuario_find_by_correo($correo);

    if (!$usuario || !$usuario['activo'] || !password_verify($password, $usuario['password'])) {
        $_SESSION['login_error'] = 'Correo o contraseña incorrectos.';
        header('Location: /');
        exit;
    }

    $_SESSION['usuario'] = [
        'id_usuario' => $usuario['id_usuario'],
        'nombre'     => $usuario['nombre'],
        'apellido'   => $usuario['apellido'],
        'correo'     => $usuario['correo'],
        'rol'        => $usuario['rol'],
    ];

    header('Location: /dashboard');
    exit;
}

function login_destroy(): void
{
    session_destroy();
    header('Location: /');
    exit;
}
