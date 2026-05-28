<?php

declare(strict_types=1);

function auth_required(): void
{
    if (empty($_SESSION['usuario'])) {
        header('Location: /');
        exit;
    }
}
