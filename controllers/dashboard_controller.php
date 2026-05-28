<?php

declare(strict_types=1);

function dashboard_index(): void
{
    auth_required();

    $usuario = $_SESSION['usuario'];

    require __DIR__ . '/../views/dashboard.php';
}
