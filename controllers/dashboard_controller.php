<?php

declare(strict_types=1);

function dashboard_index(): void
{
    if (empty($_SESSION['usuario'])) {
        header('Location: /');
        exit;
    }

    $usuario = $_SESSION['usuario'];

    require __DIR__ . '/../views/dashboard.php';
}
